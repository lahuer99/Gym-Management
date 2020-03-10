<?php
    include_once './dbh.inc.php';
    $packageName = $_POST['packageName'];
    $packageAmount = $_POST['packageAmount'];
    $pushUpCount = $_POST['pushUpCount'];
    $pullUpCount = $_POST['pullUpCount'];
    $sitUpCount = $_POST['sitUpCount'];
    $monday = $_POST['monday'];
    $tueday = $_POST['tueday'];
    $wednesday = $_POST['wednesday'];
    $thursday = $_POST['thursday'];
    $friday = $_POST['friday'];
    

    // inserting details into member table
    $sql1="INSERT INTO package(packageName,packageAmount,pushUpCount,pullUpCount,sitUpCount,monday,tueday,wednesday,thursday,friday) 
            VALUES('$packageName','$packageAmount','$pushUpCount','$pullUpCount','$sitUpCount','$monday','$tueday','$wednesday','$thursday','$friday');";
    mysqli_query($conn,$sql1);
    
    header("Location: ../adminDashboard.php");
    

?>

