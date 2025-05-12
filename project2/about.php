<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Set character encoding and make the page responsive on all devices -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="The core team of SwinTech">
    <!-- Title of the page shown in the browser tab -->
    <title>About Us - SwinTech</title>

    <!-- Google Fonts: Preload and use custom fonts for better styling -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@100..900&family=Onest:wght@100..900&display=swap" rel="stylesheet">

    <!-- Link to our main external stylesheet for styling -->
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <!-- Page header including navigation and logo -->
    <?php include("../project2/header.inc"); ?>
    <?php include("../project2/nav.inc"); ?>

    <!-- Main content of the About Us page -->
    <main class="about-us-container">

        <!-- Section: Introduction -->
        <section class="about-us-intro">
            <h1 class="about-us-title fade-in">About Us</h1>
            <p class="about-us-subtitle slide-up">Welcome to SwinTech!</p>
            <p class="about-us-subtext slide-up">We're a group of student-led Software Engineers, united in a mission to advance our users' careers.</p>
        </section>

        <!-- Section: Group information including name, time, student IDs, tutor -->
        <section class="about-us-group-info">
            <h2 class="about-us-section-title">Group Info</h2>
            <ul class="about-us-list">
                <li><strong>Group Name:</strong> SwinTech</li>
                <li><strong>Class Time and Day:</strong>
                    <!-- Nested list showing the class time -->
                    <ul class="about-us-sublist">
                        <li>Monday, 2:30 - 4:30 PM</li>
                    </ul>
                </li>
                <li><strong>Student IDs:</strong>
                    <!-- Nested list with each group member and their student ID -->
                    <ul class="about-us-sublist">
                        <li>Yaoxin - 105478372</li>
                        <li>Nadid - 105751455</li>
                        <li>Chea - 105478372</li>
                        <li>Jack - 105913093</li>
                    </ul>
                </li>
                <li><strong>Tutor's Name:</strong> Nick</li>
            </ul>
        </section>

        <!-- Section: Project contributions by each member -->
        <section class="about-us-contributions">
            <h2 class="about-us-section-title">Project Contributions</h2>
            <dl class="about-us-def-list">
                <!-- Using definition list to show who did what -->
                <dt>Nadid</dt>
                <dd>Team Leader - Engineered the About Us page and led team communication.</dd>
                <dt>Chea</dt>
                <dd>Designed and built the Homepage (Index).</dd>
                <dt>Yaoxin</dt>
                <dd>Created the Jobs page with interactive job listings.</dd>
                <dt>Jack</dt>
                <dd>Developed the Apply page including forms and validations.</dd>
            </dl>
        </section>

        <!-- Section: Team photo -->
        <section class="about-us-photo">
            <h2 class="about-us-section-title">Our Group Photo</h2>
            <figure class="about-us-figure">
                <!-- Image of the group with a caption -->
                <img src="styles/images/about_img/swintech-group-photo.jpg" alt="Group photo of SwinTech team" width="400">
                <figcaption>Our awesome team at Swinburne campus</figcaption>
            </figure>
        </section>

        <!-- Section: Table showing team hobbies and languages -->
        <section class="about-us-table-section">
            <h2 class="about-us-section-title">Group Members Interests</h2>
            <table class="about-us-interest-table" border="1">
                <caption>Our Interests and Hobbies</caption>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Hobby</th>
                        <th>Favourite Language</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nadid</td>
                        <td>Reading Sci-Fi</td>
                        <!-- Merged language for Nadid and Chea -->
                        <td rowspan="2">Python, C++</td>
                    </tr>
                    <tr>
                        <td>Chea</td>
                        <td>Video Editing</td>
                    </tr>
                    <tr>
                        <td>Yaoxin</td>
                        <td>Gaming</td>
                        <td>JavaScript, Python</td>
                    </tr>
                    <tr>
                        <td>Jack</td>
                        <!-- Combined hobby and language in one cell -->
                        <td colspan="2">Loves cycling and exploring frontend frameworks</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <!-- Section: Country flags showing team diversity -->
        <section class="about-us-profile">
            <h2 class="about-us-section-title">Group Profile</h2>
            <div class="profile-flags" id="profile-flags">
                <p>🌍 Our team comes from:</p>
                <div class="flag-container">
                    <!-- Display flags and country names -->
                    <div class="flag-box"><img src="styles/images/about_flags/au.png" alt="Australia Flag"><span>Australia</span></div>
                    <div class="flag-box"><img src="styles/images/about_flags/uae.png" alt="UAE Flag"><span>UAE</span></div>
                    <div class="flag-box"><img src="styles/images/about_flags/china.png" alt="China Flag"><span>China</span></div>
                </div>
            </div>

            <!-- Summary paragraph about team culture -->
            <div class="profile-summary fade-in">
                <p>We bring a mix of first-year energy and part-time dev hustle 💪. Our strengths lie in collaboration, clean code, and creative thinking. Together, we make SwinTech more than just a team—it's a vibe.</p>
            </div>

            <!-- Language flip cards showing languages spoken by team members -->
            <div class="language-card-section">
                <h3 class="about-us-favorites-heading">🗣 Languages We Speak</h3>
                <div class="flip-card-wrapper">
                    <!-- Each flip card has a front and back -->
                    <div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">English</div><div class="flip-card-back">All members fluent</div></div></div>
                    <div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">Mandarin</div><div class="flip-card-back">Spoken by Yaoxin</div></div></div>
                    <div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">Arabic</div><div class="flip-card-back">Spoken by Nadid</div></div></div>
                    <div class="flip-card"><div class="flip-card-inner"><div class="flip-card-front">Japanese</div><div class="flip-card-back">Spoken by Chea</div></div></div>
                </div>
            </div>

            <!-- Bar graphs for each member's coding experience level -->
            <div class="experience-bars">
                <h3 class="about-us-favorites-heading">🧠 Coding Experience</h3>
                <div class="exp-bar"><span>php</span><div class="bar bar-php"></div></div>
                <div class="exp-bar"><span>CSS</span><div class="bar bar-css"></div></div>
                <div class="exp-bar"><span>JavaScript</span><div class="bar bar-js"></div></div>
                <div class="exp-bar"><span>Python</span><div class="bar bar-python"></div></div>
                <div class="exp-bar"><span>Java</span><div class="bar bar-java"></div></div>
            </div>

            <!-- List of team’s favorite things -->
            <h3 class="about-us-favorites-heading">🎯 Our Top 3 Favorite Things</h3>
            <ul class="about-us-favorites enhanced-favorites">
                <li><strong>📚 Books:</strong> <em>Steve Jobs</em>, <em>The Art of Computer Programming</em></li>
                <li><strong>🎬 Movies:</strong> <em>Inception</em>, <em>The Social Network</em></li>
                <li><strong>🎧 Music:</strong> <em>Lo-fi, Indie Rock, K-Pop</em></li>
            </ul>
        </section>
    </main>

    <!-- Page footer with contact info, navigation, newsletter, and external links -->
    <?php include("../project2/footer.inc"); ?>
</body>
</html>
