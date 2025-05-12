<!DOCTYPE html>
<html lang="en">
    <!-- head -->
	<head>
		<meta charset="utf-8">
        <meta name="description" content="SwinTech Homepage">
		<meta name="keywords" content="php, Doctype, Head, Body, Meta, Paragraph, Headings, Strong, Emphasis, form">
		<meta name="author: " content="Chea Roelink">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Homepage - SwinTech</title>
        <link rel="stylesheet" href="styles/styles.css">
    </head>

    <!-- body -->
    <body id="index-body">
        <!-- header -->
        <?php include("../project2/header.inc"); ?>
        <?php include("../project2/nav.inc"); ?>
              <!--- feedback aside --->
        <aside class="jobs-contact-aside" aria-label="Contact Us Sidebar">
        
            <input type="checkbox" id="jobs-contact-toggle" class="jobs-contact-toggle" hidden>
        
            <label for="contact-toggle" class="jobs-contact-btn" aria-label="Open Contact Form">
            <span class="jobs-contact-icon">💬</span>
            </label>
        
            <!-- contact panel -->
            <div class="jobs-contact-panel">
            <!-- close button -->
            <label for="jobs-contact-toggle" class="jobs-contact-close" aria-label="Close Contact Form">×</label>
        
            <h3 class="jobs-contact-title">Contact Us</h3>
            <p class="jobs-contact-note">
                We value every voice. Whether you have questions, feedback, or just want to say hi — this is the place.
                Our team reads every message, and we’ll get back to you as soon as we can.
            </p>
            <form method="post" class="jobs-contact-form">
                <label for="jobs-contact-name">Name</label>
                <input type="text" id="jobs-contact-name" name="jobs-contact-name" >
                
                <label for="jobs-contact-phone">Phone</label>
                <input type="email" id="jobs-contact-phone" name="jobs-contact-phone" >

                <label for="jobs-contact-email">Email</label>
                <input type="email" id="jobs-contact-email" name="jobs-contact-email" >
        
                <label for="jobs-contact-message">Message</label>
                <textarea id="jobs-contact-message" name="jobs-contact-message" rows="5" ></textarea>
        
                <button type="submit" class="btn-gold" id="jobs-contact-form-submit">Send Message</button>
            </form>
            </div>
        </aside>
        <!-- main of body -->
        <main>
            <fieldset id="opening-fieldset-background">
                <h2 id="opening-heading">SwinTech</h2>
                <br>
                <h3 id="opening-text">Elevate your business with SwinTech's expert IT consulting. Our team of skilled professionals will provide tailored guidance and strategies to optimise your IT infrastructure, enhance efficiency, and drive innovation.</h3>
            </fieldset>
            <br>
            <fieldset id="master-fieldset-background">
                <fieldset class="company-description-fieldset-left">
                    <h2 id="company-description-heading">
                        Who we are:
                    </h2>
                    <br><br>
                    <h3 id="company-description-subheading-1">Innovation</h3>
                    <br><br>
                    <h4 id="company-description-text-left">
                        At SwinTech, innovation is not just a goal — it’s our starting point. We’re a student-led team of aspiring software engineers who believe that progress stems from bold ideas, practical curiosity, and a refusal to settle for “good enough.” Every line of code we write, every system we design, is driven by a desire to explore what’s possible — not just what’s been done before.<br>
                        Our projects blend creativity with real-world application. From cloud-native systems to responsive web platforms, we build not just to learn, but to solve. As the tech landscape evolves, so do we — learning new tools, adopting modern frameworks, and experimenting with emerging technologies like AI integration and microservice architecture. Innovation is not a department — it’s our culture.
                    </h4>
                    <br><br><br><br><br><br><br><br><br><br><br>
                    <h3 id="company-description-subheading-2">Community</h3>
                    <br><br>
                    <h4 id="company-description-text-left-2">
                        Behind every commit is a conversation, and behind every deployment is a team. At SwinTech, we believe that great software is built through collaboration, not isolation. We foster a supportive, respectful environment where ideas are challenged, voices are heard, and everyone contributes — whether you're writing your first CSS file or architecting a scalable backend.<br>
                        Our community values mentorship, peer review, and collective ownership of work. We celebrate small wins, learn from bugs together, and pick each other up when things don’t compile (literally or metaphorically). We’re proud of what we build — but more importantly, we’re proud of how we build it: together.<br>
                        As students, we know we’re still growing. But with the right team beside us, and a shared commitment to getting better every sprint, we’re confident in the impact we can make — now and in the future.
                    </h4>
                </fieldset>
            </fieldset>
            <fieldset class="master-mission-statement-fieldset" id="master-mission-statement-fieldset">
                <fieldset class="mission-statement-fieldset">
                    <h1 id="company-description-heading">
                        Our Mission:  
                    </h1> 
                    <h3 class="mission-statement-text">At SwinTech, our mission is simple yet ambitious: to build real solutions while building real skills. We are a student-driven development team committed to turning theory into practice through meaningful tech projects. We want our members to walk away not just with grades, but with portfolios, production experience, and confidence to step into the industry.<br><br>
                    We aim to create an environment where learning is active, collaboration is essential, and failure is just part of the iteration cycle. Whether we’re developing a client-side application, deploying a backend on the cloud, or debugging a stubborn CSS alignment issue — we treat each challenge as an opportunity to grow.
                </fieldset>
                <img src="styles/images/index_img/community-tech-help.jpg" alt="IT Consultant smiling" id="tech-help-img1">
            </fieldset>
        </main>
        <!-- Footer -->
        <?php include("../project2/footer.inc"); ?>
    </body>
</html>
