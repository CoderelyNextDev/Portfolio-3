<?php
require_once './../config/db_connect.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'delete') {
        $id = (int)$_POST['id'];
        $stmt = $conn->prepare("DELETE FROM experience WHERE id = ?");
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Experience deleted successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete experience']);
        }
        $stmt->close();
        exit;
    }
    
    if ($action === 'add' || $action === 'edit') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        $title = trim($_POST['title']);
        $institution = trim($_POST['institution']);
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'] ?: null;
        $description = trim($_POST['description']);
        
        if ($action === 'edit' && $id) {
            $stmt = $conn->prepare("UPDATE experience SET title = ?, institution = ?, start_date = ?, end_date = ?, description = ? WHERE id = ?");
            $stmt->bind_param("sssssi", $title, $institution, $start_date, $end_date, $description, $id);
        } else {
            $stmt = $conn->prepare("INSERT INTO experience (title, institution, start_date, end_date, description) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $title, $institution, $start_date, $end_date, $description);
        }
        
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Experience saved successfully']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save experience']);
        }
        $stmt->close();
        exit;
    }
    
    if ($action === 'get') {
        $id = (int)$_POST['id'];
        $stmt = $conn->prepare("SELECT * FROM experience WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        echo json_encode($data);
        $stmt->close();
        exit;
    }
}
?>
