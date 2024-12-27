<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title=$_POST['product_title'];
    $description=$_POST['description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brands=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_status='true';

    //accessing images
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];

    //accessing img temp name
    $temp_image1=$_FILES['product_image1']['tmp_name'];
    $temp_image2=$_FILES['product_image2']['tmp_name'];
    $temp_image3=$_FILES['product_image3']['tmp_name'];

    //checking empty condition
    if($product_title=='' or $description==''or $product_keyword=='' or $product_category=='' or  $product_brands=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
        echo "<script> alert('please fill all the available fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");

        //insert query
        $insert_products="insert into `products`(product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values('$product_title','$description','$product_keyword','$product_category','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";

        $result_query=mysqli_query($con,$insert_products);
        if($result_query){
            echo "<script> alert('successfully inserted')</script>";
        }
        else{
            echo "<script> alert('Insertion faild.')</script>";
        }

    }


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert_product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css" integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../static/style.css">

</head>
<body class="bg-light">
   <div class="container mt-3">
    <h1 class="text-center">Insert Products</h1>

    <!-- form -->
     <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_tile" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="enter product_title" autocomplete="off"required>

        </div>

        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Product Description</label>
            <input type="text" name="description" id="description" class="form-control" placeholder="enter product_description" autocomplete="off"required>

        </div>

        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" class="form-control" placeholder="enter product_keyword" autocomplete="off"required>

        </div>


        <!-- category -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_category" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php
                $select_query="select * from `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $category_title=$row['category_title'];
                    $category_id=$row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
                
            </select>
        </div>

        <!-- brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select">
                <option value="">Select a Brands</option>
                <?php
                $select_query="select * from `brands`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                    $brand_title=$row['brand_title'];
                    $brand_id=$row['brand_id'];
                    echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
                <!-- <option value="">Select a Category</option>
                <option value="">Select a Category</option>
                <option value="">Select a Category</option>
                <option value="">Select a Category</option> -->
            </select>
        </div>

        <!-- image-1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image 1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control"required>

        </div>

        <!-- image-2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image 2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control"required>

        </div>

        <!-- image-3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image" class="form-label">Product Image 2</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control"required>

        </div>

        <!-- price -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" placeholder="enter product_price" autocomplete="off"required>

        </div>

        <!-- button -->
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
        </div>

     </form>
   </div>
</body>
</html>