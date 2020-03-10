<?php
    include_once './dbh.inc.php';
    $trainerName = $_POST['trainerName'];
    $email = $_POST['email'];
    $trainerUsername = $_POST['trainerUsername'];
    $trainerPassword = $_POST['trainerPassword'];
    $mobile = $_POST['mobile'];
   

    // inserting details into trainer table
    $sql1="INSERT INTO trainer(trainerMobile,trainerEmail,trainerName) 
            VALUES('$mobile','$email','$trainerName');";
    mysqli_query($conn,$sql1);
    // selecting trainer id from the trainer table
    $sql2="SELECT trainerId FROM trainer WHERE trainerEmail='$email';";
    
    //echo "query is : $sql2";
    $result1=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result1);
    $trainerId=$row[trainerId];
    //print_r($trainerId);
    // inserting trainer id and details into login trainer table
    $sql3="INSERT INTO loginTrainer(username,password,trainerId)
            VALUES('$trainerUsername','$trainerPassword',$trainerId);";
    mysqli_query($conn,$sql3);
    //print_r($sql3);
    header("Location: ../adminDashboard.php");
    

?>

