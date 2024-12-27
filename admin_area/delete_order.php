<?php
if(isset($_GET['delete_order'])){
    $delete_order=$_GET['delete_order'];

    $delete_query="delete from `user_orders` where order_id=$delete_order";
    $result=mysqli_query($con,$delete_query);
    if($result){
        echo "<script> alert('order deleted succcessfully')</script>";
        echo "<script> window.open('./index.php?list_orders','_self')</script>";
    }
}
?>