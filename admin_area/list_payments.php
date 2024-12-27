<h3 class="text-center text-success">All Payments</h3>
<table class="table table-bordered mt-5 text-center">
    <thead class="bg-info">
        <?php
        $get_payments="select * from `user_payments`";
        $result=mysqli_query($con,$get_payments);
        $row_count=mysqli_num_rows($result);

    if($row_count==0){
        echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";

    }else{
        ?>
        <tr>
        <th>Sl no</th>
        <th>Invoice Number</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody class='bg-secondary'>
        <?php
        $number=0;
        while($row_data=mysqli_fetch_assoc($result)){
            $payment_id=$row_data['payment_id'];
            $order_id=$row_data['order_id'];
            $invoice_number=$row_data['invoice_number'];
            $amount=$row_data['amount'];
            $date=$row_data['date'];
            $payment_mode=$row_data['payment_mode'];
            $number++;
            ?>

            <tr class="text-center">
            <td><?php echo $number;?></td>
            <td><?php echo $invoice_number;?></td>
            <td><?php echo $amount;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $payment_mode;?></td>
            <td><a href="./index.php?delete_payment=<?php echo $payment_id;?>" class="text-light"><i class='fa-solid fa-trash'></i></a></td>
        </tr>
        <?php
        }
        ?> 
    </tbody>
    <?php
    }
    ?>
</table>