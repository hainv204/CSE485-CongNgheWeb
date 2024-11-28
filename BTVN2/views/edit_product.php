<link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
<!-- Edit product -->
<form class="form-group" id="editProductForm" action="./edit_product.php" method="post">
    <div class="modal-body">
        <div>
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name"
                value="<?= isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ?>" maxlength="50" required>
        </div>
        <div>
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price"
                value="<?= isset($_GET['price']) ? htmlspecialchars($_GET['price']) : '' ?>" min="1000" required>
        </div>
        <!-- Index hidden -->
        <input type="hidden" name="index" value="<?= isset($_GET['index']) ? htmlspecialchars($_GET['index']) : '' ?>">
    </div>
    <div>
        <button type="submit" class="btn btn-default" name="editProductBtn" value="Cancel">Cancel</button>
        <button type="submit" class="btn btn-success" name="editProductBtn" value="Save">Save</button>
    </div>
</form>
<?php
    include './../models/products.php';
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION['products'])){
        $products = $_SESSION['products'];
    }
    if(isset($_POST['editProductBtn'])=="Save"){
        if (isset($_POST['name'], $_POST['price']) && !empty($_POST['name']) && !empty($_POST['price'])) {
            $products[$_POST['index']] = ['name' => $_POST['name'], 'price' => $_POST['price']];
            $_SESSION['products'] = $products;
            // echo 'Yes';
            header('location: ./../controllers/index.php');
        }
    }
    // print_r($_SESSION['products']);
?>