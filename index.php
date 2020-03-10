<?php
    session_start();

    if (isset($_POST['admin-login'])) {
        // Verify credentials

        $ok = false;
        if ($_POST['adminPassword']=='Justine' && $_POST['adminUsername']=='Justine') {
            # code...
            $ok=true;
        }
        if($ok) {
            $_SESSION['admin'] = 'justine';
            header('Location: ./adminDashboard.php');
        } else {
            $err_response = "Invalid Credentials";
        }
    }
    if (isset($_POST['user-login'])) {
        // Verify credentials
        //get username and password from database
        //echo "HI";
        include_once dirname(__FILE__).'/includes/commonSignIn.inc.php';
        // here status is a variable decared in usersignIn file
       
        if($statusMember) {
            $_SESSION['user'] = $user;
            header('Location: ./userDashboard.php');
        } elseif($statusTrainer) {
            $_SESSION['user'] = $user;
            header('Location: ./trainerDashboard.php');
        }else {
            $err_response = "invalid login";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fitness gym</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:900&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <!-- title section -->
    <section id="title"> 
        <!-- navbar section -->
        <nav class="navbar fixed-top  navbar-expand-md navbar-dark navbar-custom ">
            <a class="navbar-brand" href="">GYM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#packages">Packages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#trainers">Trainers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                    <button type="button" class="btn btn-outline-light btn-lg"><a href="#contacts">SignUp/Admin</a></button>
                    </li>

                </ul>
            </div>
        </nav>
    
        <!-- title section -->


    </section > 
    <!-- header section -->

    <section id="front-header">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-lg-8 gym_quote col-md-6 col-sm-6">
                    Your progress takes place in our zone
                </div>
                <div class="col-lg-4  col-sm-6">
                    <!-- login form -->
                    <form class="login-form" method="POST" action="">
                        <h3>LOGIN</h3>
                        <div class="form-group">
                            <label for="usernameOfUser">Username</label>
                            <input type="text" class="form-control" name="userName" placeholder="Enter username"> 
                        </div>
                        <div class="form-group">
                            <label for="userPassword">Password</label>
                            <input type="password" class="form-control" name="userPassword" placeholder="Password">
                        </div>
                        <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="check" value="trainer">
                                <label class="form-check-label" for="inlineRadio1">Trainer</label>
                        </div>
                         <div class="form-check form-check-inline">
                             <input class="form-check-input" type="radio" name="check"  value="member">
                             <label class="form-check-label" for="inlineRadio2">Member</label>
                        </div>
                        <?php if ($err_response='invalid login'): ?>
                            <div class="form-group">
                                <span><?=$err_response?></span>
                            </div>
                        <?php endif; ?>
                        <input type="submit" class="btn btn-primary" name="user-login" value="Submit"/>
                        
                    </form>
                </div>
            </div>
        </div>  
    </section>
    <!-- packages section -->
    <section id="packages">
        <div class="container-fluid ">
            <div  class="offer-quotes">
                WHAT WE OFFER
            </div>
            <div class="row">
                <div class="pricing-box col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <h5 class="card-title head-card1">BRONZE PACKAGE</h5>
                        <div class="card-body">
                            <p class="card-text">A complete fitness package with exercise</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-box col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <h5 class="card-title head-card2">SILVER PACKAGE</h5>
                        <div class="card-body">                        
                        <p class="card-text">A complete fitness package with exercise and personalised guidance</p>
                        </div>
                    </div>
                </div>
                <div class="pricing-box col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <h5 class="card-title head-card3">GOLD PACKAGE</h5>
                        <div class="card-body">
                        <p class="card-text">A complete fitness package with exercise and personalised guidance with 24/7 support</p>
                        </div>
                    </div>
                </div>

                <div class="pricing-box col-lg-3">
                    <div class="card" style="width: 18rem;">
                        <h5 class="card-title head-card4">PLATINUM PACKAGE</h5>
                        <div class="card-body">
                            <p class="card-text">A complete fitness package with exercise and personalised guidance with 24/7 support and diet help</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- our tutors section -->
    <section id="trainers">
        <div class="container-fluid ">
            <div  class="trainer-quotes">
              OUR TRAINERS
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <img class="trainer-photos" src="./assets/avatars/person1.png" alt="person1">
                </div>
                <div class="col-lg-4 col-md-4">
                    <img class="trainer-photos" src="./assets/avatars/person2.png" alt="person2">
                </div>
                <div class="col-lg-4 col-md-4">
                    <img class="trainer-photos" src="./assets/avatars/person4.png" alt="person3">
                </div>
            </div>
        </div>
    </section>
    <!-- testimonials section -->
    <section id="testimonials">
        <div class="container-fluid ">
            <div id="testimonial-carousel" class="carousel slide" data-ride="false">
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <h2>It was a really awesome experience. Thanks to the instructors</h2>
                        <img class="testimonial-image" src="./assets/avatars/person4.png" alt="man-profile">
                        <em>RIZWAN, WAYANAD</em>
                    </div>


                    <div class="carousel-item">
                        <h2 class="testimonial-text">High Quality professionals with personalised suggestions.</h2>
                        <img class="testimonial-image" src="./assets/avatars/person3.png" alt="man1-profile">
                        <em>BASITH, KOZHIKODE</em>
                    </div>
                </div>


                <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>

            </div>
        </div>
    </section>
    <!-- contacts section -->
    <section id="contacts"> 
        <div class="container-fluid ">
            <div class="row">
                <div class="gym-contacts col-lg-6 col-md-6">
                    <div class="address">
                        Address: <br>
                        Omega Gym <br>
                        Near NIT CALICUT <br>
                        NIT Calicut P.O <br>
                        Kozhikode <br>
                        Kerala - 686633 <br>
                    </div>
                    <div class="social-media">
                        <h3 class="social-medias"> FACEBOOK</h3>
                        <h3 class="social-medias">TWITTER</h3>
                        <h3 class="social-medias">INSTAGRAM</h3>        
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <form class="admin-signup" method="POST" action="">
                            <h3>ADMIN LOGIN</h3>
                            <div class="form-group">
                                <label for="adminUsername">Username</label>
                                <input type="text" name="adminUsername" class="form-control" placeholder="Username">                               
                            </div>
                            <div class="form-group">
                                <label for="AdminPassword">Password</label>
                                <input type="password" name="adminPassword" class="form-control" placeholder="Password">
                            </div>
                            <?php if (isset($err_response)): ?>
                            <div class="form-group">
                                <span><?=$err_response?></span>
                            </div>
                            <?php endif; ?>
                            <input type="submit" class="btn btn-primary" name="admin-login" value="Submit" />
                    </form>
                </div>     
            </div>
        </div>  
    </section>


</body>

</html>