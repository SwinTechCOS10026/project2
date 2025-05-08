-- COS10026 Web Technology Project - Part 2 (Group Work)
-- Description:
--      This SQL script creates the database and tables required for the Expression of Interest (EOI)
--      application system, including job listings and user-submitted EOI data with management capabilities.

-- Step 1: Create the database for the project
-- Run this in phpMyAdmin > SQL tab
CREATE DATABASE IF NOT EXISTS cos10026_project;

-- Tell MySQL to use this database from now on
USE cos10026_project;

-- Step 2: Create the 'jobs' table
-- This table holds all job ads available for application.
-- Each job has a reference number, a title, a description, and a list of requirements.
CREATE TABLE IF NOT EXISTS jobs (
    job_ref VARCHAR(10) PRIMARY KEY,         -- Job Reference Number (e.g. DEV001)
    title VARCHAR(100) NOT NULL,             -- Job title (e.g. "Junior Web Developer")
    description TEXT,                        -- Short description of the job role
    requirements TEXT                        -- List of required skills or qualifications
);

-- Optional: Insert some dummy job ads for testing
INSERT INTO jobs (job_ref, title, description, requirements)
VALUES
('DEV001', 'Web Developer', 'Develop modern web applications.', 'HTML, CSS, JavaScript, PHP'),
('IT002', 'IT Support Officer', 'Provide tech support for internal systems.', 'Communication, Windows OS, Networking');

-- Step 3: Create the 'eoi' table
-- This is the main table that stores application data submitted through the form on the website.
-- Each application is uniquely identified by EOInumber.
CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,   -- Unique auto-generated ID for each EOI

    -- Foreign key linking to the jobs table (job_ref must exist in 'jobs')
    job_ref VARCHAR(10) NOT NULL,               -- Job reference number the user is applying for
    CONSTRAINT fk_job_ref FOREIGN KEY (job_ref) REFERENCES jobs(job_ref),

    -- Personal information
    first_name VARCHAR(20) NOT NULL,            -- Applicant's first name
    last_name VARCHAR(20) NOT NULL,             -- Applicant's last name
    street_address VARCHAR(40) NOT NULL,        -- Street part of the address
    suburb VARCHAR(40) NOT NULL,                -- Suburb or town
    state ENUM('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT') NOT NULL, -- Australian state
    postcode CHAR(4) NOT NULL,                  -- Must be exactly 4 digits

    -- Contact information
    email VARCHAR(100) NOT NULL,                -- Email address
    phone VARCHAR(12) NOT NULL,                 -- Phone number (accepts 10-12 digits)

    -- Skills checkboxes (TRUE or FALSE for each skill)
    skill1 BOOLEAN DEFAULT FALSE,               -- e.g. HTML
    skill2 BOOLEAN DEFAULT FALSE,               -- e.g. CSS
    skill3 BOOLEAN DEFAULT FALSE,               -- e.g. JavaScript
    skill4 BOOLEAN DEFAULT FALSE,               -- e.g. SQL

    -- Extra information if applicant has other skills
    other_skills TEXT,                          -- Free text box input

    -- Application status
    -- When a user submits an EOI, status starts as "New"
    -- Manager can later change it to "Current" or "Final"
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);

-- Add dummy EOI submissions to test with (TEST)
INSERT INTO eoi (job_ref, first_name, last_name, street_address, suburb, state, postcode, email, phone, skill1, skill2, skill3, skill4, other_skills)
VALUES
('DEV001', 'Alice', 'Smith', '12 Test St', 'Melbourne', 'VIC', '3000', 'alice@example.com', '0412345678', TRUE, TRUE, FALSE, FALSE, 'Basic React experience'),
('IT002', 'Bob', 'Jones', '45 King St', 'Sydney', 'NSW', '2000', 'bob@example.com', '0498765432', TRUE, FALSE, TRUE, TRUE, 'Knows Office 365');


-- Run this file in phpMyAdmin or via mysql CLI:
--    1. Open XAMPP
--    2. Start Apache and MySQL
--    3. Visit http://localhost/phpmyadmin
--    4. Go to SQL tab and paste this file content