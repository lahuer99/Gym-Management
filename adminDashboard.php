<?php
    session_start();
    if(!isset($_SESSION['admin'])) {
        header('Location: ./index.php');
    }else {
        include_once './includes/dbh.inc.php';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="./css/adminDashboard.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Admin</h3>
            </div>

            <ul class="list-unstyled components">
                <p>OPTIONS</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">MEMBER DETAILS</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#" onClick="hider1()">Member data</a>
                            
                        </li>
                        <li>
                            <a href="#" onClick="hider2()">Add Member</a>
                        </li>
                        <li>
                            <a href="#" onClick="hider3()">Remove Member</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">TRAINER DETAILS</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="#" onClick="hider4()">Trainer Data</a>
                        </li>
                        <li>
                            <a href="#" onClick="hider5()">Add Trainer</a>
                        </li>
                        <li>
                            <a href="#" onClick="hider6()">Remove Trainer</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">PACKAGE DETAILS</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <a href="#" onClick="hider7()">Package Details</a>
                        </li>
                        <li>
                            <a href="#" onClick="hider8()">Add Package</a>
                        </li>
                        <li>
                            <a href="#" onClick="hider9()">Remove Package</a>
                        </li>
                    </ul>
                </li>
                <li class="expander">............................................................................................</li>
                
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                              <a href="./includes/logout.inc.php" class="btn btn-danger"> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!--<h2>WELCOME TO ADMIN PAGE</h2> -->


            <div class="hid1 hider1">
                <h3>SHOWING DATA INSIDE MEMBER DATABASE</h3>

                <?php
                    $sql="SELECT memberId,memberName,memberEmail,memberMobile,dues,trainer.trainerId,trainer.trainerName FROM member,trainer WHERE trainer.trainerId=member.trainerId;";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck=mysqli_num_rows($result);
                    if($resultCheck > 0){
                        echo "<table class='table table-light table-striped table-hover'> 
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
            

            <div class="hid2 hider2">
                <form action="./includes/userSignup.inc.php" method="POST" class="userform">
                    <h3>ADD MEMBER DETAILS</h3>
                    <div class="form-group ">
                        <label for="memberName" class="rlabel">Name:</label>
                        <input class="userform-input"  type="text" name="memberName" placeholder="member name">                               
                    </div>
                    <div class="form-group">
                        <label for="email" class="rlabel">Email:</label>
                        <input class="userform-input" type="email" name="email" placeholder="member email">
                    </div>
                    <div class="form-group">
                        <label for="memberUsername" class="rlabel">Username:</label>
                        <input class="userform-input" type="text" name="memberUsername" placeholder="member Username">
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="rlabel">Mobile:</label>
                        <input class="userform-input" type="text" name="mobile" placeholder="member mobile">
                    </div>
                    <div class="form-group">
                        <label for="memberPassword"class="rlabel">Password:</label>
                        <input class="userform-input" type="password" name="memberPassword" placeholder="member Password"> 
                    </div>
                    <div class="form-group">
                        <label for="memberDues"class="rlabel">Dues</label>
                        <input class="userform-input" type="text" name="memberDues" placeholder="member Dues"> 
                    </div>
                    <div class="form-group">
                        <label for="trainerId"class="rlabel">trainerId</label>
                        <input class="userform-input" type="text" name="trainerId" placeholder="trainer Id"> 
                    </div>
                    <div class="form-group">
                        <label for="packageId"class="rlabel">Dues</label>
                        <input class="userform-input" type="text" name="packageId" placeholder="package Id"> 
                    </div>
                    <input type="submit" class="btn btn-danger" name="admin-signup" value="Sign Up">
                 </form>               
            </div>

            <div class="hid3 hider3">
                <h3 class="heading-text">REMOVE MEMBER</h3>
                <form action="./includes/userRemoval.inc.php" method="POST">
                    <input type="text" name="memberName" placeholder="member Name">
                    <input type="text" name="memberId" placeholder="member ID">
                    <input type="submit" class="btn btn-primary" name="userRemoval" value="Remove User"> 
                </form> 
            </div>

            <div class="hid4 hider4">
                <h3>SHOWING DATA INSIDE TRAINER DATABASE</h3>

                <?php
                    $sql="SELECT * FROM trainer;";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck=mysqli_num_rows($result);
                    if($resultCheck > 0){
                        echo "<table class='table table-light table-striped table-hover'> 
                            <tbodyhead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                            </thead>
                            <tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            //echo "";

                            echo "<tr>
                            <td>$row[trainerId]</th>
                            <td>$row[trainerName]</th>
                            <td>$row[trainerEmail]</th>
                            <td>$row[trainerMobile]</th>
                            </tr> ";
                                }
                                }
                            echo "</tbody>";
                            echo "</table>";
               ?>   

            </div>
            

            <div class="hid5 hider5">
                <form action="./includes/trainerSignup.inc.php" method="POST" class="userform">
                    <h3>ADD TRAINER DETAILS</h3>
                    <div class="form-group ">
                        <label for="memberName" class="rlabel">Name:</label>
                        <input class="userform-input"  type="text" name="trainerName" placeholder="trainer name">                               
                    </div>
                    <div class="form-group">
                        <label for="email" class="rlabel">Email:</label>
                        <input class="userform-input" type="email" name="email" placeholder="trainer email">
                    </div>
                    <div class="form-group">
                        <label for="memberUsername" class="rlabel">Username:</label>
                        <input class="userform-input" type="text" name="trainerUsername" placeholder="trainer Username">
                    </div>
                    <div class="form-group">
                        <label for="mobile" class="rlabel">Mobile:</label>
                        <input class="userform-input" type="text" name="mobile" placeholder="trainer mobile">
                    </div>
                    <div class="form-group">
                        <label for="trainerPassword"class="rlabel">Password:</label>
                        <input class="userform-input" type="password" name="trainerPassword" placeholder="trainer Password"> 
                    </div>
                    <input type="submit" class="btn btn-danger" name="trainer-signup" value="Sign Up">
                 </form>               
            </div>

            <div class="hid6 hider6">
                <h3 class="heading-text">REMOVE TRAINER</h3>
                <form action="./includes/trainerRemoval.inc.php" method="POST">
                    <input type="text" name="trainerName" placeholder="Trainer name">
                    <input type="text" name="trainerId" placeholder="Trainer ID">
                    <input type="submit" class="btn btn-primary" name="trainerRemoval" value="Remove Trainer"> 
                </form> 
            </div>


            <div class="hid7 hider7">
                <h3>SHOWING DATA INSIDE PACKAGE DATABASE</h3>

                <?php
                    $sql="SELECT * FROM package;";
                    $result=mysqli_query($conn,$sql);
                    $resultCheck=mysqli_num_rows($result);
                    if($resultCheck > 0){
                        echo "<table class='table table-light table-striped table-hover'> 
                            <tbodyhead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>";
                        while($row=mysqli_fetch_assoc($result)){
                            //echo "";

                            echo "<tr>
                            <td>$row[packageId]</th>
                            <td>$row[packageName]</th>
                            <td>$row[packageAmount]</th>
                            </tr> ";
                                }
                                }
                            echo "</tbody>";
                            echo "</table>";
               ?>   

            </div>
            

            <div class="hid8 hider8">
                <form action="./includes/packageSignup.inc.php" method="POST" class="userform">
                    <h3>ADD PACKAGE DETAILS</h3>
                    <div class="form-group ">
                        <label for="packageName" class="rlabel">Name:</label>
                        <input class="userform-input"  type="text" name="packageName" placeholder="package name">                               
                    </div>
                    <div class="form-group">
                        <label for="packageAmount" class="rlabel">Package Amount:</label>
                        <input class="userform-input" type="text" name="packageAmount" placeholder="package Amount">
                    </div>
                    <div class="form-group">
                        <label for="pushUpCount" class="rlabel">pushUp Count:</label>
                        <input class="userform-input" type="text" name="pushUpCount" placeholder="pushUp Count">
                    </div>
                    <div class="form-group">
                        <label for="pullUpCount" class="rlabel">pullUp Count</label>
                        <input class="userform-input" type="text" name="pullUpCount" placeholder="pullUp Count">
                    </div>
                    <div class="form-group">
                        <label for="sitUpCount" class="rlabel">sitUp Count</label>
                        <input class="userform-input" type="text" name="sitUpCount" placeholder="sitUp Count">
                    </div>
                    <div class="form-group">
                        <label for="monday" class="rlabel">Monday:</label>
                        <input class="userform-input" type="text" name="monday" placeholder="monday">
                    </div>
                    <div class="form-group">
                        <label for="tueday" class="rlabel">tueday:</label>
                        <input class="userform-input" type="text" name="tueday" placeholder="tueday">
                    </div>
                    <div class="form-group">
                        <label for="wednesday" class="rlabel">wednesday:</label>
                        <input class="userform-input" type="text" name="wednesday" placeholder="wednesday">
                    </div>
                    <div class="form-group">
                        <label for="thursday" class="rlabel">thursday:</label>
                        <input class="userform-input" type="text" name="thursday" placeholder="thursday">
                    </div>
                    <div class="form-group">
                        <label for="Friday" class="rlabel">Friday:</label>
                        <input class="userform-input" type="text" name="friday" placeholder="friday">
                    </div>
                    <input type="submit" class="btn btn-danger" name="package-signup" value="ADD PACKAGE">
                 </form>               
            </div>

            <div class="hid9 hider9">
                <h3 class="heading-text">REMOVE PACKAGE</h3>
                <form action="./includes/packageRemoval.inc.php" method="POST">
                    <input type="text" name="packageId" placeholder="package ID">
                    <input type="submit" class="btn btn-primary" name="packageRemoval" value="Remove Package"> 
                </form> 
            </div>
            
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script src="index.js"></script>
</body>

</html>