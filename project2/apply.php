<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<div class="manage-banner">
  <img src="images/apply_img/banner.jpg" alt="Apply Banner">
   <div class="banner-text">Join Us</div>
</div>
    <div class="apply-wrapper">
        <h2 class="apply-title">Job Application Form</h2>
        <form action="https://mercury.swin.edu.au/it000000/formtest.php" method="post" class="apply-form">
            <div class="apply-form-section">
                <fieldset class="apply-fieldset">
                    <legend class="apply-legend">Personal Details</legend>

                    <div class="form-row">
                        <label for="fname">First Name:</label>
                        <input type="text" id="fname" name="fname" pattern="[A-Za-z]{1,20}" placeholder="" required>
                    </div>

                    <div class="form-row">
                        <label for="lname">Family Name:</label>
                        <input type="text" id="lname" name="lname" pattern="[A-Za-z]{1,20}" placeholder="" required>
                    </div>

                    <div class="form-row">
                        <label for="dob">Date of birth:</label>
                        <input type="date" id="dob" name="dob" required>
                    </div>

                    <div class="form-row">
                        <label for="phonenum">Phone Number:</label>
                        <input type="tel" id="phonenum" name="phonenum" pattern="[0-9]{8,12}" placeholder="" required>
                    </div>
                    <div class="form-row">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="" required>
                    </div>
                      <div class="form-row">
                        <label for="gender">Gender</label>
                            <select name="gender" id="gender" required>
                            <option value="" disabled selected>Select your gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                            </select>
                    </div>
                </fieldset>

                <fieldset class="apply-fieldset">
                    <legend class="apply-legend">Job Position</legend>

                    <div class="form-row">
                        <label for="jobref">Job Reference Numer:</label>
                            <select name="jobref" id="jobref" required>
                            <option value="" disabled selected>Select Job Reference</option>
                            <option value="00012">00012</option>
                            <option value="00026">00026</option>
                            <option value="00027">00027</option>
                            </select>
                    </div>
                    
                    <div class="form-row">
                            <label for="state">State:</label>
                           <select name="state" id="state" required>
                            <option value="" disabled selected>Select State</option>
                            <option value="vic">VIC</option>
                            <option value="tas">TAS</option>
                            <option value="wa">WA</option>
                            <option value="sa">SA</option>
                            <option value="qld">QLD</option>
                            <option value="nsw">NSW</option>
                            <option value="act">ACT</option>
                            <option value="nt">NT</option>
                            </select>
                    </div>
                    
                    <div class="form-row">
                        <label for="postcode">Postcode:</label>
                        <input type="number" id="postcode" name="postcode" min="200" max="9924" placeholder = "" required>
                    </div>

                    <div class="form-row">
                        <label for="streetaddress">Street Address:</label>
                        <input type="text" id="streetaddress" name="streetaddress" maxlength="40" placeholder="" required>
                    </div>

                    <div class="form-row">
                        <label for="address">Home Address:</label>
                        <input type="text" id="address" name="address" pattern=".{5,100}" placeholder=""  required>
                    </div>
                </fieldset>
            </div>

            <fieldset class="apply-fieldset">
                <legend class="apply-legend">Questions</legend>

                <div class="form-row">
                    <label for="q1">Why do you believe you deserve this position?</label>
                    <textarea id="q1" name="q1" rows="4" cols="50" placeholder="Your text here"></textarea>
                </div>

                <div class="form-row checkbox-row">
                    <label>Do you have previous experience in this line of work?</label>
                      <label>
                        <input type="checkbox" name="prevex-yes"> Yes
                      </label>
                      
                      <label>
                        <input type="checkbox" name="prevex-no"> No
                      </label>
                </div>

                <div class="form-row">
                    <label for="q2">What kind of past experience do you believe makes you qualified for this
                        position?</label>
                        <textarea id="q2" name="q2" rows="4" cols="50" placeholder="Your text here"></textarea>
                </div>
                <div class="form-row">
                    <fieldset>
                        <legend>Required Technical List: </legend>
                        <input type="checkbox" id="swin" name="techlist" value="swin">
                        <label for="swin">Attending Swinburne?</label><br>
                        <input type="checkbox" id="php" name="techlist" value="php">
                        <label for="php">Know how to use php</label><br>
                    </fieldset>
                </div>
                <div class="form-row">
                    <label for="relskills">Other Relevent Skills:</label>
                    <textarea id="relskills" name="relskills" rows="4" cols="50" placeholder="Your text here"></textarea>
                </div>
            </fieldset>

            <div class="form-row">
                <button id="apply-btn" type="submit" class="btn-gold">Apply</button>
            </div>
        </form>
    </div>

    <!-- Footer -->
<?php include("footer.inc"); ?>
