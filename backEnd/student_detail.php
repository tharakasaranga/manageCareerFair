<?php
include 'db_connection.php';

$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $query);
$student = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding: 20px;
        }

        .student-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        h1 {
            font-size: 2em;
            color: #2c3e50;
        }

        .cv-link {
            display: block;
            margin-top: 10px;
            color: #1abc9c;
            text-decoration: none;
        }

        .cv-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="student-info">
        <h1><?php echo $student['first_name'] . " " . $student['last_name']; ?></h1>
        <p>Email: <?php echo $student['email']; ?></p>
        <p>Phone: <?php echo $student['phone']; ?></p>
        <p>Degree Program: <?php echo $student['degree_program']; ?></p>
        <p>Year of Study: <?php echo $student['year_of_study']; ?></p>

       
        <a href="/Cf-final/Files/<?php echo $student['cv_file']; ?>" target="_blank" class="cv-link">View CV</a>
    </div>
</body>
</html>
