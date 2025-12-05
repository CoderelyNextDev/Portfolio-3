
CREATE DATABASE IF NOT EXISTS portfolio_db;
USE portfolio_db;

CREATE TABLE `experience` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `institution` varchar(200) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text
);

INSERT INTO `experience` (`id`, `title`, `institution`, `start_date`, `end_date`, `description`) VALUES
(1, 'BS in Information Technology', 'Camarines Sur Polytechnic Colleges', '2022-08-01', NULL, 'Currently pursuing a Bachelor of Information Technology degree in Information Technology with focus on web development, database management, and software engineering principles. Maintaining a strong academic record while actively participating in coding competitions and tech community events.'),
(2, 'Web Developer Intern', 'Tech Start Company', '2024-06-01', '2024-08-31', 'Developed and maintained responsive web applications using PHP and MySQL. Collaborated with senior developers to implement new features and optimize database queries. Gained hands-on experience in full-stack development and agile methodology.'),
(3, 'Freelance Web Designer', 'Self-Employed', '2023-01-01', '2024-05-31', 'Created custom websites for local businesses and startups. Managed client relationships, gathered requirements, and delivered projects on time. Specialized in creating responsive, SEO-friendly websites using modern web technologies.');


CREATE TABLE `personal_info` (
  `id` int NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `tagline` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `about_summary` text,
  `profile_picture_url` varchar(255) DEFAULT NULL
);

INSERT INTO `personal_info` (`id`, `full_name`, `tagline`, `email`, `phone_number`, `about_summary`, `profile_picture_url`) VALUES
(2, 'Emman James Sanchez', 'Full-Stack Web Developer & Database Enthusiast', 'emmanjames112715@email.com', '+63 912 345 6789', 'Passionate web developer with expertise in building dynamic, responsive websites. I specialize in PHP, MySQL, and modern frontend technologies. Currently pursuing a degree in Information Technology with a focus on web development and database management. I love solving complex problems and creating user-friendly digital experiences.', 'uploads/profile/my-profile.jpg');


CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `proficiency` int DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL
);

INSERT INTO `skills` (`id`, `skill_name`, `proficiency`, `category`) VALUES
(1, 'PHP', 85, 'Backend'),
(2, 'MySQL', 80, 'Database'),
(3, 'HTML5', 90, 'Frontend'),
(4, 'CSS3', 88, 'Frontend'),
(5, 'JavaScript', 75, 'Frontend'),
(6, 'Bootstrap', 82, 'Frontend'),
(7, 'Laravel', 78, 'Backend');

CREATE TABLE `projects` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(200) NOT NULL,
  `subtitle` VARCHAR(200) DEFAULT NULL,
  `description` TEXT,
  `technologies` TEXT,
  `project_image_url` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `projects` (`title`, `subtitle`, `description`, `technologies`, `project_image_url`) VALUES
('E-Commerce Platform', 'E-Commerce Platform', 'A full-featured e-commerce platform with real-time inventory management, secure payment integration using Stripe, and an intuitive admin dashboard. Features include product filtering, cart management, user authentication with OAuth flows, and order tracking.', 'HTML, CSS, JS, PHP, MYSQL', 'uploads/projects/e.png'),

('Task Management Dashboard', 'Task Management Dashboard', 'Collaborative project management tool with real-time updates, drag-and-drop task organization, team collaboration features, and progress tracking. Includes Kanban boards, Gantt charts, time tracking, and detailed analytics.', 'HTML, CSS, JS, PHP, Laravel', 'uploads/projects/task.png'),

('Weather Forecast App', 'Weather Forecast App', 'Beautiful weather application providing accurate forecasts with interactive maps, hourly predictions, and severe weather alerts. Features include location-based weather, 7-day forecasts, air quality index, UV index, and customizable widgets.', 'HTML, CSS, JS, PHP, MYSQL', 'uploads/projects/weather.png');


ALTER TABLE `experience`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `experience`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `personal_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;




