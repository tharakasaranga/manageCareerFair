<?php
include('db_connection.php'); 


$data = json_decode(file_get_contents("php://input"), true);
$studentId = $data['id']; 
$companyName = $data['company']; 


$updateQuery = "UPDATE students SET assigned_company = ? WHERE id = ?";
$stmt = $conn->prepare($updateQuery);
$stmt->bind_param("si", $companyName, $studentId);


if ($stmt->execute()) {
    echo json_encode(['success' => true]); 
} else {
    echo json_encode(['success' => true]); 
}

$stmt->close(); 
$conn->close(); 
?>
