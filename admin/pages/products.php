<?php
require_once("conn.php");
include("fetch.php");
if (isset($_POST['ID'])) {
    $ID = $_POST['ID'];
    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM `products` WHERE `product_id` = :product_id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':product_id', $ID);
        $stmt->execute();
    } else if (isset($_POST['update'])) {
        header('Location:app.php?page=update&ID=' . $ID);
        exit;
    }
}

?>
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Add new Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" placeholder="Product Name" name="name" require>
                    </div>
                    <div class="form-group">
                        <label for="">Brand</label>
                        <input type="text" class="form-control" placeholder="Product Name" name="brand" require>
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea type="text" class="form-control" placeholder="Product Description" name="description" require></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                          
                        <select name="type" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="shirts">Shirts</option>
                            <option value="shorts">Shorts</option>
                            <option value="shoes">Shoes</option>
                            <option value="accessories">Accessories</option>
                        
                        </select>
                    </div>
                    <div class="input-group">

                        <input type="number" class="form-control" placeholder="Product Price" name="price" aria-label="Dollar amount (with dot and two decimal places)">
                        <span class="input-group-text">$</span>
                        <span class="input-group-text">0.00</span>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Product Quantity" name="quantity" require>
                    </div>

                    <div class="input-group mb-3">

                        <input type="file" class="form-control" id="inputGroupFile02" name="image">
                        <label class="input-group-text" for="inputGroupFile02">Photo</label>
                    </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-primary">create</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="main--container">
    <div class="section--title">
        <h3 class="title">All Products</h3>
        <select name="date" id="date">
            <option value="last7">Last 7 days</option>
            <option value="lastmonth">Last month</option>
            <option value="lastyear">Last year</option>
            <option value="alltime">All time</option>
        </select>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
        create
    </button>
    <?php
    if ($_GET['status'] === "true") {
    ?>
        <div id="success"></div>
    <?php unset($_GET['status']);
    } else if ($_GET['status'] === "false") { ?>
        <div id="failed"></div>
    <?php unset($_GET['status']);
    }
    ?>
    <div class="table">


        <table id="table" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#ID</th>
                    <!-- <th>Photo</th> -->
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>

                <?php
                $id = 1;
                while ($row = $stmt->fetch()) {

                    echo "<tr>";
                    echo "<td>" . "#" . $id . "</td>";
                    // echo "<td><img src='" .$row['image']."' alt='' style='width: 25px; height: 25px; border: 1px solid #000;'></td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['brand'] . "</td>";
                    echo "<td>" . $row['type'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='ID' value='" . $row['product_id'] . "'>";
                    echo "<button type='submit' class='btn btn-primary' ' name='update'>Update</button>";
                    echo "</form>";
                    echo "<td>";
                    echo "<form method='POST'>";
                    echo "<input type='hidden' name='ID' value='" . $row['product_id'] . "'>";
                    echo "<button type='submit' class='btn btn-danger'  name='delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</td>";
                    echo "</tr>";
                    $id++;
                }

                ?>

            </tbody>
            <tfoot>
                <tr>
                    <th>#ID</th>
                    <!-- <th>Photo</th> -->
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </tfoot>
        </table>

    </div>