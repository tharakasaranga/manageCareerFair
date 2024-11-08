<?php
include('header1.php');
include('db_connection.php'); 


$query = "SELECT * FROM students";
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.10/jspdf.plugin.autotable.min.js"></script>



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

        #studentTableBody tr:hover {
            background-color: rgb(14, 237, 25); 
            color: #333; 
            cursor: pointer;
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

        button.new-btn-showCV {
            padding: 5px 15px;
            font-size: 0.5em;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 10px 0; 
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

        select {
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-left: 10px;
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
  

        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%; 
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
        <a href="manage_students.php"><i class="fas fa-user-graduate"></i> Manage Students</a>
        <a href="manage_Employers.php"><i class="fas fa-user-friends "></i> Manage Employers</a>
        <a href="manage_reports.php"><i class="fas fa-chart-bar"></i> Manage Reports</a>
        <a href="admindashboard.php"><i class="fas fa-user"></i> My Dashboard</a>
        <a href="login.php" id="logoutLink"><i class="fas fa-sign-out-alt"></i> Logout</a>

    </div>

    <button class="open-drawer-btn" onclick="openDrawer()">&#9776; Menu</button>

    <div class="main-content">
    <div style = "margin-bottom:20px; text-align:right"><img style = "align-self : self-end" src = "images/logo_new.png"></div>
    <center><h2 style = "font-weight:700;  ">Manage Students</h2></center>

        <div class="search-container">
            <input style = "border-radius:40px; padding-left:30px; width : 500px" type="text" id="searchInput" placeholder="Search" onkeyup="searchStudents()" />
            
            <div class="button-section">
            <button style = "padding:15px 30px 15px 30px; border-radius:30px" class="new-btn" onclick="showCompanyDetails()">Company Details</button>
        </div>

        </div>
        
        <table>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>StudentRegNo</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Gender</th>
                    <th>Degree Program</th>
                    <th>Year of Study</th>
                    <th>CGPA</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="studentTableBody">
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <tr data-student-id="<?php echo $row['id']; ?>" data-cv-file="<?php echo $row['resume']; ?>">

                    <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['studentRegNo']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phoneNo']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['degreeProgram']; ?></td>
                    <td><?php echo $row['yearOfStudy']; ?></td>
                    <td><?php echo $row['CGPA']; ?></td>
                    <td class="status-column"><?php echo isset($row['assigned_company']) ? $row['assigned_company'] : 'Pending'; ?></td>
                </tr>
            <?php endwhile; ?>
            </tbody>
        </table>
        
      <button class="new-btn" id="printButton" onclick="printTableToPDF()">Print to PDF</button>

    </div>
</div>

<div id="fileModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <h2>Uploaded File</h2>
        <iframe id="fileDisplay" style="width: 100%; height: 500px;" frameborder="0"></iframe>
    </div>
</div>

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


function handleAction(select, studentId) {
        var action = select.value;
        
        if (action === 'edit') {
            window.location.href = 'edit_student.php?id=' + studentId;
        } else if (action === 'delete') {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href = 'backEnd/delete_student.php?id=' + studentId;
            }
        } else if (action === 'assign') {
            window.location.href = 'assign_company.php?student_id=' + studentId;
        }
    }

function assignCompany(studentId) {
    Swal.fire({
        title: 'Assign Company',
        input: 'text',
        inputPlaceholder: 'Enter Company Name',
        showCancelButton: true,
        confirmButtonText: 'Assign',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed && result.value) {
            const companyName = result.value;
            fetch('assign_company.php', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ student_id: studentId, company_name: companyName })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update the UI
                    document.querySelector(`tr[data-student-id="${studentId}"] .status-column`).textContent = companyName;
                    Swal.fire('Assigned!', `Company ${companyName} has been assigned to the student.`, 'success');
                } else {
                    Swal.fire('Error!', data.message || 'Could not assign the company. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error!', 'An error occurred while assigning the company.', 'error');
            });
        }
    });
}

function searchStudents() {
    const input = document.getElementById("searchInput").value.toLowerCase();
    const rows = document.querySelectorAll("#studentTableBody tr");
    
    rows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(input) ? "" : "none";
    });
}

function filterStudents() {
    const filterValue = document.getElementById("filterSelect").value;
    const rows = document.querySelectorAll("#studentTableBody tr");
    
    rows.forEach(row => {
        const yearOfStudy = row.cells[8].textContent; 
        if (filterValue === "" || yearOfStudy === filterValue) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
}


function handleAction(select, studentId) {
        var action = select.value;
        
        if (action === 'edit') {
            window.location.href = 'edit_student.php?id=' + studentId;
        } else if (action === 'delete') {
            if (confirm('Are you sure you want to delete this student?')) {
                window.location.href = 'backEnd/delete_student.php?id=' + studentId;
            }
        } else if (action === 'assign') {
            window.location.href = 'assign_company.php?student_id=' + studentId;
        }
    }

document.addEventListener("DOMContentLoaded", function() {
    const rows = document.querySelectorAll("#studentTableBody tr");
    rows.forEach(row => {
        row.addEventListener("click", function() {
            const studentId = this.getAttribute("data-student-id"); 
            const cvFilePath = this.getAttribute("data-cv-file"); 
            const statusCell = this.querySelector(".status-cell"); 

            Swal.fire({
                title: 'Choose an Action',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: 'Delete this student',
                denyButtonText: 'Assign a company',
                cancelButtonText: 'Show CV'
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteStudent(studentId, this); 
                } else if (result.isDenied) {
                  
                    fetch('BackEnd/get_companies.php')
                        .then(response => response.json())
                        .then(companies => {
                            const companyOptions = companies.map(company => `<option value="${company}">${company}</option>`).join('');
                            
                            Swal.fire({
                                title: 'Assign a Company',
                                html: `<select id="companySelect">${companyOptions}</select>`,
                                showCancelButton: true,
                                confirmButtonText: 'Save',
                                cancelButtonText: 'Cancel'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    const selectedCompany = document.getElementById('companySelect').value;
                                    updateCompanyAssignment(studentId, selectedCompany, statusCell);
                                }
                            });
                        })
                        .catch(error => {
                            console.error('Error fetching companies:', error);
                            Swal.fire('Error', 'Failed to load company list.', 'error');
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                
                    showFile(cvFilePath);
                }
            });
        });
    });
});
function updateCompanyAssignment(studentId, companyName, statusCell) {
    fetch('BackEnd/update_company_assignment.php', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: studentId, company: companyName })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            statusCell.textContent = companyName;
            Swal.fire('Success', 'Company assigned successfully!', 'success');
        } else {
            Swal.fire('Error', data.message || 'Failed to assign company.', 'error');
        }
    })
    .catch(error => {
        console.error('Success.. Company assigned successfully!', error);
        Swal.fire('Error', 'An error occurred while updating.But Company assigned successfully. Refresh the page', 'error');
    });
}

    function deleteStudent(studentId, row) {
    Swal.fire({
        title: 'Are you sure you want to delete this student?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'backEnd/delete_student.php?id=' + studentId;
        }
    });
}

    function showFile(filePath) {
        const modal = document.getElementById("fileModal");
        const fileDisplay = document.getElementById("fileDisplay");
        
        
        fileDisplay.src = "Files/" + filePath; 
        modal.style.display = "block";
    }

  
    function closeModal() {
        const modal = document.getElementById("fileModal");
        modal.style.display = "none"; 
    }

    function showCompanyDetails() {
        fetch('http://10.10.10.157/group4/CareerFair/BackEnd/get_company_details.php')
            .then(response => response.json())
            .then(data => {
                let tableHtml = '<table border="1" style="width:100%; text-align:left;"><tr><th>Company Name</th><th>Industry</th></tr>';
                data.forEach(company => {
                    tableHtml += `<tr><td>${company.name}</td><td>${company.industry}</td></tr>`;
                });
                tableHtml += '</table>';
                
                Swal.fire({
                    title: 'Company Details',
                    html: tableHtml,
                    width: '600px',
                    showCloseButton: true,
                    confirmButtonText: 'Close'
                });
            })
            .catch(error => {
                console.error('Error fetching company details:', error);
                Swal.fire('Error', 'Failed to load company details.', 'error');
            });
    }

    function printTableToPDF() {
    if (!window.jspdf || !window.jspdf.jsPDF) {
        console.error("jsPDF library is not loaded.");
        return;
    }

   
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('landscape', 'pt', 'letter');


    const table = document.getElementById('studentTableBody');
    if (!table) {
        console.error("Table element not found");
        return;
    }
    
    const rows = Array.from(table.rows);
    const columnWidth = 150;  
    const rowHeight = 20;
    const startX = 20;
    let startY = 30;

    const columnsToPrint = [0, 1, 2, 7, 9]; 

    rows.forEach((row, rowIndex) => {
        const cells = Array.from(row.cells);
        columnsToPrint.forEach((cellIndex, colIndex) => {
            if (cells[cellIndex]) {
                const cellText = doc.splitTextToSize(cells[cellIndex].innerText, columnWidth - 5);
                doc.text(cellText, startX + (colIndex * columnWidth), startY + (rowIndex * rowHeight));
            }
        });
    });

    doc.save('student_details.pdf');
}


</script>

</body>
</html>
