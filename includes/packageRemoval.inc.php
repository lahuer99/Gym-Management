<?php
    include_once './dbh.inc.php';
    $packageName = $_POST['packageName'];
    $packageId = $_POST['packageId'];
    $sql="DELETE FROM package WHERE packageId='$packageId'";

    mysqli_query($conn,$sql);
    
    header("Location: ../adminDashboard.php?userDelete=success");
    

?>