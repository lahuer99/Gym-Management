<?php
    include_once './dbh.inc.php';
    $memberName = $_POST['memberName'];
    $email = $_POST['email'];
    $memberUsername = $_POST['memberUsername'];
    $memberPassword = $_POST['memberPassword'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $dues=$_POST['memberDues'];
    $trainerId=$_POST['trainerId'];
    $packageId=$_POST['packageId'];
    

    // inserting details into member table
    $sql1="INSERT INTO member(memberMobile,memberEmail,memberName,dues,trainerId,packageId) 
            VALUES('$mobile','$email','$memberName',$dues,$trainerId,$packageId);";
    mysqli_query($conn,$sql1);
    // selecting member id from the member able
    $sql2="SELECT memberId FROM member WHERE memberEmail='$email';";
    
    //echo "query is : $sql2";
    $result1=mysqli_query($conn,$sql2);
    $row=mysqli_fetch_assoc($result1);
    $memberId=$row[memberId];
    //print_r($memberId);
    // inserting member id and details into login member table
    $sql3="INSERT INTO loginMember(username,password,memberId)
            VALUES('$memberUsername','$memberPassword',$memberId);";
    mysqli_query($conn,$sql3);
    //print_r($sql3);
    header("Location: ../adminDashboard.php");
    

?>

