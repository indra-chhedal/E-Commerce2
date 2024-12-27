<!-- connect file -->
<?php
include('../includes/connect.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>checkout page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/logo.png" alt="Logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    </ul>
                <form class="d-flex" action="search_product.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                 <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
            </div>
        </nav>
     </div>

     <!-- second child -->
     <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
        
            <?php
            if(!isset($_SESSION['user_username'])){
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome Guest</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='#' class='nav-link'>Welcome ".$_SESSION['user_username']."</a>
                </li>";

            }
            
            if(!isset($_SESSION['user_username'])){
                echo "<li class='nav-item'>
                <a href='./user_area/user_login.php'class='nav-link'>Login</a>
            </li>";
            }else{
                echo "<li class='nav-item'>
                <a href='./user_area/logout.php' class='nav-link'>Logout</a>
                </li>";

            }

        ?>
            
        </ul>

</nav>

<!-- third child -->
 <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">community is at heart of ecommerce and community</p>
 </div>

 <!-- fourth child -->
  <div class="row px-1">
    <div class="col-md-12">
        <!-- products -->
         <div class="row">
            <?php
            if(!isset($_SESSION['user_username'])){
                include('user_login.php');

            }else{
                include('payment.php');
            }
            ?>
           
    </div>
    </div>
    </div>
      <!-- include footer -->
       <?php
       include('../includes/footer.php');
       ?>
      
    
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>