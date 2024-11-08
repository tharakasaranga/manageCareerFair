<?php
session_start();
include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $data = json_decode(file_get_contents('php://input'), true);

    
    $username = $_SESSION['username'];

    
    $sql = "UPDATE students SET firstname = ?, lastname = ?, email = ?, phoneNo = ?, uniName = ?, degreeProgram = ?, yearOfStudy = ?, CGPA = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    

    $stmt->bind_param("sssssssss", 
        $data['firstname'], 
        $data['lastname'], 
        $data['email'], 
        $data['phoneNo'], 
        $data['uniName'], 
        $data['degreeProgram'], 
        $data['yearOfStudy'], 
        $data['CGPA'], 
        $username
    );

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
