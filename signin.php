<?php

#session start
session_start();
include("partials/connect.php");
if(isset($_POST['login'])){
    $username= $_POST['username'];
    $password= $_POST['password'];


    //query
    $select_query= "Select * from `user_data` where username='$username'";
    $result = mysqli_query($con,$select_query);
    $fetch_data= mysqli_fetch_assoc($result);
    // echo $fetch_data['username'];
    $num_rows=mysqli_num_rows($result);
    if($num_rows>0){
        if(password_verify($password,$fetch_data['password'])){
            $_SESSION['username'] = $username;
            echo "<script>alert('You have successfully logged in')</script>";
            echo "<script>window.open('home.php', '_self')</script>";
        }else{
            echo "<script>alert('Invalid credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" 
    crossorigin="anonymous">
    
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
    integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- stylesheet -->
  <link rel="stylesheet" href="./css/style.css">

</head>
<body>
  <div class="container d-flex align-items-center justify-content-center">
      <div class="card signin_card">
           <!-- card header -->
           <div class="card-header text-center">
               <h3> Sign In</h3>
           </div>
            <!-- card body -->
            <div class="card-body text-center">
            <form action="" method="post">
            <div class="input-group mb-3">
                 <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                     <input type="text" class="form-control" 
                     placeholder="Enter your username" required="required" aria-label="Username" 
                     aria-describedby="basic-addon1" name="username" autocomplete="off">
            </div>
            <div class="input-group mb-3">
                 <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                     <input type="Password" class="form-control" 
                     placeholder="Enter your password" required="required" aria-label="password" autocomplete="off" 
                     name="password"
                     aria-describedby="basic-addon1">
            </div>
        
            </div>
            <!-- sign up button -->
            <div class="form-group">
                <input type="submit" name="login" class="btn registration_btn" value="Sign In">
            </div>
</form>
            <!-- card footer -->
            <div class="card-footer text-center text-light signin ">
                Don't have an account? <a href="index.php">Sign Up</a>
            </div>

      </div>
  </div>  
</body>
</html>