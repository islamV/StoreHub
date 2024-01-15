<?php
include("conn.php") ;
if(isset($_POST["add"])){

    $name = $_POST["name"];
    $brand = $_POST["brand"];
    $type = $_POST["type"];
    $description = $_POST["description"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];

    $image = $_FILES['image'];
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = uniqid() . '_' . mt_rand(0, 9999) . '.' . $extension;

   
    move_uploaded_file($image_location,'images/'. $image_name);
    $image_up = "images/".$image_name ;

        $stmt = $conn->prepare("INSERT INTO `products` (name, brand,description, type ,price, quantity, image) VALUES (?, ? ,?, ?, ?, ?, ?)");

       
        if( $stmt->execute([$name,  $brand,$description, $type,$price, $quantity, $image_up])){
            header('location:app.php?page=products&status=true');
        }else{
            header('location:app.php?page=products&status=true');
        }
   

}
