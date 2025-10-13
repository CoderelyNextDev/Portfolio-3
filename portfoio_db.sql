-- Create the database
CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

-- Table: personal_info
CREATE TABLE personal_info (
    id INT PRIMARY KEY AUTO_INCREMENT,
    full_name VARCHAR(100) NOT NULL,
    tagline VARCHAR(200),
    email VARCHAR(100),
    phone_number VARCHAR(20),
    about_summary TEXT,
    profile_picture_url VARCHAR(255)
);

-- Table: skills
CREATE TABLE skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    skill_name VARCHAR(100) NOT NULL,
    proficiency INT CHECK (proficiency BETWEEN 1 AND 100),
    category VARCHAR(50)
);

-- Table: experience
CREATE TABLE experience (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(150) NOT NULL,
    institution VARCHAR(200),
    start_date DATE,
    end_date DATE,
    description TEXT
);

-- Sample data for personal_info
INSERT INTO personal_info (full_name, tagline, email, phone_number, about_summary, profile_picture_url) 
VALUES (
    'Juan Dela Cruz',
    'Full-Stack Web Developer & Database Enthusiast',
    'juan.delacruz@email.com',
    '+63 912 345 6789',
    'Passionate web developer with expertise in building dynamic, responsive websites. I specialize in PHP, MySQL, and modern frontend technologies. Currently pursuing a degree in Information Technology with a focus on web development and database management. I love solving complex problems and creating user-friendly digital experiences.',
    'assets/profile.jpg'
);

-- Sample data for skills
INSERT INTO skills (skill_name, proficiency, category) VALUES
('PHP', 85, 'Backend'),
('MySQL', 80, 'Database'),
('HTML5', 90, 'Frontend'),
('CSS3', 88, 'Frontend'),
('JavaScript', 75, 'Frontend'),
('Bootstrap', 82, 'Frontend'),
('Git & GitHub', 78, 'Tools'),
('RESTful APIs', 70, 'Backend'),
('Responsive Design', 85, 'Frontend'),
('Database Design', 83, 'Database');

-- Sample data for experience
INSERT INTO experience (title, institution, start_date, end_date, description) VALUES
(
    'BS in Information Technology',
    'Camarines Sur Polytechnic Colleges',
    '2022-08-01',
    NULL,
    'Currently pursuing a Bachelor of Science degree in Information Technology with focus on web development, database management, and software engineering principles. Maintaining a strong academic record while actively participating in coding competitions and tech community events.'
),
(
    'Web Developer Intern',
    'TechStart Solutions Inc.',
    '2024-06-01',
    '2024-08-31',
    'Developed and maintained responsive web applications using PHP and MySQL. Collaborated with senior developers to implement new features and optimize database queries. Gained hands-on experience in full-stack development and agile methodology.'
),
(
    'Freelance Web Designer',
    'Self-Employed',
    '2023-01-01',
    '2024-05-31',
    'Created custom websites for local businesses and startups. Managed client relationships, gathered requirements, and delivered projects on time. Specialized in creating responsive, SEO-friendly websites using modern web technologies.'
);