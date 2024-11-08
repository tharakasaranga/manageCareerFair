<?php
include('db_connection.php'); 


$query = "SELECT company_name FROM companies";
$result = $conn->query($query);

$companies = [];


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companies[] = $row['company_name']; 
    }
}

header('Content-Type: application/json');
echo json_encode($companies);
?>
