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
        case 'update':
            updatePersonalInfo($conn);
            break;
            
        case 'get':
            getPersonalInfo($conn);
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

function updatePersonalInfo($conn) {
    $id = intval($_POST['id'] ?? 0);
    $full_name = trim($_POST['full_name'] ?? '');
    $tagline = trim($_POST['tagline'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone_number = trim($_POST['phone_number'] ?? '');
    $about_summary = trim($_POST['about_summary'] ?? '');
    $current_picture = trim($_POST['current_picture'] ?? '');
    
    // Validation
    if (empty($full_name)) {
        echo json_encode(['success' => false, 'message' => 'Full name is required']);
        return;
    }
    
    if (empty($email)) {
        echo json_encode(['success' => false, 'message' => 'Email is required']);
        return;
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['success' => false, 'message' => 'Invalid email format']);
        return;
    }
    
    // Handle file upload
    $profile_picture_url = $current_picture;
    
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === UPLOAD_ERR_OK) {
        $upload_result = handleImageUpload($_FILES['profile_picture'], $current_picture);
        
        if ($upload_result['success']) {
            $profile_picture_url = $upload_result['path'];
        } else {
            echo json_encode(['success' => false, 'message' => $upload_result['message']]);
            return;
        }
    }

    if ($id > 0) {
        $stmt = $conn->prepare("UPDATE personal_info SET 
            full_name = ?, 
            tagline = ?, 
            email = ?, 
            phone_number = ?, 
            about_summary = ?, 
            profile_picture_url = ? 
            WHERE id = ?");
        $stmt->bind_param("ssssssi", $full_name, $tagline, $email, $phone_number, $about_summary, $profile_picture_url, $id);
    } else {
        $stmt = $conn->prepare("INSERT INTO personal_info 
            (full_name, tagline, email, phone_number, about_summary, profile_picture_url) 
            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $full_name, $tagline, $email, $phone_number, $about_summary, $profile_picture_url);
    }
    
    if ($stmt->execute()) {
        echo json_encode([
            'success' => true, 
            'message' => 'Personal information updated successfully',
            'id' => $id > 0 ? $id : $stmt->insert_id,
            'profile_picture_url' => $profile_picture_url
        ]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update personal information']);
    }
    
    $stmt->close();
}

function handleImageUpload($file, $old_path = '') {
    $upload_dir = '../uploads/profile/';
    
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    $max_size = 5 * 1024 * 1024;
    if ($file['size'] > $max_size) {
        return ['success' => false, 'message' => 'File size must be less than 5MB'];
    }
    
    $allowed_types = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
    $file_type = mime_content_type($file['tmp_name']);
    
    if (!in_array($file_type, $allowed_types)) {
        return ['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, and GIF are allowed'];
    }
    
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    
    $new_filename = 'profile_' . time() . '_' . uniqid() . '.' . $file_extension;
    $upload_path = $upload_dir . $new_filename;
    $db_path = 'uploads/profile/' . $new_filename;
    
    if (move_uploaded_file($file['tmp_name'], $upload_path)) {
        if (!empty($old_path) && file_exists('../' . $old_path)) {
            @unlink('../' . $old_path);
        }
        
        return [
            'success' => true, 
            'path' => $db_path,
            'message' => 'Image uploaded successfully'
        ];
    } else {
        return ['success' => false, 'message' => 'Failed to upload image'];
    }
}

function getPersonalInfo($conn) {
    $id = intval($_POST['id'] ?? 0);
    
    if ($id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid ID']);
        return;
    }
    
    $stmt = $conn->prepare("SELECT * FROM personal_info WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        echo json_encode($row);
    } else {
        echo json_encode(['success' => false, 'message' => 'Personal information not found']);
    }
    
    $stmt->close();
}

$conn->close();
?>