<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
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
            Admin Login
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
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter your user name" class="form-control" required>
                    </div>
                    
                    <div>
                        <input type="submit"class="bg-info py-2 px-3 border-0" name="admin_login" value="Login">
                        <p class="small fw-bold mt-2 pt-1">Don't you have an account? <a href="admin_registration.php" class="link-danger">SignUp</a></p>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['admin_login'])){
    $admin_username=$_POST['username'];
    $admin_password=$_POST['password'];

    $selece_query="select * from `admin_table` where admin_name='$admin_username'";
    $result=mysqli_query($con, $selece_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);


    

    if($row_count>0){
        $_SESSION['username']=$admin_username;
        if(password_verify($admin_password,$row_data['admin_password'])){
                echo "<script> alert('Login successful.')</script>";
                echo "<script> window.open('./index.php','_self')</script>";
            
        }else{
            echo "<script> alert('invalid credentials.')</script>"; 
        }

    }else{
        echo "<script> alert('invalid credentials.')</script>";
    }

}
?>