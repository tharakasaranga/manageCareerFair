<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <style>
        .message {
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
            font-size: 18px;
            font-weight: bold;
        }
        .success {
            background-color: #dff0d8;
            color: #3c763d;
            border: 1px solid #d6e9c6;
        }
        .error {
            background-color: #f2dede;
            color: #a94442;
            border: 1px solid #ebccd1;
        }
    </style>
</head>
<body>

<?php
include('db_connection.php');
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
$jsMessage = ''; 

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $company_name = $conn->real_escape_string(trim($_GET['company_name']));
    $email = $conn->real_escape_string(trim($_GET['email']));
    $phone_no = $conn->real_escape_string(trim($_GET['phone_no']));
    $address = $conn->real_escape_string(trim($_GET['address']));
    $website = $conn->real_escape_string(trim($_GET['website']));
    $industry = $conn->real_escape_string(trim($_GET['industry']));
    $contact_person = $conn->real_escape_string(trim($_GET['contact_person']));
    $contact_person_position = $conn->real_escape_string(trim($_GET['contact_person_position']));

    $logo = $_FILES['logo']['name'];
    $target_dir = __DIR__ . "http://10.10.10.157/group4/CareerFair/uploads/";
    $target_file = $target_dir . basename($logo);

    if (!is_dir($target_dir)) {
        $jsMessage = "Directory does not exist: " . htmlspecialchars($target_dir);
    } elseif (!is_writable($target_dir)) {
        $jsMessage = "Directory is not writable: " . htmlspecialchars($target_dir);
    } else {
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO companies (company_name, email, phone_no, address, website, industry, contact_person, contact_person_position, logo)
                    VALUES ('$company_name', '$email', '$phone_no', '$address', '$website', '$industry', '$contact_person', '$contact_person_position', '$logo')";

            if ($conn->query($sql) === TRUE) {
                $jsMessage = "Successfully Registered!";
            } else {
                $jsMessage = "Error: " . htmlspecialchars($conn->error);
            }
        } else {
            $jsMessage = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<script>
    <?php if ($jsMessage): ?>
        Swal.fire({
            title: "<?php echo strpos($jsMessage, 'Error') !== false ? 'Error' : 'Success'; ?>",
            text: "<?php echo addslashes($jsMessage); ?>",
            icon: "<?php echo strpos($jsMessage, 'Error') !== false ? 'error' : 'success'; ?>",
            confirmButtonText: "OK"
        }).then((result) => {
            if (result.isConfirmed && "<?php echo strpos($jsMessage, 'Successfully Registered!') !== false; ?>") {
                window.location.href = "../register_employer.php";
            }
        });
    <?php endif; ?>
</script>

</body>
</html>
