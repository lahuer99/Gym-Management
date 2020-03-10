<?php
    session_start();
    if(!isset($_SESSION['user'])) {
        header('Location: ./index.php');
    }else {
        include_once './includes/dbh.inc.php';
    }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>fitness gym</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="./css/userDashboard.css">
</head>

<body>
    <?php
    $username=$_SESSION['user'];
    $sql = "SELECT memberName FROM member,loginMember WHERE username='$username' and member.memberId=loginMember.memberId;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $mname=$row[memberName];
    ?>
    <?php

        $username=$_SESSION['user'];
        $sql = "SELECT monday,tuesday,wednesday,thursday,friday FROM loginMember,package,member WHERE loginMember.username='$username' and member.packageId=package.packageId and
                member.memberId=loginMember.memberId ;";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $monday=$row[monday];
        $tuesday=$row[tuesday];
        $wednesday=$row[wednesday];
        $thursday=$row[thursday];
        $friday=$row[friday];
    ?>
    <section id="title">
        <!-- navbar section -->
        <nav class="navbar fixed-top  navbar-expand-md navbar-dark navbar-custom ">
            <a class="navbar-brand" href="">  Welcome <?php echo $mname; ?> </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="dropdown">
                            <button onclick="myFunction()" class="dropbtn">Schedule</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="#">Monday
                                    <ul>
                                        <li><?php echo $monday; ?> </li>

                                    </ul>
                                </a>
                                <a href="#">Tuesday
                                     <ul>
                                        <li><?php echo $tuesday; ?> </li>

                                    </ul>
                                </a>
                                <a href="#">Wednesday
                                    <ul>
                                        <li> <?php echo $wednesday; ?> </li>

                                    </ul>
                                </a>
                                <a href="#">Thursday
                                    <ul>
                                        <li> <?php echo $thursday; ?> </li>

                                    </ul>
                                </a>
                                <a href="#">Friday
                                    <ul>
                                        <li><?php echo $friday; ?> </li>

                                    </ul>
                                </a>
                            </div>
                        </div> 
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link btn btn-primary" href="./includes/logout.inc.php">Sign Out</a></button>
                    </li>

                </ul>
            </div>
        </nav>
    </section>
    <?php

    $username=$_SESSION['user'];
    $sql = "SELECT  pushUpCount,pullUpCount,sitUpCount,packageName,packageAmount FROM loginMember,package,member WHERE loginMember.username='$username' and member.packageId=package.packageId 
                      and  member.memberId=loginMember.memberId;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $pushups=$row[pushUpCount];
    $situps=$row[pullUpCount];
    $pullups=$row[sitUpCount];
    $packageName=$row[packageName];
    $packageCost=$row[packageAmount];
    ?>
    <?php

        $username=$_SESSION['user'];
        $sql = "SELECT trainerName,trainerMobile FROM loginMember,trainer,member WHERE loginMember.username='$username' and member.trainerId=trainer.trainerId and
                member.memberId=loginMember.memberId ;";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $trainerName=$row[trainerName];
        $trainerMobile=$row[trainerMobile];
?>
    <section id="user-header">
        <div class="container-fluid contents">
             <div class="workout-form" >
                
                <h2 class="workout">
                    TODAY'S WORKOUTS</h2>
                <div class="schedule">
                     PUSHUPS
                     <p class="exercise"><?php echo $pushups;  ?><br></p>
                </div>
                <div class="schedule">
                     SITUPS
                     <p class="exercise"><?php  echo $situps;    ?><br></p>
                </div>
                <div class="schedule">
                     PULLUPS
                     <p class="exercise"><?php  echo $pullups;    ?><br></p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="package-type">
                         PACKAGE DETAILS
                         <div>
                             Package Type:  <?php  echo $packageName;  ?><br>
                             Package Cost:  <?php  echo $packageCost;  ?>

                         </div>
                    </div>
                </div>
                <div class="col-lg-6 package-details">
                    YOUR TRAINER
                    <div>
                        <img class="trainer-image trainer-details" src="./assets/avatars/person2.png" alt="trainer">
                        <h2 class="trainer-details">Name : <?php  echo $trainerName  ?><br></h2>
                        <h2 class="trainer-details">Phone :<?php  echo $trainerMobile  ?></h2>  
                    </div>
                </div>

            </div>
         </div>  
     </section>
     <script src="index.js"></script>   
</body>

</html>