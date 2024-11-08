<?php
include('db_connection.php'); 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$data = json_decode(file_get_contents("php://input"));

if (isset($data->username) && isset($data->password)) {
    $newUsername = $conn->real_escape_string(trim($data->username));
    $password = $conn->real_escape_string(trim($data->password));

    $sql = "SELECT * FROM admin WHERE password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $sqlUpdate = "UPDATE admin SET username = '$newUsername' WHERE password = '$password'";

        if ($conn->query($sqlUpdate) === TRUE) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error updating username: ' . $conn->error]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Incorrect password.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input.']);
}

$conn->close();
?>
