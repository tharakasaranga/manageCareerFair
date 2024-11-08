<?php
include('db_connection.php'); 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 


    $query = "DELETE FROM companies WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: ../manage_employers.php?msg=Employer deleted successfully");
        exit();
    } else {
        echo "Error deleting employer: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided for deletion.";
}

mysqli_close($conn);
?>
