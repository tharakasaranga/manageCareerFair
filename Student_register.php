<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Header Option</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    .upload {
      text-transform: uppercase;
      background: rgb(216, 114, 5);
      color: white;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      text-align: center;
      font-size: 16px;
      letter-spacing: 1px;
    }

    .upload-file {
      margin-left: 30px;
    }

    .file-name {
      margin-top: 10px;
      font-size: 14px;
      color: green;
    }

    .signUp button {
      margin-top: 30px;
      padding: 9px 50px;
      border: none;
      color: white;
      font-weight: bold;
      background-color: rgb(13, 101, 13);
      border-radius: 5px;
      font-size: 16px;
      cursor: pointer;
    }

    a{
      text-decoration: none;
    }

    .signUp button:hover {
      background-color: rgb(16, 155, 16);
    }

    .signUp a {
      padding-top: 10px;
      font-size: 18px;
      text-decoration: none;
    }

    .signUp a:hover {
      text-decoration: underline;
    }
    span{
      color: darkblue;
    }
    
  </style>
</head>
<body style="background-color: rgb(220, 218, 218);">


  <header class="sticky-top">
    <nav class="navbar  navbar-expand-lg" style="background-color: gray;">
      <div class="container">
        <div class="col-2 ">
        <img  width="250" height="50" src="https://www.csc.jfn.ac.lk/wp-content/uploads/2017/02/logo_new.png" class="custom-logo" alt="Department of Computer Science" decoding="async" srcset="https://www.csc.jfn.ac.lk/wp-content/uploads/2017/02/logo_new.png 370w, https://www.csc.jfn.ac.lk/wp-content/uploads/2017/02/logo_new-300x58.png 300w" sizes="(max-width: 370px) 100vw, 370px" >
        </div>
        <div class="col-8 mt-2">
          <P class="navbar-brand text-center " style="font-size: 37px;font-weight:500;color:darkblue;"> Registration form for students</P>
        </div> 
        <div class="col-2 ">
          <ul class="navbar-nav ms-auto">
             <li class="nav-item h5 me-3" style="border-radius: 5px;background-color:white;"> <a href="index.php" class="nav-link active " style="color: rgb(60,4,109);">Home</a></li>
              <li class="nav-item h5 " style="border-radius: 5px;background-color:white;"><a href="contact.php" class="nav-link " style="color: rgb(60,4,109);">Contacts</a></li>
          </ul>
        </div> 
      </div>
    </nav>
  </header>

  <div class="container mt-4">
    <div class="row">
      <div class="col-3">
        
      </div>

      <div class="col">
        <div class="card">

          <div class="card-header">
            <p class="card-title h3 text-center text-dark">Create a new account</p>
          </div>
          <div class="card-body">
            <form action="backEnd/insertStudentDetails.php" method="GET" enctype="multipart/form-data">

        
              <div class="row mb-3">
                <div class="col">
                  <label>First Name</label>
                  <input type="text" name="firstname" class="form-control" placeholder="Enter First Name" required>
                </div>
                <div class="col">
                  <label>Last Name</label>
                  <input type="text" name="lastname" class="form-control" placeholder="Enter Last Name" required>
                </div>
              </div>

              <div class="mb-3">
                <label>Student Registration Number</label>
                <input type="regNo" name="regNo" class="form-control" placeholder="20XX/XXX/XXX" required>
              </div>


              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
              </div>

              <div class="mb-3">
                <label>Mobile Number</label>
                <input type="text" name="phoneNo" class="form-control" placeholder="Enter Phone Number" required>
              </div>

              <div class="mb-3">
                <label>Date of Birth</label>
                <input type="date" name="dateOfBirth" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>Gender</label>
                <div class="row">
                  <div class="col">
                    <div class="form-control">
                      <label for="maleid">Male</label>
                      <input type="radio" name="gender" id="maleid" value="Male" required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-control">
                      <label for="femaleid">Female</label>
                      <input type="radio" name="gender" id="femaleid" value="Female" required>
                    </div>
                  </div>
                  <div class="col">
                    <div class="form-control">
                      <label for="othersid">Others</label>
                      <input type="radio" name="gender" id="othersid" value="Others" required>
                    </div>
                  </div>
                </div>
              </div>

         
              <div class="mb-3">
                <label>University/College Name</label>
                <input type="text" name="uniName" class="form-control" placeholder="Enter University/College Name" required>
              </div>

              <div class="mb-3">
                <label>Degree Program</label>
                <select name="degreeProgram" class="form-control" required>
                  <option value="">Select a Degree Program</option>
                  <option value="BSc Computer Science">BSc Computer Science</option>
                  <option value="MSc Data Science">MSc Data Science</option>
                  <option value="MSc Data Science">Software Engineering</option>
                  <option value="MSc Data Science">Computer Engineering</option>
                  <option value="MSc Data Science">IT</option>
                </select>
              </div>

              <div class="mb-3">
                <label>Year of Study</label>
                <select name="yearOfStudy" class="form-control" required>
                  <option value="">Select Year</option>
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
                </select>
              </div>

              <div class="mb-3">
                <label>Expected Graduation</label>
                <input type="date" name="GraduationDate" class="form-control" required>
              </div>

              <div class="mb-3">
                <label>CGPA</label>
                <input type="text" name="CGPA" class="form-control" placeholder="Enter CGPA" required>
              </div>

          
              <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
              </div>

              <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
              </div>

              <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="confirmPass" class="form-control" placeholder="Confirm Password" required>
              </div>

             
              <div class="mb-3">
                <label>Resume/CV</label>
                <div class="upload-file">
                  <input type="file" name="resume" id="uploadid" required onchange="displayFileName()">
                  
                </div>
              </div>

        
              <div class="mb-3">
                <label>Interests/Skills</label>
                <textarea name="skills" class="form-control" placeholder="Enter Skills/Interests" required></textarea>
              </div>

        
              <div class="signUp">
                <button type="submit">Sign Up</button>
              </div>
              
              <div class="text-center mt-3 h5">
                Already have an account ?
                <a href="login.php">Sign in</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="col-3"></div>
    </div>
  </div>

  <footer class="bg-body-tertiary text-center text-lg-start mt-3">
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.3);">
      <p class="h5 mt-1 ">&copy; 2024 Career Fair Management System. All rights reserved.</p>
      
    </div>
</footer>
  

  <script>
    function displayFileName() {
      var input = document.getElementById('uploadid');
      var fileName = input.files[0].name;
      document.getElementById('file-name').textContent = "Selected file: " + fileName;
    }
  </script>
</body>
</html>
