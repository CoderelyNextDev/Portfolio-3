<?php
session_start();
require_once './../config/db_connect.php';


header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
    exit;
}

$action = $_POST['action'] ?? '';

try {
    switch ($action) {
        case 'add':
            addSkill($conn);
            break;
            
        case 'edit':
            editSkill($conn);
            break;
            
        case 'delete':
            deleteSkill($conn);
            break;
            
        case 'get':
            getSkill($conn);
            break;
            
        default:
            echo json_encode(['success' => false, 'message' => 'Invalid action']);
            break;
    }
} catch (Exception $e) {
    echo json_encode([
        'success' => false, 
        'message' => 'An error occurred: ' . $e->getMessage()
    ]);
}

function addSkill($conn) {
    $skill_name = trim($_POST['skill_name'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $proficiency = intval($_POST['proficiency'] ?? 0);

    if (empty($skill_name)) {
        echo json_encode(['success' => false, 'message' => 'Skill name is required']);
        return;
    }
    
    if (empty($category)) {
        echo json_encode(['success' => false, 'message' => 'Category is required']);
        return;
    }
    
    if ($proficiency < 0 || $proficiency > 100) {
        echo json_encode(['success' => false, 'message' => 'Proficiency must be between 0 and 100']);
        return;
    }
    
    $checkStmt = $conn->prepare("SELECT id FROM skills WHERE skill_name = ? AND category = ?");
    $checkStmt->bind_param("ss", $skill_name, $category);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode([
            'success' => false, 
            'message' => 'This skill already exists in the selected category'
        ]);
        $checkStmt->close();
        return;
    }
    $checkStmt->close();
    
    // Insert new skill
    $stmt = $conn->prepare("INSERT INTO skills (skill_name, category, proficiency) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $skill_name, $category, $proficiency);
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Skill added successfully',
            'id' => $stmt->insert_id
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to add skill']);
    }
    
    $stmt->close();
}

function editSkill($conn) {
    $id = intval($_POST['id'] ?? 0);
    $skill_name = trim($_POST['skill_name'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $proficiency = intval($_POST['proficiency'] ?? 0);
    
    // Validation
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid skill ID']);
        return;
    }
    
    if (empty($skill_name)) {
        echo json_encode(['success' => false, 'message' => 'Skill name is required']);
        return;
    }
    
    if (empty($category)) {
        echo json_encode(['success' => false, 'message' => 'Category is required']);
        return;
    }
    
    if ($proficiency < 0 || $proficiency > 100) {
        echo json_encode(['success' => false, 'message' => 'Proficiency must be between 0 and 100']);
        return;
    }
    
    $checkStmt = $conn->prepare("SELECT id FROM skills WHERE skill_name = ? AND category = ? AND id != ?");
    $checkStmt->bind_param("ssi", $skill_name, $category, $id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    
    if ($result->num_rows > 0) {
        echo json_encode([
            'success' => false, 
            'message' => 'This skill already exists in the selected category'
        ]);
        $checkStmt->close();
        return;
    }
    $checkStmt->close();
    
    $stmt = $conn->prepare("UPDATE skills SET skill_name = ?, category = ?, proficiency = ? WHERE id = ?");
    $stmt->bind_param("ssii", $skill_name, $category, $proficiency, $id);
    
    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Skill updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update skill']);
    }
    
    $stmt->close();
}

function deleteSkill($conn) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid skill ID']);
        return;
    }
    
    $stmt = $conn->prepare("DELETE FROM skills WHERE id = ?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true, 'message' => 'Skill deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Skill not found']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete skill']);
    }
    
    $stmt->close();
}

function getSkill($conn) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid skill ID']);
        return;
    }
    
    $stmt = $conn->prepare("SELECT id, skill_name, category, proficiency FROM skills WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(['success' => false, 'message' => 'Skill not found']);
    }
    
    $stmt->close();
}

$conn->close();
?>