<?php include('header1.php'); ?>
<?php include('db_connection.php'); ?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

     
        .container {
            width: 100%;
            height: 100vh;
            overflow-x: hidden;
            position: relative;
        }

     
        .drawer {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
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
            text-decoration: none;
            font-size: 1.2em;
            color: #ecf0f1;
            display: flex;
            align-items: center;
            transition: 0.3s;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .drawer a:hover {
            background-color: #1abc9c;
            color: #fff;
        }

        .drawer .close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            font-size: 2.5em;
            color: #ecf0f1;
            cursor: pointer;
        }

        .open-drawer-btn {
            font-size: 1.5em;
            cursor: pointer;
            background-color: #1abc9c;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .open-drawer-btn:hover {
            background-color: #16a085;
        }

      
        .main-content {
            margin-left: 15px;
            padding: 50px 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content h2 {
            font-size: 2em;
            margin-bottom: 20px;
            color: #2c3e50;
            text-align: center;
            font-weight: 500;
        }

        .main-content p {
            font-size: 1.1em;
            color: #7f8c8d;
            text-align: center;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 30px;
            justify-content: center;
        }

        .card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s;
            text-align: center;
            position: relative;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card h3 {
            font-size: 1.5em;
            color: #34495e;
            margin-bottom: 15px;
        }

        .card p {
            font-size: 1em;
            color: #7f8c8d;
        }

        .card a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 25px;
            background-color: #1abc9c;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #16a085;
        }

       
        .statistics {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            padding: 20px 0;
        }

        .stat-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            margin: 0 10px;
        }

        .stat-card h3 {
            color: #2c3e50;
            font-size: 1.5em;
        }

        .stat-card p {
            font-size: 2em;
            color: #1abc9c;
            margin-top: 10px;
        }

      
        .additional-info {
            margin-top: 40px;
            text-align: center;
        }

        .additional-info h3 {
            color: #2c3e50;
            font-size: 1.5em;
            margin-bottom: 15px;
        }

        .additional-info ul {
            list-style-type: none;
            padding: 0;
        }

        .additional-info li {
            font-size: 1.1em;
            color: #7f8c8d;
            margin: 10px 0;
        }

     
        .button-section {
            text-align: center;
            margin-top: 40px;
        }

        button.new-btn {
            padding: 12px 20px;
            font-size: 1.2em;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 0 10px;
            transition: background-color 0.3s ease;
        }

        button.new-btn:hover {
            background-color: #c0392b;
        }


        @media (max-width: 768px) {
            .main-content {
                padding: 20px;
            }

            .open-drawer-btn {
                padding: 10px 15px;
            }
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
            <a href="#"><i class="fas fa-user"></i> My Dashboard</a>
            <a href="login.php" id="logoutLink"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>

        <button class="open-drawer-btn" onclick="openDrawer()">&#9776; Menu</button>

        <div class="main-content">
            <h2>Admin Dashboard</h2>
            <p>Welcome, Admin. Here you can manage all users and reports.</p>

   
            <?php
            $studentQuery = "SELECT COUNT(*) AS total_students FROM students";
            $studentResult = $conn->query($studentQuery);
            $total_students = $studentResult->fetch_assoc()['total_students'];

            
            $employerQuery = "SELECT COUNT(*) AS total_employers FROM companies";
            $employerResult = $conn->query($employerQuery);
            $total_employers = $employerResult->fetch_assoc()['total_employers'];
            ?>

          
            <div class="statistics">
                <div class="stat-card">
                    <h3>Registered Students</h3>
                    <p id="total-students"><?php echo $total_students; ?></p>
                </div>
                <div class="stat-card">
                    <h3>Registered Employers</h3>
                    <p id="total-employers"><?php echo $total_employers; ?></p>
                </div>
            </div>


            <?php
           
            $level1Query = "SELECT COUNT(*) AS level1 FROM students WHERE yearOfStudy = '1st Year'";
            $level1Result = $conn->query($level1Query);
            $level1_count = $level1Result->fetch_assoc()['level1'];

            $level2Query = "SELECT COUNT(*) AS level2 FROM students WHERE yearOfStudy = '2nd Year'";
            $level2Result = $conn->query($level2Query);
            $level2_count = $level2Result->fetch_assoc()['level2'];

            $level3Query = "SELECT COUNT(*) AS level3 FROM students WHERE yearOfStudy = '3rd Year'";
            $level3Result = $conn->query($level3Query);
            $level3_count = $level3Result->fetch_assoc()['level3'];

            $level4Query = "SELECT COUNT(*) AS level4 FROM students WHERE yearOfStudy = '4th Year'";
            $level4Result = $conn->query($level4Query);
            $level4_count = $level4Result->fetch_assoc()['level4'];
            ?>

            <div class="chart-section" style="margin-top: 40px;">
                <h3>Registered Students by Level</h3>
                <canvas id="studentLevelChart" height="100"></canvas>
            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

    document.getElementById('logoutLink').onclick = function(event) {
        event.preventDefault(); // Prevents the default action of the link
        Swal.fire({
            title: "Are you sure you want to log out?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, log me out",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "login.php"; // Redirect to login page if confirmed
            }
        });
    };

    function openDrawer() {
        document.getElementById("drawer").style.width = "250px";
        document.querySelector('.main-content').style.marginLeft = "250px";
    }

    function closeDrawer() {
        document.getElementById("drawer").style.width = "0";
        document.querySelector('.main-content').style.marginLeft = "15px";
    }


    const ctx = document.getElementById('studentLevelChart').getContext('2d');
    const studentLevelChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Level 1', 'Level 2', 'Level 3', 'Level 4'],
            datasets: [{
                label: 'Number of Students',
                data: [
                    <?php echo $level1_count; ?>,
                    <?php echo $level2_count; ?>,
                    <?php echo $level3_count; ?>,
                    <?php echo $level4_count; ?>
                ],
                backgroundColor: ['#1abc9c', '#3498db', '#e74c3c', '#f39c12'],
                borderWidth: 1,
                borderColor: '#2c3e50'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


  

</script>

</html>
