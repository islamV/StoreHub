<?php
require_once("conn.php");
include("fetch.php") ;

?>

<div class="main--container">
    <div class="section--title">
        <h3 class="title">All Customers</h3>
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
                    <!-- <th>Photo</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                 
           
                </tr>
            </thead>
            <tbody>
     
            <?php
            $id = 1 ;
			while ($row = $stmt->fetch()) {
                
				echo "<tr>";
				echo "<td>" . "#". $id . "</td>";
                // echo "<td><img src='" .$row['image']."' alt='' style='width: 25px; height: 25px; border: 1px solid #000;'></td>";
				echo "<td>" . $row['name'] ."</td>";
				echo "<td>" . $row['email'] . "</td>";
				echo "<td>" . $row['phone_number'] . "</td>";
				echo "<td>" . $row['address'] . "</td>";
                echo "</tr>";
                $id ++ ;
            }

            ?>
        
            </tbody>
            <tfoot>
                <tr>   <th>#ID</th>
                    <!-- <th>Photo</th> -->
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                 
                </tr>
            </tfoot>
        </table>

    </div>