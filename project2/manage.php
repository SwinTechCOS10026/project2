<!-- Header -->
<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<!-- Banner -->
<div class="manage-banner">
  <img src="images/manage_img/banner.jpg" alt="HR Management Banner">
   <div class="banner-text">Manage Applications</div>
</div>

<!-- Main -->
<main class="job-manage-main">

 <!-- Search Function Left -->
  <div class="manage-page-container">
  <div class="manage-search-section">
    <h2>Search EOIs</h2>
    <form action="manage.php" method="get">
      <label for="search_job_ref">Job Reference Number:</label>
      <input type="text" id="search_job_ref" name="search_job_ref"><br><br>

       <label for="search_first_name">First Name:</label>
  <input type="text" id="search_first_name" name="search_first_name"><br><br>

  <label for="search_last_name">Last Name:</label>
  <input type="text" id="search_last_name" name="search_last_name"><br><br>

      <input type="submit" value="Search EOIs">
    </form>
    <form method="post" action="manage.php">
  <button type="submit" name="list_all" class="manage-btn">List All EOIs</button>
    </form>
  </div>

  
<!-- Updates Delete Function Right -->
  <div class="manage-modify-section">
    <h2>Update / Delete EOIs</h2>

    <!-- Updates Form -->
    <form action="manage.php" method="post">
      <label for="update_eoi_number">EOInumber:</label>
      <input type="text" id="update_eoi_number" name="update_eoi_number"><br><br>

      <label for="new_status">New Status:</label>
      <select id="new_status" name="new_status">
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>  
      </select><br><br>
      <input type="submit" name="update_status" value="Update Status">
    </form>
    <br>

    <!-- Delete Form -->
    <form action="manage.php" method="post">
      <label for="delete_job_ref">Delete by Job Reference:</label>
      <input type="text" id="delete_job_ref" name="delete_job_ref"><br><br>
      <input type="submit" name="delete_by_job_ref" value="Delete EOIs">
    </form>
  </div>
</div>

<!-- Results Table -->
<div class='eoi-table-wrapper'>
 <?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) die("Connection error.");

if (isset($_POST['list_all'])) {
    $query = "SELECT * FROM eoi";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<h2>All EOIs</h2>";
        echo "<table class='eoi-table'>";
        echo "<tr>
                <th>EOI Number</th>
                <th>Name</th>
                <th>Job Ref</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Skills</th>
                <th>Other Skills</th>
                <th>Status</th>
                <th>Applied On</th>
              </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['EOInumber']}</td>
                    <td>{$row['first_name']} {$row['last_name']}</td>
                    <td>{$row['job_ref']}</td>
                    <td>{$row['dob']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['street_address']}, {$row['suburb']}, {$row['state']} {$row['postcode']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['skills']}</td>
                    <td>{$row['other_skills']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['application_date']}</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No EOIs found.</p>";
    }
}
mysqli_close($conn);
?>
</div>
</main>

<!-- Footer -->
<?php include("footer.inc"); ?>
