<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMK1vW8i39r6z9eD1F1DZ6LP1zPlf/FKf7l7VfW" crossorigin="anonymous">
    <style>
        .headline {
            background-image: url("DCS.jpg");
            background-size: cover;
            height: 400px;
            position: relative;
            text-align: center;
            color: white;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
        }
        .headline h1 {
            position: relative;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2.5rem;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }
        .contact-info i {
            font-size: 1.2rem;
            color: #007bff;
            margin-right: 8px;
        }
        .btn-custom {
            color: white;
            background: #000;
            border-radius: 30px;
            font-size: 1.2rem;
            padding: 10px 20px;
        }
    </style>
</head>
<body>

    <div class="container-fluid p-0">
       
        <div class="headline">
            <div class="overlay"></div>
            <h1>Contact Us</h1>
        </div>

        
        <div class="container my-5">
            <div class="row">
                
                <div class="col-12 col-md-6 contact-info mb-4">
                    <p><i class="fas fa-map-marker-alt"></i> Head,<br>
                        Department of Computer Science,<br>
                        Faculty of Science,<br>
                        University of Jaffna,<br>
                        Jaffna, Sri Lanka.
                    </p>
                    <p><i class="fas fa-phone-volume"></i> (0094) (0)21 221 8194</p>
                    <p><i class="fas fa-envelope"></i> dcs@univ.jfn.ac.lk</p>
                    <p><i class="fas fa-link"></i> www.csc.jfn.ac.lk</p>
                    <a href="https://www.jfn.ac.lk/telephone-directory/" class="btn btn-custom">
                        <i class="fas fa-book"></i> Intercom Directory
                    </a>
                </div>

                
                <div class="col-12 col-md-6 mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1966.4722337459937!2d80.021062!3d9.685781!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3afe54125cafe551%3A0x61d1a49bcd146dfe!2sDepartment%20of%20Computer%20Science%2C%20University%20of%20Jaffna!5e0!3m2!1sen!2sus!4v1730837734135!5m2!1sen!2sus" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
