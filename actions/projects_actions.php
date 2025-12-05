<?php
error_reporting(E_ALL);
ini_set('display_errors', 0); 
header('Content-Type: application/json');
require_once './../config/db_connect.php';

function uploadProjectImage() {
    $uploadDir = "../uploads/projects/";
    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    if (!isset($_FILES['project_image']) || $_FILES['project_image']['error'] !== 0) {
        return null;
    }

    $file = $_FILES['project_image'];
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $newName = uniqid("proj_") . "." . $ext;
    $path = $uploadDir . $newName;

    if (@move_uploaded_file($file['tmp_name'], $path)) { // @ suppresses warnings
        return "uploads/projects/" . $newName;
    }

    return null;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    if ($action === 'delete') {
        $id = (int)$_POST['id'];

        $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Project deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete project']);
        }

        exit;
    }

 if ($action === 'add' || $action === 'edit') {
    try {
        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title']);
        $subtitle = trim($_POST['subtitle']);
        $description = trim($_POST['description']);
        $technologies = trim($_POST['technologies']);

        $imagePath = uploadProjectImage(); 

        if ($action === 'edit' && $id) {
          if ($imagePath) {
                $stmt = $conn->prepare("UPDATE projects SET title=?, subtitle=?, description=?, technologies=?, project_image_url=? WHERE id=?");
                $stmt->bind_param("sssssi", $title, $subtitle, $description, $technologies, $imagePath, $id);
            } else {
                $stmt = $conn->prepare("UPDATE projects SET title=?, subtitle=?, description=?, technologies=? WHERE id=?");
                $stmt->bind_param("ssssi", $title, $subtitle, $description, $technologies, $id);
            }

        } else {
            $stmt = $conn->prepare("INSERT INTO projects (title, subtitle, description, technologies, project_image_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $title, $subtitle, $description, $technologies, $imagePath);
        }

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Project saved successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Database error: '.$stmt->error]);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Error: '.$e->getMessage()]);
    }
    exit;
}

    if ($action === 'get') {
        $id = (int)$_POST['id'];
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        echo json_encode($result->fetch_assoc());
        exit;
    }
}
?>
