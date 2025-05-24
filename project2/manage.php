
<?php
session_start();
require_once("settings.php");
mysqli_report(MYSQLI_REPORT_OFF); 

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    include("header.inc");
    include("nav.inc");
    echo "<div class='center-message'>
            <p class='alert-msg'>⚠️ Unable to connect to server. Please try again later.</p>
          </div>";
    include("footer.inc");
    exit();
}
?>

<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<!-- Banner -->
<div class="manage-banner">
  <img src="images/manage_img/banner.jpg" alt="HR Management Banner">
  <div class="banner-text">Manage Applications</div>
</div>


<div class="manage-page-container">

<!-- Search -->
 <div class="manage-search-section">
  <h2>Search / Sort</h2>
  <form method="post" action="manage.php">
    <label for="job_ref">Job Reference</label>
    <input type="text" id="job_ref" name="job_ref">

    <label for="first_name">First Name</label>
    <input type="text" id="first_name" name="first_name">

    <label for="last_name">Last Name</label>
    <input type="text" id="last_name" name="last_name">

    <label for="sort_field">Sort By</label>
    <select name="sort_field" id="sort_field">
      <option value="EOInumber">EOI Number</option>
      <option value="first_name">First Name</option>
      <option value="last_name">Last Name</option>
      <option value="status">Status</option>
      <option value="application_date">Application Date</option>
    </select>

    <hr>
    <input type="submit" name="action" value="List All">
    <input type="submit" name="action" value="Search">
    <input type="submit" name="action" value="Sort">
  </form>
</div>

<!-- Modify -->
<div class="manage-modify-section">
  <h2>Update / Delete</h2>
  <form method="post" action="manage.php">
    <label for="eoi_number">EOI Number</label>
    <input type="text" id="eoi_number" name="eoi_number">

    <label for="new_status">New Status</label>
    <select name="new_status" id="new_status">
      <option value="New">New</option>
      <option value="Current">Current</option>
      <option value="Final">Final</option>
    </select>

    <input type="submit" name="action" value="Update Status">
    <br><br>

    <label for="delete_job_ref">Delete EOI by Job Reference</label>
    <input type="text" id="delete_job_ref" name="delete_job_ref">
    <input type="submit" name="action" value="Delete EOIs by Job"
      onclick="return confirm('Are you sure you want to delete the EOI for this job reference?');">
  </form>
</div>

</div>

<!-- Processing Logic -->
<div class="eoi-table-wrapper">
<?php
function displayEOITable($result) {
    if (mysqli_num_rows($result) > 0) {
        echo '<table class="eoi-table">';
        echo '<tr class="eoi-heading">';
        $fields = mysqli_fetch_fields($result);
        foreach ($fields as $field) {
            echo "<th>{$field->name}</th>";
        }
        echo '</tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . htmlentities($value) . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='center-message'><p class='alert-msg'>⚠️ Please enter at least one search field</p></div>";
    }
}

function displayAllEOIs($conn) {
    $query = "SELECT * FROM eoi";
    $result = mysqli_query($conn, $query);
    displayEOITable($result);
}

function searchEOIs($conn, $job_ref, $first_name, $last_name) {
    $conditions = [];
    $params = [];
    $types = "";

    if (!empty($job_ref)) {
        $conditions[] = "job_ref = ?";
        $params[] = $job_ref;
        $types .= "s";
    }
    if (!empty($first_name)) {
        $conditions[] = "first_name LIKE ?";
        $params[] = "%" . $first_name . "%";
        $types .= "s";
    }
    if (!empty($last_name)) {
        $conditions[] = "last_name LIKE ?";
        $params[] = "%" . $last_name . "%";
        $types .= "s";
    }
    if (empty($conditions)) {
        echo "<div class='center-message'><p class='alert-msg'>⚠️ Please enter at least one search field</p></div>";
        return;
    }

    $where = implode(" AND ", $conditions);
    $query = "SELECT * FROM eoi WHERE $where";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, $types, ...$params);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    displayEOITable($result);
}

function displaySortedEOIs($conn, $field) {
    $allowed = ["EOInumber", "first_name", "last_name", "status", "application_date"];
    if (!in_array($field, $allowed)) {
        echo "<div class='center-message'><p class='alert-msg'>⚠️Invalid sort field</p></div>";
        return;
    }
    $query = "SELECT * FROM eoi ORDER BY $field";
    $result = mysqli_query($conn, $query);
    displayEOITable($result);
}

function updateEOIStatus($conn, $eoi_number, $new_status) {
    $query = "UPDATE eoi SET status = ? WHERE EOInumber = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "si", $new_status, $eoi_number);
    if (mysqli_stmt_execute($stmt)) {
        echo "<div class='center-message'><p class='alert-msg'>✅Status updated successfully</p></div>";
    } else {
        echo "<div class='center-message'><p class='alert-msg'>⚠️Update failed</p></div>";
    }
}

function deleteEOIsByJob($conn, $job_ref) {
    $query = "DELETE FROM eoi WHERE job_ref = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $job_ref);
    if (mysqli_stmt_execute($stmt)) {
        $affected = mysqli_stmt_affected_rows($stmt);
        if ($affected > 0) {
            echo "<div class='center-message'><p class='alert-msg'>✅ Successfully deleted $affected EOI(s) for job ref <strong>$job_ref</strong></p></div>";
        } else {
            echo "<div class='center-message'><p class='alert-msg'>⚠️ No EOI found for job ref <strong>$job_ref</strong></p></div>";
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    switch ($action) {
        case "List All":
            displayAllEOIs($conn);
            break;
        case "Search":
            searchEOIs($conn, $_POST['job_ref'], $_POST['first_name'], $_POST['last_name']);
            break;
        case "Sort":
            displaySortedEOIs($conn, $_POST['sort_field']);
            break;
        case "Update Status":
            updateEOIStatus($conn, $_POST['eoi_number'], $_POST['new_status']);
            break;
        case "Delete EOIs by Job":
            deleteEOIsByJob($conn, $_POST['delete_job_ref']);
            break;
        default:
            echo "<div class='center-message'><p class='alert-msg'>⚠️Unknown action</p></div>";
    }
}
?>
</div>

<?php include("footer.inc"); ?>
