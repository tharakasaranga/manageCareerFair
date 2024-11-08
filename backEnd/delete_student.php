<?php
include('db_connection.php'); 

if (isset($_GET['id'])) {
    $studentId = $_GET['id'];


    $deleteQuery = "DELETE FROM students WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $studentId);

    if ($stmt->execute()) {
        header("Location: ../manage_students.php?status=success&message=Student successfully deleted.");
        exit();
    } else {
    
        header("Location:/manage_students.php?status=error&message=Failed to delete student.");
        exit();
    }
} else {
    header("Location: ../ manage_students.php?status=error&message=Invalid student ID.");
    exit();
}
?>
