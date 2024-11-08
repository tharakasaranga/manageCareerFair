<?php include('header1.php'); ?>
<?php include('db_connection.php'); ?>

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];

$conn = new mysqli("10.10.10.157", "csc210user", "CSC210!", "group4");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
        display: flex;
        width: 100%;
        height: 100vh;
    }


    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        color: #ecf0f1;
        padding-top: 20px;
        position: fixed;
        height: 100%;
        transition: width 0.3s;
    }
    .sidebar a {
        display: block;
        padding: 15px 20px;
        font-size: 1.2em;
        color: #ecf0f1;
        text-decoration: none;
        transition: background-color 0.3s;
    }
    .sidebar a:hover {
        background-color: #1abc9c;
    }

   
    .main-content {
        margin-left: 250px;
        padding: 40px;
        width: calc(100% - 250px);
        overflow-y: auto;
    }
    .main-content h2 {
        color: #2c3e50;
        font-size: 2em;
        margin-bottom: 20px;
    }

    
    .profile-card {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .profile-card h3 {
        color: #34495e;
        margin-bottom: 20px;
        text-align: center;
    }
    .profile-detail {
        font-size: 1.1em;
        color: #7f8c8d;
        margin: 15px 0;
    }
    .profile-detail strong {
        color: #2c3e50;
    }
    .download-resume {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: #1abc9c;
        color: #ffffff;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }
    .download-resume:hover {
        background-color: #16a085;
    }

  
    .edit-btn {
        display: block;
        margin: 30px auto 0;
        padding: 12px 20px;
        font-size: 1.2em;
        background-color: #e74c3c;
        color: #ffffff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .edit-btn:hover {
        background-color: #c0392b;
    }
</style>

<div class="container">
    
    <div class="sidebar">
        <a href="index.php">Go to Home Page</a>
        <a href="contact.php">Contacts</a>
        <a href="login.php">Logout</a>
    </div>

 
    <div class="main-content">
        <div class="profile-card">
            <h3>Profile Details</h3>
            <div class="profile-detail"><strong>First Name:</strong> <?php echo htmlspecialchars($student['firstname']); ?></div>
            <div class="profile-detail"><strong>Last Name:</strong> <?php echo htmlspecialchars($student['lastname']); ?></div>
            <div class="profile-detail"><strong>Registration Number:</strong> <?php echo htmlspecialchars($student['studentRegNo']); ?></div>
            <div class="profile-detail"><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></div>
            <div class="profile-detail"><strong>Mobile Number:</strong> <?php echo htmlspecialchars($student['phoneNo']); ?></div>
            <div class="profile-detail"><strong>Date of Birth:</strong> <?php echo htmlspecialchars($student['dateOfBirth']); ?></div>
            <div class="profile-detail"><strong>Gender:</strong> <?php echo htmlspecialchars($student['gender']); ?></div>
            <div class="profile-detail"><strong>University/College Name:</strong> <?php echo htmlspecialchars($student['uniName']); ?></div>
            <div class="profile-detail"><strong>Degree Program:</strong> <?php echo htmlspecialchars($student['degreeProgram']); ?></div>
            <div class="profile-detail"><strong>Year of Study:</strong> <?php echo htmlspecialchars($student['yearOfStudy']); ?></div>
            <div class="profile-detail"><strong>Expected Graduation:</strong> <?php echo htmlspecialchars($student['GraduationDate']); ?></div>
            <div class="profile-detail"><strong>CGPA:</strong> <?php echo htmlspecialchars($student['CGPA']); ?></div>
            <div class="profile-detail"><strong>Username:</strong> <?php echo htmlspecialchars($student['username']); ?></div>
            <div class="profile-detail"><strong>Resume/CV:</strong> 
                <a class="download-resume" href="../Files/<?php echo htmlspecialchars($student['resume']); ?>" target="_blank">Download Resume</a>
            </div>
            <div class="profile-detail"><strong>Skills/Interests:</strong> <?php echo htmlspecialchars($student['skills']); ?></div>
            <button class="edit-btn" id="editProfileBtn">Edit Profile</button>
        </div>
    </div>
</div>


<script>
document.getElementById("editProfileBtn").addEventListener("click", function () {
    Swal.fire({
        title: 'Edit Profile',
        html: `
            <input type="text" id="firstname" class="swal2-input" placeholder="First Name" value="<?php echo htmlspecialchars($student['firstname']); ?>">
            <input type="text" id="lastname" class="swal2-input" placeholder="Last Name" value="<?php echo htmlspecialchars($student['lastname']); ?>">
            <input type="email" id="email" class="swal2-input" placeholder="Email" value="<?php echo htmlspecialchars($student['email']); ?>">
            <input type="text" id="phoneNo" class="swal2-input" placeholder="Mobile Number" value="<?php echo htmlspecialchars($student['phoneNo']); ?>">
            <input type="text" id="uniName" class="swal2-input" placeholder="University/College Name" value="<?php echo htmlspecialchars($student['uniName']); ?>">
            <input type="text" id="degreeProgram" class="swal2-input" placeholder="Degree Program" value="<?php echo htmlspecialchars($student['degreeProgram']); ?>">
            <input type="text" id="yearOfStudy" class="swal2-input" placeholder="Year of Study" value="<?php echo htmlspecialchars($student['yearOfStudy']); ?>">
            <input type="text" id="CGPA" class="swal2-input" placeholder="CGPA" value="<?php echo htmlspecialchars($student['CGPA']); ?>">
        `,
        confirmButtonText: 'Save Changes',
        focusConfirm: false,
        preConfirm: () => {
          
            const firstname = document.getElementById('firstname').value;
            const lastname = document.getElementById('lastname').value;
            const email = document.getElementById('email').value;
            const phoneNo = document.getElementById('phoneNo').value;
            const uniName = document.getElementById('uniName').value;
            const degreeProgram = document.getElementById('degreeProgram').value;
            const yearOfStudy = document.getElementById('yearOfStudy').value;
            const CGPA = document.getElementById('CGPA').value;

            
            if (!firstname || !lastname || !email || !phoneNo) {
                Swal.showValidationMessage(`Please fill all required fields`);
                return false; 
            }

          
            return { firstname, lastname, email, phoneNo, uniName, degreeProgram, yearOfStudy, CGPA };
        }
    }).then((result) => {
        if (result.isConfirmed) {
            
            fetch('backEnd/update_profile.php', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(result.value)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Profile Updated!', '', 'success');
                    
                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    Swal.fire('Error!', 'There was an error updating your profile. Please try again.', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error!', 'There was an error processing your request.', 'error');
            });
        }
    });
});
</script>

<?php include('footer.php'); ?>
