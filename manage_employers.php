<?php
include('header1.php');
include('db_connection.php'); 

$query = "SELECT * FROM companies";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Employers</title>
    
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

        a{
            text-decoration: none;
            color:black;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px; 
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #1abc9c;
            color: white;
        }

        button.new-btn {
            padding: 12px 20px;
            font-size: 1.2em;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px 0; 
            transition: background-color 0.3s ease;
        }

        button.new-btn:hover {
            background-color: #c0392b;
        }

        .search-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 70%; 
        }

        button.search-btn {
            padding: 10px 20px;
            font-size: 1em;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.search-btn:hover {
            background-color: #2980b9;
        }

 
        .modal {
            display: none;
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; /
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    
    <div class="drawer" id="drawer">
        <span class="close-btn" onclick="closeDrawer()">&times;</span>
        <a href="Manage_students.php"><i class="fas fa-user-graduate"></i> Manage Students</a>
        <a href="manage_employers.php"><i class="fas fa-user-friends "></i> Manage Employers</a>
        <a href="manage_reports.php"><i class="fas fa-chart-bar"></i> Manage Reports</a>
        <a href="admindashboard.php"><i class="fas fa-user"></i> My Dashboard</a>
        <a href="login.php" id="logoutLink"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <button class="open-drawer-btn" onclick="openDrawer()">&#9776; Menu</button>

   
    <div class="main-content">
        <div style = "text-align:right; margin-bottom:20px"><img src = "images/logo_new.png"></div>
        <center><h2 style = "font-weight:700;  ">Manage Employers</h2></center>
      
        <div class="search-container">
            <input style = "paddingLeft:20px; border-radius:40px; width:500px" style = "width:500px" type="text" id="searchInput" placeholder="Search" onkeyup="searchEmployers()" />
        </div>

        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Website</th>
                    <th>Industry</th>
                    <th>Registration Date</th>
                    <th>Contact Person</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="employerTableBody">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['company_name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_no']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td><?php echo $row['website']; ?></td>
                    <td><?php echo $row['industry']; ?></td>
                    <td><?php echo $row['registration_date']; ?></td>
                    <td><?php echo $row['contact_person']; ?></td>
                    <td><?php echo $row['contact_person_position']; ?></td>
                    <td>
                       <button style = "padding:10px; border-radius:10px"> <a href="backEnd/delete_employer.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this employer?')">Delete</a></button>
                    </td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>

        
    </div>
</div>

<script>
    function openDrawer() {
        document.getElementById("drawer").style.width = "250px";
        document.querySelector('.main-content').style.marginLeft = "250px";
    }

    function closeDrawer() {
        document.getElementById("drawer").style.width = "0";
        document.querySelector('.main-content').style.marginLeft = "15px";
    }

    function openModal() {
        document.getElementById("newEmployerModal").style.display = "block";
    }

    function closeModal() {
        document.getElementById("newEmployerModal").style.display = "none";
    }

    function searchEmployers() {
        let input = document.getElementById('searchInput').value.toLowerCase();
        let rows = document.querySelectorAll('#employerTableBody tr');

        rows.forEach(row => {
            let cells = row.getElementsByTagName('td');
            let found = Array.from(cells).some(cell => cell.textContent.toLowerCase().includes(input));
            row.style.display = found ? '' : 'none';
        });
    }

    function filterEmployers() {
        let filter = document.getElementById('filterSelect').value;
        let rows = document.querySelectorAll('#employerTableBody tr');

        rows.forEach(row => {
            let industryCell = row.cells[5]; 
            if (filter === "" || industryCell.textContent === filter) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

   
    window.onclick = function(event) {
        let modal = document.getElementById("newEmployerModal");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    };

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
</script>

</body>
</html>
