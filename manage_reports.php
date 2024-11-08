<?php include('header1.php'); ?>
<?php include('db_connection.php'); ?>


<?php
$company_id = '';
$students = [];


if (isset($_GET['company_name'])) {
    $company_name = $_GET['company_name'];

  
    $sql = "SELECT s.firstname, s.lastname, s.StudentRegNo, s.email, s.phoneNo, s.degreeProgram
            FROM students s
            WHERE s.assigned_company = ?";

   
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $company_name);
        $stmt->execute();
        $result = $stmt->get_result();

     
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
        }
        $stmt->close();
    } else {
        echo "Query preparation failed.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Student Reports by Company</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .main-content {
            padding: 50px 20px;
            text-align: center;
        }

        h1 {
            font-size: 2em;
            color: #2c3e50;
            font-weight: 500;
            margin-bottom: 20px;
        }

        select, input[type="submit"] {
            padding: 10px;
            font-size: 1em;
            margin: 10px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #1abc9c;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .drawer {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #2c3e50;
            overflow-x: hidden;
            transition: 0.3s;
            padding-top: 60px;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.2);
        }

        .drawer a {
            padding: 15px 30px;
            font-size: 1.2em;
            color: #ecf0f1;
            display: block;
            text-decoration: none;
            transition: 0.3s;
        }

        .drawer a:hover {
            background-color: #1abc9c;
            color: #fff;
        }

        .close-btn, .open-drawer-btn {
            font-size: 1.5em;
            cursor: pointer;
            background-color: #1abc9c;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
        }

        #printButton {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-top: 20px;
        }
    </style>

</head>

<body>

    <div class="container">
    <div class="drawer" id="drawer">
        <span class="close-btn" onclick="closeDrawer()">&times;</span>
        <a href="Manage_students.php"><i class="fas fa-user-graduate"></i> Manage Students</a>
        <a href="manage_employers.php"><i class="fas fa-user-friends "></i> Manage Employers</a>
        <a href="manage_reports.php"><i class="fas fa-chart-bar"></i>Manage Reports</a>
        <a href="admindashboard.php"><i class="fas fa-user"></i> My Dashboard</a>
        <a href="login.php" id="logoutLink"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

        <button class="open-drawer-btn" onclick="openDrawer()">&#9776; Menu</button>

        <div class="main-content">
            <h1>Student Reports by Company</h1>

            <form method="GET" action="">
                <label for="company_name">Select Company Name:</label>
                <select name="company_name" id="company_name" required>
                    <?php
                    $company_sql = "SELECT company_name FROM companies";
                    $company_result = $conn->query($company_sql);
                    while ($row = $company_result->fetch_assoc()) {
                        echo '<option value="' . $row['company_name'] . '">' . $row['company_name'] . '</option>';
                    }
                    ?>
                </select>
                <input type="submit" value="Generate Report">
            </form>

            <?php if (!empty($students)): ?>
                <div id="reportContent">
                    <table>
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Student Reg No</th>
                                <th>Email</th>
                                <th>Phone No</th>
                                <th>Degree Program</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($students as $student): ?>
                                <tr>
                                    <td><?php echo $student['firstname']; ?></td>
                                    <td><?php echo $student['lastname']; ?></td>
                                    <td><?php echo $student['StudentRegNo']; ?></td>
                                    <td><?php echo $student['email']; ?></td>
                                    <td><?php echo $student['phoneNo']; ?></td>
                                    <td><?php echo $student['degreeProgram']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <button id="printButton" onclick="printPDF()">Print to PDF</button>
            <?php else: ?>
                <p>Click Generate Reports button to get Details. </p>
                <p>No student details available for the selected company.</p>
            <?php endif; ?>

            <?php $conn->close(); ?>
        </div>
    </div>
</body>

<script>
    document.getElementById('logoutLink').onclick = function(event) {
        event.preventDefault(); 
        Swal.fire({
            title: "Are you sure you want to log out?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, log me out",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "login.php"; 
            }
        });
    };
    
    function openDrawer() {
        document.getElementById("drawer").style.width = "250px";
        document.querySelector('.main-content').style.marginLeft = "250px";
    }

    function closeDrawer() {
        document.getElementById("drawer").style.width = "0";
        document.querySelector('.main-content').style.marginLeft = "0";
    }

    function printPDF() {
    var element = document.getElementById('reportContent');
    var companyName = document.getElementById('company_name').value; 
    var opt = {
        margin: 1,
        filename: companyName + '_Student_Report.pdf', 
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'a4', orientation: 'landscape' }
    };


    var titleElement = document.createElement('h2');
    titleElement.innerText = "Company Name: " + companyName;
    titleElement.style.textAlign = "center";
    element.insertBefore(titleElement, element.firstChild);

    html2pdf().set(opt).from(element).save().then(() => {
        element.removeChild(titleElement);
    });
}

</script>
