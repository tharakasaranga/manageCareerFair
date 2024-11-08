<?php
include('db_connection.php'); // Include your database connection

session_start(); // Start the session

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Get the new username and confirm password from the request
    $newUsername = $_GET['newUsername'];
    $confirmPassword = $_GET['confirmPassword'];

    // Assuming you have the current admin username stored in session
    $adminUsername = $_SESSION['admin_username']; // Current username stored in session

    // Query to get the stored password for the current admin user
    $stmt = $conn->prepare("SELECT password FROM admin WHERE username = ?");
    $stmt->bind_param("s", $adminUsername);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Verify the provided password
        if ($confirmPassword === $row['password']) {
            // Update the username in the database
            $stmt = $conn->prepare("UPDATE admin SET username = ? WHERE username = ?");
            $stmt->bind_param("ss", $newUsername, $adminUsername);

            if ($stmt->execute()) {
                // Optionally, update the session variable if needed
                $_SESSION['admin_username'] = $newUsername; // Update session with new username
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update username.']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Incorrect password.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found.']);
    }

    $stmt->close();
    $conn->close();
}
?>
