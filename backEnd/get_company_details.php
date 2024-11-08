<?php
include('db_connection.php');

$query = "SELECT id, company_name, industry FROM companies";
$result = $conn->query($query);

$companies = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $companies[] = [
            'id' => $row['id'], 
            'name' => $row['company_name'], 
            'industry' => $row['industry']
        ];
    }
}

header('Content-Type: application/json');
echo json_encode($companies);

$conn->close(); 
?>
