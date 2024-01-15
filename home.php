<?php 
session_start();
include("./admin/conn.php");

$shirts = "SELECT * FROM `products` WHERE `type` = 'shirts'";
$shoes= "SELECT * FROM `products` WHERE `type` = 'shoes'";
$shorts = "SELECT * FROM `products` WHERE `type` = 'shorts'";
$accessories = "SELECT * FROM `products` WHERE `type` = 'accessories'";
//shirts fetching
$stmts = $conn->query($shirts);
$shirts = $stmts->fetchAll(PDO::FETCH_ASSOC);
//shirts fetching

$stmtso = $conn->query($shorts);
$shorts= $stmtso->fetchAll(PDO::FETCH_ASSOC);
 
//Shoes
$stmtsh = $conn->query($shoes);
$shoes= $stmtsh->fetchAll(PDO::FETCH_ASSOC);

//Accessories
$stmtA = $conn->query($accessories);
$accessories= $stmtA->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $sql1 = "SELECT * FROM `customers` WHERE `email` = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$email]);
    $user = $stmt1->fetch(PDO::FETCH_ASSOC);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Sport Hub </title>
</head>

<body>
  <?php include("includes/header.php"); ?>
    <section class="content">
        <h1>اكتشف العديد من منتجات كرة القدم المختلفة </h1>
        <p>
            اشتر قميص فريقك المفضل بنسخة اللاعبين
        </p>
        <button>Shop Now</button>
    </section>
    <h1 class="pheading ">منتجات جديدة متوفرة حصريا الان عبر موقعنا </h1>
  <h2>Shirts</h2>  
<section class="sec">
    <div class="products">
        <?php foreach($shirts as $product) {?>
         <!--card start-->
         <div class="card">
            <div class="img"><img src="./admin/<?php echo $product['image']?>" alt=""></div>
            <div class="desc"> 
            <?php echo $product['name']?>
            </div>
            <div class="desc"> 
                <?php echo strtoupper($product['description'])?>
            </div>
            <div class="title"><?php echo $product['brand']?></div>
            <div class="box">
                <div class="price"> <?php echo $product['price']?> EGP</div>
                <a href="checkout.php?id=<?php echo $product['product_id']?>"><button class="btn">Buy Now</button></a>
                
            </div>
        </div>
  <?php }?>
 
</div>

</section>
<h2> Shorts</h2>  
<section class="sec">
    <div class="products">
        <?php foreach($shorts as $product) {?>
         <!--card start-->
         <div class="card">
            <div class="img"><img src="./admin/<?php echo $product['image']?>" alt=""></div>
            <div class="desc"> 
            <?php echo $product['name']?>
            </div>
            <div class="desc"> 
                <?php echo strtoupper($product['description'])?>
            </div>
            <div class="title"><?php echo $product['brand']?></div>
            <div class="box">
                <div class="price"> <?php echo $product['price']?> EGP</div>
                <a href="checkout.php?id=<?php echo $product['product_id']?>"><button class="btn">Buy Now</button></a>

            </div>
        </div>
  <?php }?>
 
</div>

</section>
<h2> Shoes</h2>  
<section class="sec">
    <div class="products">
        <?php foreach($shoes as $product) {?>
         <!--card start-->
         <div class="card">
            <div class="img"><img src="./admin/<?php echo $product['image']?>" alt=""></div>
            <div class="desc"> 
            <?php echo $product['name']?>
            </div>
            <div class="desc"> 
                <?php echo strtoupper($product['description'])?>
            </div>
            <div class="title"><?php echo $product['brand']?></div>
            <div class="box">
                <div class="price"> <?php echo $product['price']?> EGP</div>
                <a href="checkout.php?id=<?php echo $product['product_id']?>"><button class="btn">Buy Now</button></a>

            </div>
        </div>
  <?php }?>
 
</div>

</section>
<h2> Accessories</h2>  
<section class="sec">
    <div class="products">
        <?php foreach($accessories as $product) {?>
         <!--card start-->
         <div class="card">
            <div class="img"><img src="./admin/<?php echo $product['image']?>" alt=""></div>
            <div class="desc"> 
            <?php echo $product['name']?>
            </div>
            <div class="desc"> 
                <?php echo strtoupper($product['description'])?>
            </div>
            <div class="title"><?php echo $product['brand']?></div>
            <div class="box">
                <div class="price"> <?php echo $product['price']?> EGP</div>
                <a href="checkout.php?id=<?php echo $product['product_id']?>"><button class="btn">Buy Now</button></a>

            </div>
        </div>
  <?php }?>
 
</div>

</section>
<script>

    $(".menu-btn").click(function(){
$(".navbar .menu").toggleClass("active");
$(".menu-btn i").toggleClass("active");

    });
</script>
<?php include("includes/footer.html"); ?>

</body>

</html>