<?php
require_once 'config/db_connect.php'; 

function getPersonalInfo() {
    global $conn;
    $sql = "SELECT * FROM personal_info WHERE id = 2";
    $result = $conn->query($sql);
    return $result->fetch_assoc();
}

function getExperiences() {
    global $conn;
    $sql = "SELECT * FROM experience ORDER BY start_date DESC";
    $result = $conn->query($sql);
    $experiences = [];
    while ($row = $result->fetch_assoc()) {
        $experiences[] = $row;
    }
    return $experiences;
}

function getSkills() {
    global $conn;
    $sql = "SELECT * FROM skills ORDER BY category, proficiency DESC";
    $result = $conn->query($sql);
    $skills = [];
    while ($row = $result->fetch_assoc()) {
        $skills[$row['category']][] = $row;
    }
    return $skills;
}
function getProjects() {
    global $conn;
    $sql = "SELECT * FROM projects ORDER BY id DESC";
    $result = $conn->query($sql);

    $projects = [];
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }

    return $projects;
}

$personalInfo = getPersonalInfo();
$experiences = getExperiences();
$skills = getSkills();
$projects = getProjects();

function formatDate($date) {
    return empty($date) ? 'Present' : date('M Y', strtotime($date));
}

// Fetch personal info
$personal_query = "SELECT * FROM personal_info LIMIT 1";
$personal_result = $conn->query($personal_query);
$personal = $personal_result->fetch_assoc();

// Fetch skills
$skills_query = "SELECT * FROM skills";
$skills_result = $conn->query($skills_query);

// Fetch experience
$experience_query = "SELECT * FROM experience ORDER BY start_date DESC";
$experience_result = $conn->query($experience_query);

$email = $personal['email'] ?? 'hello@gmail.com';
$phone = $personal['phone_number'] ?? '+09321312311';

 $sql = "SELECT * FROM projects ORDER BY id DESC";
 $project_result = $conn->query($sql);
// Get current year
$currentYear = date('Y');
?>
