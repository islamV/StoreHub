<?php
    include 'conn.php';

$ID = $_GET['ID'];
$page = $_GET['page'];

$sql = "SELECT * FROM `products` WHERE `product_id` = $ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $brand = $_POST['brand'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    
    $sql = "UPDATE `$table` SET `name` = :name, `brand` = :brand, `description` = :description, `price` = :price, `quantity` = :quantity WHERE `$table`.`product_id` = :ID";
    
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':ID', $ID);
    
    $stmt->execute();
    
    header('location:app.php?page=products&status=true');
    


}
?>
<div class="main--container">
    
<form action="app.php?page=update" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" placeholder="Product Name" name="name" value="<?php echo $row['name']  ?>" require>
                </div>
                <div class="form-group">
                    <label for="">Brand</label>
                    <input type="text" class="form-control" placeholder="Product Name" name="brand" value="<?php echo $row['brand']  ?>" require>
                </div>
                <div class="form-group">
                <label for="">Description</label>
                    <textarea type="text" class="form-control" placeholder="Product Description" name="description"  require ><?php echo $row['description']  ?></textarea>
                </div>
                <div class="input-group">
               
                    <input type="number" class="form-control" placeholder="Product Price" name="price" value="<?php echo $row['price']?>" aria-label="Dollar amount (with dot and two decimal places)">
                    <span class="input-group-text">$</span>
                    <span class="input-group-text">0.00</span>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Product Quantity" name="quantity"  value="<?php echo $row['quantity']  ?>" require>
                </div>

                <div class="input-group mb-3">
               
                    <input type="file" class="form-control" id="inputGroupFile02" name="image"> 
                    <label class="input-group-text" for="inputGroupFile02">Photo</label>
                </div>
          
                <button type="submit" name="submit" class="btn btn-primary">update</button>
</form>
 </div>