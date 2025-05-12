# Manager Control Panel

<?php
require_once("settings.php");
$conn = mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn)
    die("Connection error.");

// List all EOIs
$query = "SELECT * FROM eoi";
$result = mysqli_query($conn, $query);

echo "<h2>All EOIs</h2>";
echo "<table border='1'>";
echo "<tr><th>EOInumber</th><th>Name</th><th>Job Ref</th><th>Status</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['EOInumber']}</td>
        <td>{$row['first_name']} {$row['last_name']}</td>
        <td>{$row['job_ref']}</td>
        <td>{$row['status']}</td>
    </tr>";
}
echo "</table>";
mysqli_close($conn);
?>