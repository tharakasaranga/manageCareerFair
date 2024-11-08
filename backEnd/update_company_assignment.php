<?php
include('db_connection.php'); 

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['company'])) {
    $studentId = $data['id'];
    $companyName = $data['company'];

    
    $query = "UPDATE students SET assigned_company = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $companyName, $studentId); 

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => true, 'message' => 'Database update failed.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
?>
