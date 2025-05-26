-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 26, 2025 at 04:13 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swintech`
--

-- --------------------------------------------------------

--
-- Table structure for table `eoi`
--

CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL,
  `job_ref` varchar(10) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `street_address` varchar(40) NOT NULL,
  `suburb` varchar(40) NOT NULL,
  `state` enum('VIC','NSW','QLD','NT','WA','SA','TAS','ACT') NOT NULL,
  `postcode` varchar(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `position_justification` text DEFAULT NULL,
  `related_work` text DEFAULT NULL,
  `skill1` tinyint(1) DEFAULT 0,
  `skill2` tinyint(1) DEFAULT 0,
  `skill3` tinyint(1) DEFAULT 0,
  `skill4` tinyint(1) DEFAULT 0,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `application_date` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eoi`
--

INSERT INTO `eoi` (`EOInumber`, `job_ref`, `first_name`, `last_name`, `dob`, `gender`, `street_address`, `suburb`, `state`, `postcode`, `email`, `phone`, `position_justification`, `related_work`, `skill1`, `skill2`, `skill3`, `skill4`, `other_skills`, `status`, `application_date`) VALUES
(11, 'op01', 'Carlos', 'Smith', '1980-09-03', 'Female', '74 Sample Street', 'Suburb42', 'TAS', '0740', 'carlos.smith@example.com', '0485992416', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 0, 1, 1, 1, 'Teamwork, fast learner.', 'Final', '2025-05-26'),
(12, 'op01', 'Deepak', 'Garcia', '1991-08-18', 'Male', '129 Sample Street', 'Suburb21', 'WA', '0808', 'deepak.garcia@example.com', '0452840633', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 0, 1, 1, 0, 'Teamwork, fast learner.', 'Current', '2025-05-26'),
(13, 'dat12', 'Carlos', 'Smith', '1987-06-18', 'Other', '65 Sample Street', 'Suburb26', 'TAS', '0385', 'carlos.smith@example.com', '0468230389', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 0, 0, 1, 0, 'Teamwork, fast learner.', 'Current', '2025-05-26'),
(14, 'op01', 'Deepak', 'Al-Fulan', '2004-03-22', 'Female', '151 Sample Street', 'Suburb49', 'NSW', '0919', 'deepak.al-fulan@example.com', '0429413373', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 1, 1, 1, 0, 'Teamwork, fast learner.', 'Final', '2025-05-26'),
(15, 'dev01', 'Elena', 'Garcia', '1985-04-15', 'Female', '66 Sample Street', 'Suburb30', 'TAS', '0358', 'elena.garcia@example.com', '0483987353', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 0, 1, 0, 0, 'Teamwork, fast learner.', 'Current', '2025-05-26'),
(16, 'pm01', 'Fatima', 'Tanaka', '2004-09-19', 'Male', '38 Sample Street', 'Suburb30', 'NSW', '0712', 'fatima.tanaka@example.com', '0487863907', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 1, 0, 0, 1, 'Teamwork, fast learner.', 'Current', '2025-05-26'),
(17, 'dev01', 'Mohammed', 'Smith', '1988-12-28', 'Male', '138 Sample Street', 'Suburb45', 'WA', '0661', 'mohammed.smith@example.com', '0487951934', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 0, 1, 0, 0, 'Teamwork, fast learner.', 'New', '2025-05-26'),
(18, 'pm01', 'Deepak', 'Al-Fulan', '1980-06-10', 'Male', '129 Sample Street', 'Suburb46', 'WA', '0753', 'deepak.al-fulan@example.com', '0494884183', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 1, 0, 0, 0, 'Teamwork, fast learner.', 'New', '2025-05-26'),
(19, 'dat01', 'Anna', 'Kowalski', '1982-11-12', 'Male', '199 Sample Street', 'Suburb7', 'NSW', '0778', 'anna.kowalski@example.com', '0423869686', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 1, 0, 1, 0, 'Teamwork, fast learner.', 'Current', '2025-05-26'),
(20, 'dat01', 'Aarav', 'Singh', '1997-08-29', 'Other', '38 Sample Street', 'Suburb43', 'WA', '0709', 'aarav.singh@example.com', '0498247847', 'I\'m passionate about this role.', 'Yes, I have relevant experience.', 0, 0, 1, 1, 'Teamwork, fast learner.', 'New', '2025-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` varchar(5) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` text NOT NULL,
  `salary_range` varchar(50) DEFAULT NULL,
  `benefits` varchar(255) DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `essential_qualifications` text DEFAULT NULL,
  `culture` text DEFAULT NULL,
  `remote_eligible` tinyint(1) DEFAULT 0,
  `location` varchar(100) DEFAULT NULL,
  `apply_link` varchar(255) DEFAULT NULL,
  `days_to_close` int(11) DEFAULT 30
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_title`, `job_description`, `salary_range`, `benefits`, `responsibilities`, `essential_qualifications`, `culture`, `remote_eligible`, `location`, `apply_link`, `days_to_close`) VALUES
('dat01', 'Data Analyst', 'You’ll be at the heart of Swintech’s data-driven initiatives, helping leaders make informed decisions across sales, marketing, and product teams. Your work will shape everything from campaign targeting to platform optimisation.', '$95,000 – $125,000', 'A future-proof role with access to mentorship, cutting-edge tools, and the freedom to explore new ways of working. You’ll enjoy remote flexibility, growth pathways, and a strong support network across the organisation.', 'Clean, transform and analyse large datasets from multiple sources;\nBuild dashboards using tools like Power BI or Tableau;\nPresent findings to stakeholders and support data storytelling;\nWork closely with engineering to ensure data accuracy and integrity;\nContribute to data governance and documentation practices', 'Proficiency in SQL and data visualisation tools is essential;\nExperience with Python or R for statistical analysis is a plus;\nStrong communication skills and attention to detail are key in turning numbers into impact', 'Swintech’s data team is curious, collaborative, and always improving. We encourage experimentation, value clarity over complexity, and believe data should always serve real people.', 1, 'Brunswick', 'apply.php', 60),
('dat12', 'Data Engineer', 'You’ll develop and maintain robust ETL pipelines and real-time data platforms to empower analytics and machine learning initiatives. You’ll work with large datasets, build data lakes and warehouses, and ensure secure, efficient data flows across the organisation.', '$95,000 – $125,000', 'Swintech’s data function is growing rapidly, offering you exposure to modern tools and cloud-native architecture. You\'ll get career growth support, mentorship from senior engineers, and the autonomy to innovate.', 'Design, develop, and deploy scalable data infrastructure using tools like Spark, Airflow, and AWS;\nBuild and optimise data models to support reporting, AI, and product decision-making;\nCollaborate with data scientists, engineers, and analysts to deliver unified pipelines;\nEnsure data integrity, security, and compliance with internal policies;\nContinuously monitor and tune pipeline performance under high-volume conditions', 'Experience with big data frameworks (e.\nSpark, Flink);\ncloud data platforms (AWS/GCP);\ndata pipeline tools (Airflow, Kafka);\nSolid SQL skills and experience working in structured data environments are essential', 'Data is at the core of every decision at Swintech. We value curiosity, clean architecture, and clear thinking. Engineers here are encouraged to question, to measure, and to push the boundaries of what\'s possible with data.', 0, 'Wagga Wagga', 'apply.php', 30),
('dev01', 'Software Developer', 'You’ll join Swintech’s Banking Platform team as a Senior Engineer, delivering secure, scalable and innovative lending solutions. Your role centres around system analysis, high-level solution design, and leading delivery efforts for loan origination and digital banking features.', '$95,000 – $125,000', 'You’ll be part of a 200-year-old organisation that continues to innovate. This role offers internal mobility, access to career development resources, and a hybrid work model. ', 'Lead design and implementation for Oracle Banking Platform integrations (REST APIs, Microservices);\nGuide developers through engineering standards, code reviews, and solution validation;\nTroubleshoot production issues using tools like Splunk and AppDynamics;\nAlign system designs with enterprise architecture and risk/security standards;\nContribute to documentation: system flows, design specs, and deployment guides', 'Strong experience in enterprise banking systems, ideally Oracle OBP or similar platforms;\nHands-on knowledge in Java, OSB, SOA, and REST APIs is expected;\nBonus for Jenkins, Bitbucket, Oracle tuning', 'We believe in people-first tech. At Swintech, engineers are empowered to shape systems that support millions of Australians. Expect a supportive environment where your ideas are valued and growth is part of the culture.', 0, 'Dandenong', 'apply.php', 7),
('dev02', 'Frontend Developer', 'You’ll build fast, scalable, and accessible user interfaces that shape how users interact with Swintech’s platforms. Working closely with UX/UI designers and backend engineers, your frontend architecture decisions will directly impact usability, speed, and performance.', '$95,000 – $125,000', 'Join a creative engineering culture that values thoughtful design, clean code, and user-first development. Enjoy a flexible hybrid work model, mentorship, and opportunities to work on public-facing applications used by thousands.', 'Develop responsive interfaces with php, CSS, JavaScript, and modern frameworks like React or Vue;\nCollaborate with designers to bring wireframes to life with pixel-perfect fidelity;\nImplement web accessibility and performance best practices;\nIntegrate with RESTful APIs and handle real-time data updates;\nMaintain code quality through modular architecture and component reuse', 'Solid experience in frontend development with JavaScript/TypeScript;\nExperiencewith build tools (Webpack, Vite);\nExperience working in agile teams;\nBonus for knowledge of testing libraries like Jest or Cypress', 'At Swintech, we care as much about how things look and feel as how they function. You’ll join a collaborative team that values empathy, innovation, and the craft of interface development.', 1, 'Melbourne', 'apply.php', 30),
('op01', 'System Administrator', 'You’ll be supporting Swintech’s core infrastructure by ensuring reliable performance and uptime across all critical systems. Your role includes server management, patching, user account control, and escalation support.', '$95,000 – $125,000', 'Join a dependable team where operational excellence is valued. This role offers on-the-job training, stable hours, and exposure to enterprise-grade systems. You\'ll enjoy job security and the satisfaction of keeping tech systems running smoothly.', 'Monitor and maintain Linux/Windows-based servers and cloud instances;\nApply system updates and perform regular security audits;\nRespond to IT incidents and user support requests with urgency;\nCoordinate with security and network teams to ensure compliance;\nDocument technical procedures and maintain runbooks', 'Experience in system administration, preferably with Windows Server and Linux;\nFamiliarity with Active Directory, PowerShell scripting, patching tools, and backup management is expected', 'Swintech values reliability and calm under pressure. You’ll work in a supportive, structured environment where documentation, teamwork, and system uptime are top priorities.', 1, 'Hawthorn', 'apply.php', 12),
('pm01', 'Project Manager', 'You’ll be responsible for end-to-end project delivery across Swintech’s major tech initiatives. From planning through execution and closure, you’ll keep things on track, communicate with stakeholders, and help unblock teams.', '$95,000 – $125,000', 'Swintech offers a collaborative environment where project managers are empowered to lead. You’ll have the support of senior leadership, access to delivery frameworks, and pathways to grow into portfolio-level roles.', 'Define project scope, timelines, and deliverables in alignment with business objectives;\nFacilitate Agile ceremonies and promote continuous improvement across squads;\nProactively identify risks and implement mitigation strategies;\nWork closely with engineering, product, and compliance teams to ensure timely delivery;\nReport on project health to leadership and manage stakeholder expectations', 'Proven experience managing large-scale tech projects using Agile or hybrid methodologies;\nStrong communication, stakeholder engagement, and conflict resolution skills are essential;\nPMP or Scrum certification is a plus', 'Swintech thrives on structure without bureaucracy. You’ll join a team that respects process, values psychological safety, and believes project success depends on both results and relationships.', 0, 'Mildura', 'apply.php', 70);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE `managers` (
  `manager_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`manager_id`, `username`, `password_hash`, `created_at`) VALUES
(2, 'manager', '$2y$10$iEsAbgwLkqMeI4VoE1rUh.PoLO7vTJdHrDjaldkybaA8qHvHSlso6', '2025-05-25 02:27:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eoi`
--
ALTER TABLE `eoi`
  ADD PRIMARY KEY (`EOInumber`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `managers`
--
ALTER TABLE `managers`
  ADD PRIMARY KEY (`manager_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eoi`
--
ALTER TABLE `eoi`
  MODIFY `EOInumber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `managers`
--
ALTER TABLE `managers`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
