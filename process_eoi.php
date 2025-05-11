# Handles form submissions

<?php
// Redirect if not from the form
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Collect and sanitize data
$job_ref = htmlspecialchars($_POST['job_ref']);
$first_name = htmlspecialchars(trim($_POST['first_name']));
$last_name = htmlspecialchars(trim($_POST['last_name']));
$street = htmlspecialchars(trim($_POST['street_address']));
$suburb = htmlspecialchars(trim($_POST['suburb']));
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$skill1 = isset($_POST['skill1']) ? 1 : 0;
$skill2 = isset($_POST['skill2']) ? 1 : 0;
$skill3 = isset($_POST['skill3']) ? 1 : 0;
$skill4 = isset($_POST['skill4']) ? 1 : 0;
$other_skills = htmlspecialchars(trim($_POST['other_skills']));

// Insert query
$query = "INSERT INTO eoi 
(job_ref, first_name, last_name, street_address, suburb, state, postcode, email, phone, skill1, skill2, skill3, skill4, other_skills)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param(
    $stmt,
    'sssssssssssiiis',
    $job_ref,
    $first_name,
    $last_name,
    $street,
    $suburb,
    $state,
    $postcode,
    $email,
    $phone,
    $skill1,
    $skill2,
    $skill3,
    $skill4,
    $other_skills
);

mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    $eoi_id = mysqli_insert_id($conn);
    echo "<p>Thank you. Your EOI Number is: $eoi_id</p>";
} else {
    echo "<p>Failed to submit application.</p>";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>