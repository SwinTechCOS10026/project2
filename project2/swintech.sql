/*!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.5.25-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: swintech
-- ------------------------------------------------------
-- Server version	10.5.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

/*--*/;
/*-- Table structure for table `eoi`*/;
/*--*/;

DROP TABLE IF EXISTS `eoi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eoi` (
  `EOInumber` int(11) NOT NULL AUTO_INCREMENT,
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
  `skill1` BOOLEAN DEFAULT FALSE,               -- e.g. HTML
  `skill2` BOOLEAN DEFAULT FALSE,               -- e.g. CSS
  `skill3` BOOLEAN DEFAULT FALSE,               -- e.g. JavaScript
  `skill4` BOOLEAN DEFAULT FALSE,
  `other_skills` text DEFAULT NULL,
  `status` enum('New','Current','Final') DEFAULT 'New',
  `application_date` date DEFAULT curdate(),
  PRIMARY KEY (`EOInumber`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*--*/;
/*-- Dumping data for table `eoi`*/;
/*--*/;

LOCK TABLES `eoi` WRITE;
/*!40000 ALTER TABLE `eoi` DISABLE KEYS */;
INSERT INTO `eoi` VALUES (1,'DEV001','Alice','Nguyen','1995-04-22','Female','12 Main St','Melbourne','VIC','3000','alice.nguyen@example.com','0412000001', 'I am highly motivated and eager to contribute.', 'I worked as a customer service assistant for two years.', TRUE, FALSE, FALSE, TRUE, 'Knows Bootstrap','New','2025-05-14'),(2,'IT002','Jason','Chen','1990-12-01','Male','55 York Ave','Sydney','NSW','2000','jason.chen@example.com','0422000002', 'I bring a positive attitude to every task.', 'I managed inventory in a retail store.', TRUE, FALSE, FALSE, TRUE, 'Familiar with helpdesk tools','Current','2025-05-14'),(3,'DEV001','Mia','Patel','2000-07-15','Female','77 King St','Brisbane','QLD','4000','mia.patel@example.com','0433000003', 'I bring a positive attitude to every task.', 'I helped coordinate events at a local community center.', TRUE, FALSE, FALSE, TRUE, 'asdasd','New','2025-05-14'),(4,'DEV003','Ethan','Lee','1998-11-09','Male','5 Ocean Rd','Perth','WA','6000','ethan.lee@example.com','0444000004', 'I learn quickly and adapt to new systems.', 'I did data entry and filing at an office job.', TRUE, FALSE, FALSE, TRUE, 'Worked on SQL reports','Final','2025-05-14'),(5,'IT004','Sophia','Zhao','1993-05-28','Female','9 Elm Street','Adelaide','SA','5000','sophia.zhao@example.com','0455000005', 'I have strong communication and teamwork skills.', 'I volunteered as a tutor for high school students.', TRUE, FALSE, FALSE, TRUE, '','New','2025-05-14'),(6,'DEV001','Tom','Williams','1988-01-10','Male','321 Creek Rd','Hobart','TAS','7000','tom.williams@example.com','0466000006', 'I take initiative and solve problems effectively.', 'I assisted with social media for a small business.', TRUE, FALSE, FALSE, TRUE, 'Basic Python skills','Current','2025-05-14'),(7,'DEV002','Lily','Tran','1997-08-19','Other','89 George St','Canberra','ACT','2601','lily.tran@example.com','0477000007', 'I am passionate about the role and your company.', 'I completed an internship in an administrative role.', TRUE, FALSE, FALSE, TRUE, 'Can work remotely','New','2025-05-14');
/*!40000 ALTER TABLE `eoi` ENABLE KEYS */;
UNLOCK TABLES;

/*--*/;
/*-- Table structure for table `jobs`*/;
/*--*/;

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `days_to_close` int(11) DEFAULT 30,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

/*--*/;
/*-- Dumping data for table `jobs`*/;
/*--*/;

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES ('dat01','Data Analyst','You’ll be at the heart of Swintech’s data-driven initiatives, helping leaders make informed decisions across sales, marketing, and product teams. Your work will shape everything from campaign targeting to platform optimisation.','$95,000 – $125,000','A future-proof role with access to mentorship, cutting-edge tools, and the freedom to explore new ways of working. You’ll enjoy remote flexibility, growth pathways, and a strong support network across the organisation.','Clean, transform and analyse large datasets from multiple sources;\nBuild dashboards using tools like Power BI or Tableau;\nPresent findings to stakeholders and support data storytelling;\nWork closely with engineering to ensure data accuracy and integrity;\nContribute to data governance and documentation practices','Proficiency in SQL and data visualisation tools is essential;\nExperience with Python or R for statistical analysis is a plus;\nStrong communication skills and attention to detail are key in turning numbers into impact','Swintech’s data team is curious, collaborative, and always improving. We encourage experimentation, value clarity over complexity, and believe data should always serve real people.',1,'Brunswick','apply.php',60),('dat12','Data Engineer','You’ll develop and maintain robust ETL pipelines and real-time data platforms to empower analytics and machine learning initiatives. You’ll work with large datasets, build data lakes and warehouses, and ensure secure, efficient data flows across the organisation.','$95,000 – $125,000','Swintech’s data function is growing rapidly, offering you exposure to modern tools and cloud-native architecture. You\'ll get career growth support, mentorship from senior engineers, and the autonomy to innovate.','Design, develop, and deploy scalable data infrastructure using tools like Spark, Airflow, and AWS;\nBuild and optimise data models to support reporting, AI, and product decision-making;\nCollaborate with data scientists, engineers, and analysts to deliver unified pipelines;\nEnsure data integrity, security, and compliance with internal policies;\nContinuously monitor and tune pipeline performance under high-volume conditions','Experience with big data frameworks (e.\nSpark, Flink);\ncloud data platforms (AWS/GCP);\ndata pipeline tools (Airflow, Kafka);\nSolid SQL skills and experience working in structured data environments are essential','Data is at the core of every decision at Swintech. We value curiosity, clean architecture, and clear thinking. Engineers here are encouraged to question, to measure, and to push the boundaries of what\'s possible with data.',0,'Wagga Wagga','apply.php',30),('dev01','Software Developer','You’ll join Swintech’s Banking Platform team as a Senior Engineer, delivering secure, scalable and innovative lending solutions. Your role centres around system analysis, high-level solution design, and leading delivery efforts for loan origination and digital banking features.','$95,000 – $125,000','You’ll be part of a 200-year-old organisation that continues to innovate. This role offers internal mobility, access to career development resources, and a hybrid work model. ','Lead design and implementation for Oracle Banking Platform integrations (REST APIs, Microservices);\nGuide developers through engineering standards, code reviews, and solution validation;\nTroubleshoot production issues using tools like Splunk and AppDynamics;\nAlign system designs with enterprise architecture and risk/security standards;\nContribute to documentation: system flows, design specs, and deployment guides','Strong experience in enterprise banking systems, ideally Oracle OBP or similar platforms;\nHands-on knowledge in Java, OSB, SOA, and REST APIs is expected;\nBonus for Jenkins, Bitbucket, Oracle tuning','We believe in people-first tech. At Swintech, engineers are empowered to shape systems that support millions of Australians. Expect a supportive environment where your ideas are valued and growth is part of the culture.',0,'Dandenong','apply.php',7),('dev02','Frontend Developer','You’ll build fast, scalable, and accessible user interfaces that shape how users interact with Swintech’s platforms. Working closely with UX/UI designers and backend engineers, your frontend architecture decisions will directly impact usability, speed, and performance.','$95,000 – $125,000','Join a creative engineering culture that values thoughtful design, clean code, and user-first development. Enjoy a flexible hybrid work model, mentorship, and opportunities to work on public-facing applications used by thousands.','Develop responsive interfaces with php, CSS, JavaScript, and modern frameworks like React or Vue;\nCollaborate with designers to bring wireframes to life with pixel-perfect fidelity;\nImplement web accessibility and performance best practices;\nIntegrate with RESTful APIs and handle real-time data updates;\nMaintain code quality through modular architecture and component reuse','Solid experience in frontend development with JavaScript/TypeScript;\nExperiencewith build tools (Webpack, Vite);\nExperience working in agile teams;\nBonus for knowledge of testing libraries like Jest or Cypress','At Swintech, we care as much about how things look and feel as how they function. You’ll join a collaborative team that values empathy, innovation, and the craft of interface development.',1,'Melbourne','apply.php',30),('op01','System Administrator','You’ll be supporting Swintech’s core infrastructure by ensuring reliable performance and uptime across all critical systems. Your role includes server management, patching, user account control, and escalation support.','$95,000 – $125,000','Join a dependable team where operational excellence is valued. This role offers on-the-job training, stable hours, and exposure to enterprise-grade systems. You\'ll enjoy job security and the satisfaction of keeping tech systems running smoothly.','Monitor and maintain Linux/Windows-based servers and cloud instances;\nApply system updates and perform regular security audits;\nRespond to IT incidents and user support requests with urgency;\nCoordinate with security and network teams to ensure compliance;\nDocument technical procedures and maintain runbooks','Experience in system administration, preferably with Windows Server and Linux;\nFamiliarity with Active Directory, PowerShell scripting, patching tools, and backup management is expected','Swintech values reliability and calm under pressure. You’ll work in a supportive, structured environment where documentation, teamwork, and system uptime are top priorities.',1,'Hawthorn','apply.php',12),('pm01','Project Manager','You’ll be responsible for end-to-end project delivery across Swintech’s major tech initiatives. From planning through execution and closure, you’ll keep things on track, communicate with stakeholders, and help unblock teams.','$95,000 – $125,000','Swintech offers a collaborative environment where project managers are empowered to lead. You’ll have the support of senior leadership, access to delivery frameworks, and pathways to grow into portfolio-level roles.','Define project scope, timelines, and deliverables in alignment with business objectives;\nFacilitate Agile ceremonies and promote continuous improvement across squads;\nProactively identify risks and implement mitigation strategies;\nWork closely with engineering, product, and compliance teams to ensure timely delivery;\nReport on project health to leadership and manage stakeholder expectations','Proven experience managing large-scale tech projects using Agile or hybrid methodologies;\nStrong communication, stakeholder engagement, and conflict resolution skills are essential;\nPMP or Scrum certification is a plus','Swintech thrives on structure without bureaucracy. You’ll join a team that respects process, values psychological safety, and believes project success depends on both results and relationships.',0,'Mildura','apply.php',70);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-19  1:27:29
