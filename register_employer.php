<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employer Registration</title>
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
          <P class="navbar-brand text-center " style="font-size: 37px;font-weight:500;color:darkblue;"> Registration form for company</P>
        </div> 
        <div class="col-2 ">
          <ul class="navbar-nav ms-auto">
             <li class="nav-item h5 me-3" style="border-radius: 5px;background-color:white;"> <a href="index.php" class="nav-link active " style="color: rgb(60,4,109);">Home</a></li>
              <li class="nav-item h5 " style="border-radius: 5px;background-color:white;"><a href="https://www.csc.jfn.ac.lk/contact-us/" class="nav-link " style="color: rgb(60,4,109);">Contacts</a></li>
          </ul>
        </div> 
      </div>
    </nav>
  </header>

  <div class="container mt-4">
    <div class="row">
      <div class="col-3"></div>

      <div class="col">
        <div class="card">

          <div class="card-header">
            <p class="card-title h3 text-center text-dark">Create a Company Account</p>
          </div>
          <div class="card-body">
            <form action="backEnd/insertCompanyDetails.php" method="GET" enctype="multipart/form-data">

              <div class="mb-3">
                <label>Company Name</label>
                <input type="text" name="company_name" class="form-control" placeholder="Enter Company Name" required>
              </div>

              <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Company Email" required>
              </div>

              <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" name="phone_no" class="form-control" placeholder="Enter Phone Number" required>
              </div>

              <div class="mb-3">
                <label>Address</label>
                <textarea name="address" class="form-control" placeholder="Enter Company Address"></textarea>
              </div>

              <div class="mb-3">
                <label>Website</label>
                <input type="url" name="website" class="form-control" placeholder="Enter Company Website">
              </div>

              <div class="mb-3">
                <label>Industry/Field</label>
                <input type="text" name="industry" class="form-control" placeholder="Machine Learning / Software Engineering / Web development etc..">
              </div>

              <div class="mb-3">
                <label>Company Logo</label>
                <div class="upload-file">
                  <input type="file" name="logo" id="uploadid" onchange="displayFileName()">
                </div>
                <p id="file-name" class="file-name"></p>
              </div>

              <div class="mb-3">
                <label>Contact Person</label>
                <input type="text" name="contact_person" class="form-control" placeholder="Enter Contact Person's Name" required>
              </div>

              <div class="mb-3">
                <label>Contact Person Position</label>
                <input type="text" name="contact_person_position" class="form-control" placeholder="Enter Contact Person's Position" required>
              </div>

            
              <div class="signUp">
                <button type="submit">Register Company</button>
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
