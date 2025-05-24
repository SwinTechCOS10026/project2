<?php
// Handles the form submission for Expressions of Interest (EOI)
// It validates, sanitizes, and inserts form data into the MySQL database

// Ensure script isn't accessed directly without form submission
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: apply.php');
    exit();
}

// Helper function to sanitize input
define('ALLOWED_STATES', ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT']);

function sanitize_input($data)
{
    return htmlspecialchars(stripslashes($data));
}

// Validate and sanitize input fields
$errors = [];

// Job Reference
$job_ref = isset($_POST['job_ref']) ? trim(sanitize_input($_POST['job_ref'])) : '';

// First Name
$first_name = isset($_POST['fname']) ? trim(sanitize_input($_POST['fname'])) : '';
if (!preg_match("/^[A-Za-z]{1,20}$/", $first_name)) {
    $errors[] = "First name must be alphabetic and up to 20 characters.";
}

// Last Name
$last_name = isset($_POST['lname']) ? trim(sanitize_input($_POST['lname'])) : '';
if (!preg_match("/^[A-Za-z]{1,20}$/", $last_name)) {
    $errors[] = "Last name must be alphabetic and up to 20 characters.";
}

// Date of Birth
$dob = isset($_POST['dob']) ? trim(sanitize_input($_POST['dob'])) : '';

// Gender
$gender = isset($_POST['gender']) ? trim(sanitize_input($_POST['gender'])) : '';
if (!in_array($gender, ['Male', 'Female', 'Other'])) {
    $errors[] = "Please select a valid gender.";
}

// Street Address
$street = isset($_POST['streetaddress']) ? trim(sanitize_input($_POST['streetaddress'])) : '';
if (strlen($street) > 40) {
    $errors[] = "Street address must not exceed 40 characters.";
}

// Suburb
$suburb = isset($_POST['address']) ? trim(sanitize_input($_POST['address'])) : '';
if (strlen($suburb) > 40) {
    $errors[] = "Suburb must not exceed 40 characters.";
}

// State
$state = isset($_POST['state']) ? trim(sanitize_input($_POST['state'])) : '';
if (!in_array($state, ALLOWED_STATES)) {
    $errors[] = "Invalid state selected.";
}

// Postcode
$postcode = isset($_POST['postcode']) ? trim(sanitize_input($_POST['postcode'])) : '';
if (!preg_match("/^\d{4}$/", $postcode)) {
    $errors[] = "Postcode must be 4 digits.";
}

// Email
$email = isset($_POST['email']) ? trim(sanitize_input($_POST['email'])) : '';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

// Phone
$phone = isset($_POST['phonenum']) ? trim(sanitize_input($_POST['phonenum'])) : '';
if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) {
    $errors[] = "Phone number must be between 8 and 12 digits or spaces.";
}

// Skills - checking if empty and setting empty entry to the correct format of "TRUE" or "FALSE"
$skills1 = isset($_POST['skills1']);
$skills2 = isset($_POST['skills2']);
$skills3 = isset($_POST['skills3']);
$skills4 = isset($_POST['skills4']);
if ($skills1 == "no" and $skills2 == "no" and $skills3 == "no" and $skills4 == "no") {
    $errors[] = "You must select at least one skill.";
}
if ($skills1 == "no"){
    $skills1 = FALSE;
}
else{
    $skills1 = TRUE;
}
if ($skills2 == "no"){
    $skills2 = FALSE;
}
else{
    $skills2 = TRUE;
}
if ($skills3 == "no"){
    $skills3 = FALSE;
}
else{
    $skills3 = TRUE;
}
if ($skills4 == "no"){
    $skills4 = FALSE;
}
else{
    $skills4 = TRUE;
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

// sanitised user input for the other_skill string
$position_just = sanitize_input($_POST["q1"]);
if (empty(trim($position_just))) {
    $errors[] = "You must state why you believe you deserve this job over other applicants.";
}

// sanitised user input for the other_skill string
$rel_work = sanitize_input($_POST["q2"]);
if (empty(trim($rel_work)) and ($_POST["prevex-yes"] == "Yes")) {
    $errors[] = "You must state previous experience if you've entered yes .";
}

// sanitised user input for the other_skill string
$skills_string = trim(sanitize_input($_POST["relskills"]));

require_once("settings.php"); // Database credentials

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
$eoi_number = mysqli_insert_id($conn);
$appli_date = date("Y-m-d");
$appli_status = "New";
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
        position_justification TEXT,
        related_exp TEXT,
        skill1 BOOLEAN DEFAULT FALSE,
        skill2 BOOLEAN DEFAULT FALSE,
        skill3 BOOLEAN DEFAULT FALSE,
        skill4 BOOLEAN DEFAULT FALSE,
        Skills TEXT,
        Status VARCHAR(20) DEFAULT 'New'
    )";

mysqli_query($conn, $table_create_query);

// Insert sanitized data
$insert_query = "
    INSERT INTO EOI (EOInumber, job_ref, first_name, last_name, dob, gender, street_address, suburb, state, postcode, email, phone, position_justification, related_work, skill1, skill2, skill3, skill4, other_skills, status, application_date)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $insert_query);
mysqli_stmt_bind_param(
    $stmt,
    'sssssssssssssssssssss',
    $eoi_number,
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
    $position_just,
    $rel_work,
    $skills1,
    $skills2,
    $skills3,
    $skills4,
    $skills_string,
    $appli_status,
    $appli_date,
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