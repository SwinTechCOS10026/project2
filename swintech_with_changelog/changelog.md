<?php
$host = "127.0.0.1";
$user = "webuser";
$pwd = "supersecret";
$sql_db = "swintech";
?>

manager login
username: manager
password: manager123

v0.1 2025-05-21
Displays dumped EOI data only
Static HTML & PHP logic with styling
Enhancement page not finalized
apply.php EOI sql not finalized
index, jobs, about page finalized

v0.2 - planned
Float Manage link to far right
Manage page:
  Split layout: Left – Login, Right – Register
  login: match credentials from SQL; lock user out for 5 mins after 3 failed attempts
  registration: add form to register new managers
EOI controls:
  List all EOIs
  Search EOIs by Job Reference Number
  Search EOIs by Applicant Name (first, last, or both)
  Delete EOIs with a given job reference number
  Change EOI Status “New" to "Reviewed"
  Sort EOIs by selected field - name, ref no., date, etc
Add CSS animations

v0.3 - planned
Apply page finalisation:
  store submitted EOIs into database
  redirect to confirmation or error page on submission
Manage page finalisation:
  full CRUD funcitonality
Enhancement Page finalisation:
  add bullet list of implemented enhancements with evidence
  include at least 3 key improvements validation, DB ops, security

v1.0 - planned
HTML & CSS validation; 
WAVE check.


