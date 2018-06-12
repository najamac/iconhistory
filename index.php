<?php
include "dbconnect.inc.php";
 
if(ISSET($_POST['login'])){
 session_start();
$username= $_POST['uname'];
$password = $_POST['pass'];

//echo "<script language=\"javascript\">alert('Username is $username and Password is $password');</script>";

//$query = "select username from user_login where username = '$username' and password = '$password'";

//echo "<script language=\"javascript\">alert($query);</script>";

if ($result=$conn->query("select username from user_login where username = '$username' and password = '$password'")){

  $row_cnt = $result->num_rows;
  echo "<script language=\"javascript\">alert($row_cnt);</script>";
  
  if($row_cnt == 1){

                            $_SESSION['username'] = $username;      
                            header("location: interview.php");
                            }
  
}


}


if(ISSET($_POST['register'])){
//echo "<script language=\"javascript\">alert('hello');</script>";

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$grade = $_POST['grade'];
$email = $_POST['mail'];
$username =$_POST['name'];
$password = $_POST['pass'];

$ul="insert into user_login (username, password) values ('".$username."','".$password."')";
//echo "<script language=\"javascript\">alert($ul);</script>";
$ui = "insert into user_info (username, first_name, last_name, gender, grade, email)  values ('". $username."','".$fname."','".$lname."','".$gender."','".$grade."','".$email."')";
//echo "<script language=\"javascript\">alert($ui);</script>";

if ($conn->query($ul) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ul . "<br>" . $conn->error;
}

if ($conn->query($ui) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $ui . "<br>" . $conn->error;
}

 header("location: index.php");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    	<!-- Required meta tags -->
    	<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<!-- Bootstrap CSS -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">	</script>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  	<link href="assets/css/styles.css" rel="stylesheet">

    	<title>ICon History</title>
</head>

<body>

<div class="container">
      <div class="row">
         <div class="col-md-6">
         <div class="panel with-nav-tabs panel-info">
            <div class="panel-heading">
               <ul class="nav nav-tabs">
                  <li class="active"><a href="#login" data-toggle="tab"> Login </a></li>
                  <li><a href="#signup" data-toggle="tab"> Signup </a></li>
               </ul>
            </div>

            <div class="panel-body">
               <div class="tab-content">
                  <div id="login" class="tab-pane fade in active register">
                     <div class="container-fluid">
                        <div class="row">
                              <h2 class="text-center" style="color: #5cb85c;"> <strong> Login  </strong></h2><hr />

                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12"> 
                                 <form   action="" method="POST" >
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-user"></span>
                                          </div>
                                          <input type="text" placeholder="User Name" name="uname" class="form-control input-lg is-valid" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             <span class="glyphicon glyphicon-lock"></span>
                                          </div>

                                          <input type="password" placeholder="Password" name="pass" class="form-control input-lg is-valid" required>
                                       </div>
                                    </div>
                                 </div>
                              </div>

                              <div class="col-xs-12 col-sm-12 col-md-12">
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                       <input type="checkbox" name="check" checked> Remember Me
                                    </div>
                                 </div>

                                  <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                       <a href="#forgot" data-toggle="modal"> Forgot Password? </a>
                                    </div>
                                 </div>
                              </div>
                              <hr />
                              <div class="row">
                                 <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button name="login" type="submit" class="btn btn-success btn-block btn-lg"> Login </button>
                                 </div>
                              </div>
                            </form>
                  </div>

                        </div>
                     </div> 

                  <div id="signup" class="tab-pane fade">
                     <div class="container-fluid">
                        <div class="row">
                              <h2 class="text-center" style="color: #f0ad4e;"> <Strong> Register </Strong></h2> <hr />
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                    <form   action="" method="POST" >
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span  style="font-size:20px;">First Name</span>
                                             </div>
                                             <input type="text" class="form-control input-lg" placeholder="Enter First Name" name="fname">
                                          </div>
                                       </div>
                                    </div>
                             
                                   
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                               <span  style="font-size:20px;">Last Name</span>
                                             </div>
                                             <input type="text" class="form-control input-lg" placeholder="Enter Last Name" name="lname">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 
                                 <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                            <span  style="font-size:20px;">Gender</span>

                                             </div>
<div class="form-control input-lg">

    <label class="checkbox-inline">
      <input name="gender" type="radio" value="f">Female
    </label>
    
    
    <label class="checkbox-inline">
      <input name="gender" type="radio" value="m">Male
    </label>

  </div>                                          </div>
                                       </div>
                                    </div>
                             
                                   
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span  style="font-size:20px;">Grade</span>
                                             </div>
                                            <div class="form-control input-lg">
    <label class="checkbox-inline">
      <input name="grade" type="radio" value="3">3rd
    </label>
    <label class="checkbox-inline">
      <input name="grade" type="radio" value="4">4th
    </label>
    <label class="checkbox-inline">
      <input name="grade" type="radio" value="5">5th
    </label>
    <label class="checkbox-inline">
      <input name="grade" type="radio" value="6">6th
    </label>
  </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                               <!--  <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span  style="font-size:20px;">Race</span>
                                                </div>
                                            <div class="form-control input-lg">
                                                
                                              <label class="checkbox-inline">
      <input name="race" type="radio" value="3">American Indian/Alaska Native
    </label>
    <label class="checkbox-inline">
      <input name="race" type="radio" value="4">Asian
    </label>
  
    <label class="checkbox-inline">
      <input name="race" type="radio" value="5">Black/African-American
    </label>
    <label class="checkbox-inline">
      <input name="race" type="radio" value="6">Native Hawaiian/Other Pacific Islander
    </label>
    <label class="checkbox-inline">
      <input name="race" type="radio" value="6">White/Caucasian
    </label>
  </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>-->
                                 
                                   <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span  style="font-size:20px;">Email</span>
                                             </div>
                                             <input type="email" class="form-control input-lg" placeholder="Enter E-Mail" name="mail">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              
                                 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span  style="font-size:20px;">Username</span>
                                             </div>
                                             <input type="text" class="form-control input-lg" placeholder="Enter Username" name="name">
                                          </div>
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <div class="input-group">
                                             <div class="input-group-addon iga1">
                                                <span  style="font-size:20px;">Password</span>
                                             </div>
                                             <input type="password" class="form-control input-lg" placeholder="Enter Password" name="pass">
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                       <div class="form-group">
                                          <button name="register" type="submit" class="btn btn-lg btn-block btn-warning"> Register</button>
                                       </div>
                                    </div>
                                      </form>
                                 </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


   <div class="modal fade" id="forgot">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss='modal' aria-hidden="true"><span class="glyphicon glyphicon-remove"></span></button>
               <h4 class="modal-title" style="font-size: 32px; padding: 12px;"> Recover Your Password </h4>
            </div>

            <div class="modal-body">
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <div class="input-group">
                              <div class="input-group-addon iga2">
                                 <span class="glyphicon glyphicon-envelope"></span>
                              </div>
                              <input type="email" class="form-control" placeholder="Enter Your E-Mail ID" name="email">
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="row">
                     <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                           <div class="input-group">
                              <div class="input-group-addon iga2">
                                 <span class="glyphicon glyphicon-lock"></span>
                              </div>
                              <input type="password" class="form-control" placeholder="Enter Your New Password" name="newpwd">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="modal-footer">
               <div class="form-group">
                  <button type="submit" class="btn btn-lg btn-info"> Save <span class="glyphicon glyphicon-saved"></span></button>

                  <button type="button" data-dismiss="modal" class="btn btn-lg btn-default"> Cancel <span class="glyphicon glyphicon-remove"></span></button>
               </div>
            </div>
         </div>
      </div>
   </div>
    </body>

</html>