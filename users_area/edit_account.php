<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['user_username'];
    $select_query="select * from `user_table` where user_name='$user_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $user_id=$row_fetch['user_id'];
    $user_name=$row_fetch['user_name'];
    $user_email=$row_fetch['user_email'];
    $user_address=$row_fetch['user_address'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){
        $update_id=$user_id;
        $user_name=$_POST['user_username'];
        $user_email=$_POST['user_email'];
        $user_address=$_POST['user_address'];
        $user_mobile=$_POST['user_mobile'];
        $user_image1=$_FILES['user_images']['name'];
        $user_image_tmp=$_FILES['user_images']['tmp_name'];
        move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    
        //update query
        $update_data="Update `user_table` set user_name='$user_name',user_email='$user_email',user_image='$user_image1',user_address='$user_address','user_mpbile='$user_mobile' where user_id=$update_id";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script> alert('Data updated successfully'</script>";
            echo "<script> window.open('logout.php','_self'</script>";

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit_account</title>
    <style>
    .edit_img{
        width:100px;
        height: 100px;
        object-fit:contain;

    }
    </style>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="mulitpart/form-data">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_name?>" name="user_username">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_email?>" name="user_email">
        </div>

        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_images">
            <img src="./user_images/<?php echo $user_image?>" alt="" class="edit_img">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_address?>" name="user_address">
        </div>

        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $user_mobile?>" name="user_mobile">
        </div>

        <input type="submit" value="Update"class="bg-info py-2 px-3"  name="user_update">


    </form>
</body>
</html>