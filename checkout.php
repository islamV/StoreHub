<?php
include("./admin/conn.php");
session_start();
if (!isset($_SESSION['email'])) {
    header("location:./auth.php");
} else {
    $email = $_SESSION["email"];
    $id = $_GET['id'];
    $user  = "SELECT * FROM `customers` WHERE `email` = :email";
    $qu = $conn->prepare($user);
    $qu->bindParam(':email', $email, PDO::PARAM_STR);
    $qu->execute();
    $user = $qu->fetch(PDO::FETCH_ASSOC);
    $product  = "SELECT * FROM `products` WHERE `product_id` = :id";
    $qp = $conn->prepare($product);
    $qp->bindParam(':id', $id, PDO::PARAM_INT);
    $qp->execute();
    $product = $qp->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST["order"])){
  $product  = "SELECT * FROM `products` WHERE `product_id` = :id";
  $qp = $conn->prepare($product);
  $qp->bindParam(':id', $id, PDO::PARAM_INT);
  $qp->execute();
  $product = $qp->fetch(PDO::FETCH_ASSOC);
    $customer_id = $user['customer_id'];
    $quantity = $_POST["quantity"];
    $price = (int)$product['price'] * $quantity;
  
    $stmt = $conn->prepare("INSERT INTO `orders` (customer_id, total_price , quantity) VALUES (?, ?, ?)");
    $stmt->execute([$customer_id, $price, $quantity]);
    $order_id = $conn->lastInsertId();

    $cardN = $_POST['card_number'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $cvv = $_POST['cvv'];

    $stmt = $conn->prepare("INSERT INTO `payments` (order_id, card_number, day, month, cvv) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$order_id, $cardN, $day, $month, $cvv]);

    header("location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checkout</title>
  <link rel="stylesheet" href="/assets/css/home.css">
  <link rel="stylesheet" href="/assets/css/checkout.css">
</head>

<body>

  <h1>Checkout Page</h1>
  <p class="credit">By Team elmtarshmeen $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$</p>
  <div class="tab_container">
    <input id="tab1" type="radio" name="tabs" checked>
    <label for="tab1"><span class="numberCircle">1</span><span>Cart</span></label>


    <input id="tab4" type="radio" name="tabs">
    <label for="tab4"><span class="numberCircle">4</span><span>Payment</span></label>


    <section id="content1" class="tab-content">

        <div class="products">
            <div class="card">
              <div class="img"><img src="./admin/<?php echo $product['image'] ?>" alt=""></div>
              <div class="desc">
                <?php echo $product['name'] ?>
              </div>
              <div class="desc">
                <?php echo strtoupper($product['description']) ?>
              </div>
              <div class="title"><?php echo $product['brand'] ?></div>
              <div class="box">
                <div class="price"> <?php echo $product['price'] ?> EGP</div>
                <div class="q"> <?php echo $product['quantity'] ?>  <h2>in stock </h2></div>
                  
              </div>
            </div>

        </div>

    </section>




    <section id="content4" class="tab-content">

      <form action="checkout.php?id=<?php echo $product['product_id']?>" method="post">
        <label for="">Amount you need </label>
   
    <select name="quantity" class="input cc-ddl">

        <?php
for ($i = 1; $i <= $product['quantity']; $i++) { ?>
        <option value="<?php echo $i ?>"><?php echo $i ?></option>
        <?php } ?>
    </select>

        <div class="pymt-radio">

          <div class="row-payment-method payment-row-last">
            <div class="select-icon hr">
              <input type="radio" id="radio2" name="radios" value="pp" checked>
              <label for="radio2"></label>
            </div>
            <div class="select-txt hr">
              <p class="pymt-type-name">Credit Card</p>
              <p class="pymt-type-desc">Safe money transfer using your bank account. Safe payment online. Credit card needed. Visa, Maestro, Discover, American Express</p>
            </div>
            <div class="select-logo">
              <div class="select-logo-sub logo-spacer">
                <img src="https://www.dropbox.com/s/by52qpmkmcro92l/logo-visa.png?raw=1" alt="Visa" />
              </div>
              <div class="select-logo-sub">
                <img src="https://www.dropbox.com/s/6f5dorw54xomw7p/logo-mastercard.png?raw=1" alt="MasterCard" />
              </div>
            </div>

          </div>
        </div>
        <div class="form-cc">
      

          <div class="row-cc">
            <div class="cc-field">
              <div class="cc-title">Credit Card Number 
              </div>
              <input type="text" class="input cc-txt text-validated"name="card_number" value="4542 9931 9292 2293" placeholder="4542 9931 9292 2293" />
            </div>
          </div>
          <div class="row-cc">
            <div class="cc-field">
              <div class="cc-title">Expiry Date
              </div>
              <select class="input cc-ddl" name="day">
                <option selected>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
              </select>
              <select class="input cc-ddl" name="month">
                <option>01</option>
                <option>02</option>
                <option>03</option>
                <option>04</option>
                <option>05</option>
                <option>06</option>
                <option>07</option>
                <option>08</option>
                <option>09</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option selected>16</option>
                <option>17</option>
                <option>18</option>
                <option>19</option>
                <option>20</option>
                <option>21</option>
                <option>22</option>
                <option>23</option>
                <option>24</option>
                <option>25</option>
                <option>26</option>
                <option>27</option>
                <option>28</option>
                <option>29</option>
                <option>30</option>
                <option>31</option>
              </select>
            </div>
            <div class="cc-field">
              <div class="cc-title">CVV Code<span class="numberCircle">?</span>
              </div>
              <input type="text" name="cvv" class="input cc-txt" />
            </div>
          </div>
    
        </div>
        <div class="button-master-container">
          <div class="button-container"><a href="home.php">Return to Shipping</a>
          </div>
         
         
         <div class="button-master-container">
         <button  class="button-container" type="submit" name="order" >
          Finish Order
          </button>
          </div>
        
        </div>
      </form>
    </section>
  </div>

</body>

</html>