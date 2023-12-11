<?php
	include 'admin_dbcon.php';
	if(isset($_POST['register'])){
		$username=$_POST['username'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$password=$_POST['password'];
		$c_password=$_POST['c_password'];
        $input_error=array();
        if(empty($username)){
            $input_error['username']="Username is required";
        }
        if(empty($email)){
            $input_error['email']="Email is required";
        }
        if(empty($mobile)){
            $input_error['mobile']="Mobile is required";
        }
        if(empty($password)){
            $input_error['password']="Password is required";
        }
        if(empty($c_password)){
            $input_error['c_password']="Confirm Password is required";
        }
        if(count($input_error)==0){
            if(strlen($username)>=5){
                if(strlen($password)>=8 && strlen($c_password)>=8){
                        if($password==$c_password){
                                $user_check=mysqli_query($admin_dbcon,"SELECT * FROM `student_info` WHERE `username`='$username'");
                                if(mysqli_num_rows($user_check)==0){
                                    $email_check=mysqli_query($admin_dbcon,"SELECT * FROM `student_info` WHERE `email`='$email'");     
                                        if(mysqli_num_rows($email_check)==0){
											
                                                
                                                date_default_timezone_set("Asia/Dhaka");
                                                $reg_time=date('m-d-Y,h:i:s a');
												$insert_query=mysqli_query($admin_dbcon,"INSERT INTO `student_info`(`username`, `email`, `mobile`, `password`, `reg_time`, `status`) VALUES ('$username','$email','$mobile','$password','$reg_time','Inactive')");
												if($insert_query){
													echo '<script>
														alert("Successfully registered");
														window.location.href="reg.php";
													</script>
													';
													$username=false;
													$email=false;
													$mobile=false;
													$password=false;
												}
										 
                                                

                                        }else{
                                            $input_error['email_unique']="This email is already exit";
                                        }
                                }else{
                                    $input_error['username_unique']="This username is already exit";
                                }

                        }else{
                            $input_error['dont_match']="Confirm password do not match";
                        }



                }else{
                    $input_error['password_length']="Password field must be 8 character";
                }



            }else{
                $input_error['strlen']="Username must be 5 character";
            }


        }
      



		
	}



?>



















<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <title>Admin Dashboard</title>
</head>

<body>
	<h1 class="" style="color:crimson;  text-align:center;"><i class="fas fa-tachometer-alt"></i>Dashboard <small>Statistcss Overiew</small></h1>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
						<div class="row">
  <div class="col-sm-3">
    <div class="card"style="background:crimson; margin-bottom:8px;">
      <div class="card-body">
        <i class="fas fa-users" style="font-size:30px; color:#fff"></i>
	   <h1 class=""style="color:#fff;">499</h1>
        <p class="card-text"style="color:#fff;">All Students</p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card"style="background:crimson;margin-bottom:8px;">
      <div class="card-body">
		 <i class="fas fa-users" style="font-size:30px; color:#fff"></i>
		<h1 class=""style="color:#fff;">493</h1>
        <p class="card-text"style="color:#fff;">Offline Students</p>
       
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card"style="background:crimson;margin-bottom:8px;">
      <div class="card-body">
         <i class="fas fa-users" style="font-size:30px; color:#fff"></i>
		<h1 class=""style="color:#fff;">6</h1>
        <p class="card-text"style="color:#fff;">Online Student</p>
        
      </div>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card"style="background:crimson;margin-bottom:8px;">
      <div class="card-body">
        <i class="fas fa-users" style="font-size:30px; color:#fff"></i>
		<h1 class=""style="color:#fff;">499</h1>
        <p class="card-text"style="color:#fff;">Total Account</p>
        
      </div>
    </div>
  </div>
  
</div>
   </div>
	</div>
</body>
</html>