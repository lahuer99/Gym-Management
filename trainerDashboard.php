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
    <link rel="stylesheet" href="./css/trainerDashboard.css">
</head>

<body>
    <?php
    $username=$_SESSION['user'];
    $sql = "SELECT trainerName FROM trainer,loginTrainer WHERE username='$username' and trainer.trainerId=loginTrainer.trainerId;";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    $mname=$row[trainerName];
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
                    <li class="nav-item ">
                        <a class="nav-link btn btn-primary" href="./includes/logout.inc.php">Sign Out</a></button>
                    </li>

                </ul>
            </div>
        </nav>
    </section>
    <?php

        
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
                    MEMBER DETAILS</h2>
             <div>
                <?php
                        $username=$_SESSION['user'];
                        $sql="SELECT memberId,memberName,memberEmail,memberMobile,dues,trainer.trainerId,trainer.trainerName FROM member,trainer,loginTrainer
                                 WHERE trainer.trainerId=member.trainerId and loginTrainer.username='$username' and trainer.trainerId=loginTrainer.trainerId;";
                        $result=mysqli_query($conn,$sql);
                        $resultCheck=mysqli_num_rows($result);
                        if($resultCheck > 0){
                            echo "<table class='table table-dark table-striped table-hover'> 
                                <tbodyhead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Dues</th>
                                        <th>Trainer ID</th>
                                        <th>Trainer</th>
                                    </tr>
                                </thead>
                                <tbody>";
                            while($row=mysqli_fetch_assoc($result)){
                                //echo "";

                                echo "<tr>
                                <td>$row[memberId]</th>
                                <td>$row[memberName]</th>
                                <td>$row[memberEmail]</th>
                                <td>$row[memberMobile]</th>
                                <td>$row[dues]</th>
                                <td>$row[trainerId]</th>
                                <td>$row[trainerName]</th>
                                </tr> ";
                                    }
                                    
                                echo "</tbody>";
                                echo "</table>";
                            }
                        else{
                            echo "no table entry found";
                        }
                ?>

            </div>
         </div>  
     </section>
     <script src="index.js"></script>   
</body>

</html>