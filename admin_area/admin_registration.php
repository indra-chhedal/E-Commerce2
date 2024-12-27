<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            overflow-x: hidden;
        }
        img{
            height: 400px;
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">
            Admin Registration
        </h2>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <img src="../images/adminreg.jpeg" alt="Admin Registration" class="img-fluid">
            </div>
            <div class="col-lg-6 col-xl-4">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" id="username" name="username" placeholder="Enter your user name" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter your user name" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your user name" class="form-control" required>
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confpassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confpassword" name="confpassword" placeholder="Enter your user name" class="form-control" required>
                    </div>
                    <div>
                        <input type="submit"class="bg-info py-2 px-3 border-0" name="admin_registration" value="Register">
                        <p class="small fw-bold mt-2 pt-1">Do you have an account? <a href="admin_login.php" class="link-danger">Login</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['admin_registration'])){
    $admin_username=$_POST['username'];
    $admin_email=$_POST['email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $conf_admin_password=$_POST['confpassword'];
    


    //select query for validation form
    $select_query="select * from `admin_table` where admin_name='$admin_username' or admin_email='$admin_email'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script> alert('admin already exists.')</script>";
    }
    else if($admin_password!=$conf_admin_password){
        echo "<script> alert('Passwords do not match.')</script>";
    }
    
    
    else{
        //insert query
    $insert_query="insert into `admin_table`(admin_name,admin_email,admin_password)values('$admin_username','$admin_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
    if($sql_execute>0){
        // $_SESSION['username']=$admin_username;
        echo "<script> alert('Register Successful')</script>";
        echo "<script> window.open('admin_login.php','_self')</script>";
    }else{
        echo "<script> alert('Register Failed')</script>";
        echo "<script> window.open('admin_registration.php','_self')</script>";
    }
}
}
?>