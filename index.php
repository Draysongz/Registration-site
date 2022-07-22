<?php
include("partials/connect.php");
if(isset($_POST['register'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $confirm_password=$_POST['confirm_password'];
    $password_hash= password_hash($password, PASSWORD_DEFAULT);
    
    $select_data= "Select * from `user_data` where username='$username'";
    $result= mysqli_query($con,$select_data);
    $num_rows= mysqli_num_rows($result);
    if($num_rows>0){
        echo "<script>alert('Username already exists')</script>";
    }
    else if($password!=$confirm_password){
        echo "<script>alert('Passwords do not match')</script>";
    }else{
        $insert_query ="insert into `user_data` (username, password) values('$username',
         '$password_hash')";
         $result = mysqli_query($con, $insert_query);
         if($result){
            echo "<script>alert('You have registered successfully')</script>";
            echo "<script>window.open('signin.php','_self')</script>";
         }
    }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration form</title>
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
      
      <div class="card">
           <!-- card header -->
           <div class="card-header text-center">
               <h3> Sign Up</h3>
           </div>
            <!-- card body -->
             
                 <div class="card-body text-center">
                     <form action="" method="post">
                      <div class="input-group mb-3">
                           <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-user"></i></span>
                           <input type="text" class="form-control" 
                           placeholder="Enter your username" required="required" name="username" aria-label="Username" 
                           aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-key"></i></span>
                            <input type="Password" class="form-control" 
                            placeholder="Enter your password" required="required" aria-label="password" autocomplet="off" 
                            name="password"aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            <input type="Password" class="form-control" 
                            placeholder="Confirm password" required="required" aria-label="password" autocomplete="off" 
                            name="confirm_password"
                            aria-describedby="basic-addon1">
                        </div>
                     </div>
                     <!-- sign up button -->
                     <div class="form-group">
                         <input type="submit"  name="register" class="btn registration_btn" value="Sign Up">
                        </div>
                    </form>
            <!-- card footer -->
            <div class="card-footer text-center text-light signup">
                Already have an account? <a href="signin.php">Sign In</a>
            </div>

      </div>
  </div>  
</body>
</html>