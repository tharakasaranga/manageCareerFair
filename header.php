<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>

        *{
            padding:0;
            margin:0;
            
        }
        html {
            scroll-behavior: smooth;
        }


        .text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 6em;
            text-transform: uppercase;
            color: #120404;
            background: linear-gradient(90deg, rgba(2, 0, 36, 0.555234593837535) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            letter-spacing: 2px;
            margin: 0.5em 0;
            padding: 10px;
            display: inline-block;
            animation: pulse 1.5s infinite;
        }

        .butt{
            padding:10px 15px 10px 15px;
            margin:0px 10px 0px 0px;
            font-weight: 700;
            background-color: greenyellow;
            border-radius: 10px;
            border : 2px solid green;
        }

        .butt:hover{
            box-shadow: 2px 2px 15px  green;
        }

        #aboutsection{
            padding:40px;
        }
        .aboutpara{
            text-align: justify;
            margin:20px 40px 20px 40px;
        }
        a {
            text-decoration: none;
            color: black;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .background-container {
            width: 100%;
            height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-family: Arial, sans-serif;
            animation: changeBackground 12s infinite alternate;
            background-size: cover;
            background-position: center;
        }

        #feature{
            font-weight: 900;
            color:black;
        }


        @keyframes changeBackground {
            0% {
                background-image: url('images/img1.jpg');
            }

            33% {
                background-image: url('images/img2.jpg');
            }

            66% {
                background-image: url('images/img3.jpg');
            }

            100% {
                background-image: url('images/img4.jpg');
            }
        }    
    </style>
</head>

<body style="background-color: rgb(220, 218, 218);">
    <header style="padding:0;" class="sticky-top">
        <div class="conatiner sticky-top">
            <div class="row">
                <div class="col  pt-5" style="background: white;">
                    <p class="h3 text-center" style="color:green; font-weight:900">Welcome to the Career Fair Portal at the Department of Computer Science, University of Jaffna!</p>
                </div>
            </div>
        </div>
        <nav class="navbar  navbar-expand-lg me-0" style="background-color: white;">
            <div class="container m-1">
                <div class="col-5 ">
                    <img style = "width:50%" src="https://www.csc.jfn.ac.lk/wp-content/uploads/2017/02/logo_new.png">
                </div>
                <div class="col-6 ">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item h5 me-3" style="border-radius: 5px;background-color:white;"> <a
                                href="index.php" class="nav-link active " style="color: rgb(60,4,109);">Home page</a></li>
                        <li class="nav-item h5 me-3" style="border-radius: 5px;background-color:white;"> <a
                                href="contact.php" class="nav-link active "
                                style="color: rgb(60,4,109);">Contact</a></li>
                        <li class="nav-item h5 me-3" style="border-radius: 5px;background-color:white;"> <a
                                href="https://www.csc.jfn.ac.lk/contact-us/" class="nav-link active "
                                style="color: rgb(60,4,109);">Department of Computer Science</a></li>

                    </ul>
                </div>
                <div class="auth-buttons" style="position: absolute; top: 20px; right: 20px;">
                    <button class="butt" id="loginButton">Login</butto>
                    <button  class = "butt" onclick="showRegisterSwal()">Register</button>
                </div>
            </div>
        </nav>
    </header>
    
</body>
<script>

document.getElementById('loginButton').onclick = function() {
        window.location.href = "login.php"; 
    };
function showLoginSwal() {
    Swal.fire({
        title: 'Login as',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Student',
        denyButtonText: 'Employer',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'login.php';
        } else if (result.isDenied) {
            window.location.href = 'login.php';
        }
    });
}

function showRegisterSwal() {
    Swal.fire({
        title: 'Register as',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Student',
        denyButtonText: 'Employer',
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = 'student_register.php';
        } else if (result.isDenied) {
            window.location.href = 'register_employer.php';
        }
    });
}
</script>
