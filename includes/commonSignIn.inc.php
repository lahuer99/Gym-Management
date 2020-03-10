<?php
    include_once dirname(__FILE__).'/./dbh.inc.php';
    
    $Username = $_POST['userName'];
    $Password = $_POST['userPassword'];
    $role=$_POST['check'];
    echo $role;
            
    $statusTrainer=false;
    $statusMember=false;
    if($role=='member'){
        $sql="SELECT username,password FROM loginMember;";
    
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);

        if($resultCheck>0){
            while($row=mysqli_fetch_assoc($result)){
                if($row[username]==$Username && $row[password]==$Password){
                    $statusMember=true;
                    $user=$Username;
                    //header('Location: ../userDashboard.php');
                                    
                }
    
            }
        }

    }elseif ($role=='trainer') {
        
        $sql="SELECT username,password FROM loginTrainer;";
    
        $result=mysqli_query($conn,$sql);
        $resultCheck=mysqli_num_rows($result);
        
    
        if($resultCheck>0){
            while($row=mysqli_fetch_assoc($result)){
                if($row[username]==$Username && $row[password]==$Password){
                    $statusTrainer=true;
                    $user=$Username;
                    //header('Location: ../trainerDashboard.php');
                                    
                }
    
            }
        }

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

   
?>
