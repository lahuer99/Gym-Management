<?php
    include_once './dbh.inc.php';
    $trainerUsername = $_POST['trainerName'];
    $trainerId = $_POST['trainerId'];
    $sql="DELETE FROM trainer WHERE trainerId='$trainerId'";

    mysqli_query($conn,$sql);
    
    header("Location: ../adminDashboard.php?userDelete=success");
    

?>