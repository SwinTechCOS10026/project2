<!--  Header -->
<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<!-- Banner -->
<div class="job-exp-container">
  <div class="job-exp-image">
    <img src="images/jobs/working_experience.jpg" alt="Team collaborating on data charts around a desk">
  </div>
  <div class="job-exp-text">
    <p class="job-exp-quote">
      "Swintech values independence and precision—two qualities I cherish. I've discovered clarity here: in elegant code, in focused silence, and in the rare team that respects space and gets the job done without fanfare. It's not loud, but it works."
    </p>
    <p class="job-exp-author">Din Djarin – Data Analyst, Swintech</p>
  </div>
</div>

<!-- Main -->
<div class="job-main">
<div class="job-main-content">
  <div class="job-main-heading">
  <h1 class="job-page-heading">Current Opportunities at Swintech</h1>
</div>

<!-- Job Description -->
<?php
require_once("settings.php");

mysqli_report(MYSQLI_REPORT_OFF);

$conn = @new mysqli($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
  echo "<div class='center-message'>
          <p class='alert-msg'>⚠️ Unable to connect to server. Please try again later.</p>
        </div>";
  include("footer.inc");
  exit();
}

$conn->set_charset("utf8mb4");

$query = "SELECT * FROM jobs";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<div class='job-container'>";
    echo "<div class='job-header'>";
    echo "<h3>{$row['job_title']}</h3>";
    if ($row['days_to_close'] <= 15) {
      echo "<span class='label-close'>Close in {$row['days_to_close']} days</span>";
    } elseif ($row['days_to_close'] >= 31) {
      echo "<span class='label-new'>New Released</span>";
    }
    echo "</div>";

    echo "<p><strong>Job ID:</strong> {$row['job_id']}</p>";
    echo "<p><strong>Description:</strong> {$row['job_description']}</p>";
    echo "<p><strong>Salary:</strong> {$row['salary_range']}</p>";
    echo "<h4>What’s in it for me?</h4>";
    echo "<p>{$row['benefits']}</p>";
    echo "<h4>Responsibilities:</h4><ul>";
    foreach (explode(';', $row['responsibilities']) as $item) {
      echo "<li>" . trim($item) . "</li>";
    }
    echo "</ul>";
    echo "<h4>Essential Qualifications:</h4><ol>";
    foreach (explode(';', $row['essential_qualifications']) as $item) {
      echo "<li>" . trim($item) . "</li>";
    }
    echo "</ol>";
    echo "<h4>What’s it like to work here?</h4>";
    echo "<p>{$row['culture']}</p>";
    echo "<p><strong>Remote Eligible:</strong> <span class='badge-remote " . ($row['remote_eligible'] ? "yes" : "no") . "'>" . ($row['remote_eligible'] ? "Yes" : "No") . "</span></p>";
    echo "<p><strong>Location:</strong> {$row['location']}</p>";
    echo "<div class='apply-btn'><a class='btn-gold' href='{$row['apply_link']}' target='_blank' role='button'>Apply Now</a></div>";
    echo "</div>";
  }
} else {
  echo "<p>No job listings found.</p>";
}

$conn->close();
?>
</div>
<aside class="job-aside-collab">
  <h3>Our Legacy Partners</h3>
  <p class="partner-intro">
  “In partnership with legacy innovators, we’re shaping a future-ready, inclusive workforce — where experience meets vision.”
  </p>
  <div class="partner-grid">
    <img src="images/jobs/partner1.png" alt="Partner 1 logo"><hr class="divider">
    <img src="images/jobs/partner5.svg" alt="Partner 5 logo"><hr class="divider">
    <img src="images/jobs/partner2.png" alt="Partner 2 logo"><hr class="divider">
    <img src="images/jobs/partner3.svg" alt="Partner 3 logo"><hr class="divider">
    <img src="images/jobs/partner4.svg" alt="Partner 4 logo">
  </div>
</aside>
</div>

<!-- Aside -->
<div class="job-help">
  <div class="job-help-slogan">
    <h3>Our commitment to diversity and inclusion</h3>
    We’re committed to creating a workforce where everyone feels safe, supported and able to progress in their
    careers. We recognise that diversity in our workforce strengthens our work in the community.
  </div>
  <a class="support-link" href="https://www.indigenous.gov.au/" target="_blank">
    <img src="images/jobs/fn.jpg" alt="We support First Nations people">
  </a>
  <a class="support-link" href="https://wit.org.au/" target="_blank">
    <img src="images/jobs/wit.jpg" alt="We support women in tech">
  </a>
  <a class="support-link" href="https://www.disabilitygateway.gov.au/" target="_blank">
    <img src="images/jobs/dis.jpg" alt="We support disability inclusion">
  </a>
  <a class="support-link" href="https://www.youth.gov.au/" target="_blank">
    <img src="images/jobs/yt.jpg" alt="We support young Australians">
  </a>
  <a class="support-link" href="https://aifs.gov.au" target="_blank">
    <img src="images/jobs/mv.jpg" alt="We support multicultural voices">
  </a>
  <a class="support-link" href="https://www.medicarementalhealth.gov.au/" target="_blank">
    <img src="images/jobs/wa.jpg" alt="We support mental wellbeing for all">
  </a>
</div>

<!-- Footer -->
<?php include("footer.inc"); ?>
