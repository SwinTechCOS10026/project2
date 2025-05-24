<?php
// Handles the form submission for Expressions of Interest (EOI)
// It validates, sanitizes, and inserts form data into the MySQL database

// Ensure script isn't accessed directly without form submission
token_set();
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: application_form.php');
    exit();
}

// Helper function to sanitize input
define('ALLOWED_STATES', ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT']);

function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Validate and sanitize input fields
$errors = [];

// Job Reference
$job_ref = isset($_POST['job_ref']) ? sanitize_input($_POST['job_ref']) : '';

// First Name
$first_name = isset($_POST['first_name']) ? sanitize_input($_POST['first_name']) : '';
if (!preg_match("/^[A-Za-z]{1,20}$/", $first_name)) {
    $errors[] = "First name must be alphabetic and up to 20 characters.";
}

// Last Name
$last_name = isset($_POST['last_name']) ? sanitize_input($_POST['last_name']) : '';
if (!preg_match("/^[A-Za-z]{1,20}$/", $last_name)) {
    $errors[] = "Last name must be alphabetic and up to 20 characters.";
}

// Date of Birth
$dob = isset($_POST['dob']) ? sanitize_input($_POST['dob']) : '';
if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)) {
    $errors[] = "Date of birth must be in dd/mm/yyyy format.";
}

// Gender
$gender = isset($_POST['gender']) ? sanitize_input($_POST['gender']) : '';
if (!in_array($gender, ['Male', 'Female', 'Other'])) {
    $errors[] = "Please select a valid gender.";
}

// Street Address
$street = isset($_POST['street']) ? sanitize_input($_POST['street']) : '';
if (strlen($street) > 40) {
    $errors[] = "Street address must not exceed 40 characters.";
}

// Suburb
$suburb = isset($_POST['suburb']) ? sanitize_input($_POST['suburb']) : '';
if (strlen($suburb) > 40) {
    $errors[] = "Suburb must not exceed 40 characters.";
}

// State
$state = isset($_POST['state']) ? sanitize_input($_POST['state']) : '';
if (!in_array($state, ALLOWED_STATES)) {
    $errors[] = "Invalid state selected.";
}

// Postcode
$postcode = isset($_POST['postcode']) ? sanitize_input($_POST['postcode']) : '';
if (!preg_match("/^\d{4}$/", $postcode)) {
    $errors[] = "Postcode must be 4 digits.";
}

// Email
$email = isset($_POST['email']) ? sanitize_input($_POST['email']) : '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Phone
$phone = isset($_POST['phone']) ? sanitize_input($_POST['phone']) : '';
if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) {
    $errors[] = "Phone number must be between 8 and 12 digits or spaces.";
}

// Skills
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
if (count($skills) == 0) {
    $errors[] = "You must select at least one skill.";
}

// If there are validation errors, show error page
if (!empty($errors)) {
    echo "<h2>There were errors in your form submission:</h2><ul>";
    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }
    echo "</ul><a href='application_form.php'>Go back to the form</a>";
    exit();
}

// Convert skills to comma-separated string
$skills_string = implode(", ", array_map('sanitize_input', $skills));

require_once("settings.php"); // Database credentials

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Create table if not exists
$table_create_query = "
    CREATE TABLE IF NOT EXISTS EOI (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        JobRef VARCHAR(10) NOT NULL,
        FirstName VARCHAR(20) NOT NULL,
        LastName VARCHAR(20) NOT NULL,
        DOB VARCHAR(10) NOT NULL,
        Gender VARCHAR(10),
        Street VARCHAR(40),
        Suburb VARCHAR(40),
        State VARCHAR(3),
        Postcode VARCHAR(4),
        Email VARCHAR(100),
        Phone VARCHAR(12),
        Skills TEXT,
        Status VARCHAR(20) DEFAULT 'New'
    )";

mysqli_query($conn, $table_create_query);

// Insert sanitized data
$insert_query = "
    INSERT INTO EOI (JobRef, FirstName, LastName, DOB, Gender, Street, Suburb, State, Postcode, Email, Phone, Skills)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param(
    $stmt,
    'ssssssssssss',
    $job_ref,
    $first_name,
    $last_name,
    $dob,
    $gender,
    $street,
    $suburb,
    $state,
    $postcode,
    $email,
    $phone,
    $skills_string
);

if (mysqli_stmt_execute($stmt)) {
    $eoi_number = mysqli_insert_id($conn);
    echo "<h2>Expression of Interest Submitted Successfully!</h2>";
    echo "<p>Your unique EOI Number is: <strong>$eoi_number</strong></p>";
    echo "<a href='index.php'>Return to Home</a>";
} else {
    echo "<p>Something went wrong. Please try again later.</p>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>