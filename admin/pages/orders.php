<?php
require_once("conn.php");
include("fetch.php") ;
if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM `payments` WHERE `order_id` = :order_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_id', $ID);
        $stmt->execute();
        $sql = "DELETE FROM `orders` WHERE `order_id` = :order_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':order_id', $ID);
        $stmt->execute();
    } 
}
?>

<div class="main--container">
    <div class="section--title">
        <h3 class="title">All Orders</h3>
        <select name="date" id="date">
            <option value="last7">Last 7 days</option>
            <option value="lastmonth">Last month</option>
            <option value="lastyear">Last year</option>
            <option value="alltime">All time</option>
        </select>
    </div>


    <div class="table">
            
       
        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#ID</th>
                   <th>Order ID</th>
                   <th>Customer ID</th>
                   <th>Quantity</th>
                   <th>Total Amount</th>
                   <th>Order Date</th>
                   <th>Status</th>
                   <th>Action</th>

                </tr>
            </thead>
            <tbody>
         
            <?php
           $id = 1 ;
			while ($row = $stmt->fetch()) {
                
				echo "<tr>"; 
				echo "<td>" ."#". $id. "</td>";
			      
                // echo "<td><img src='" .$row['image']."' alt='' style='width: 25px; height: 25px; border: 1px solid #000;'></td>";
				echo "<td>" . $row['order_id'] . "</td>";
				echo "<td>" . $row['customer_id'] . "</td>";
				echo "<td>" . $row['quantity'] . "</td>";
				echo "<td>" . $row['total_price'] . "</td>";
				echo "<td>" . $row['order_date'] . "</td>";
				echo "<td>" . $row['status'] . "</td>";
                echo "<td>" ;
                echo "<form method='POST'>";
                echo "<input type='hidden' name='ID' value='" . $row['order_id'] . "'>";
                echo "<button type='submit' class='btn btn-danger'  name='delete'>Delete</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
                $id ++ ;
            }

            ?>
        
            </tbody>
            <tfoot>
                <tr>  

              
                <th>#ID</th>
                   <th>Order ID</th>
                   <th>Customer ID</th>
                   <th>Quantity</th>
                   <th>Total Price</th>
                   <th>Order Date</th>
                   <th>Status</th>
                   <th>Action</th>

                   
                </tr>
            </tfoot>
        </table>

    </div>