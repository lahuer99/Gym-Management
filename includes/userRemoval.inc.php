<?php
    include_once './dbh.inc.php';
    $memberUsername = $_POST['memberName'];
    $memberId = $_POST['memberId'];
    $sql="DELETE FROM member WHERE memberId='$memberId'";

    mysqli_query($conn,$sql);
    
    header("Location: ../adminDashboard.php?userDelete=success");
    

?>