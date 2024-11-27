<!-- Add product -->
<div class="modal fade" id="addnewProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-group" id="addProductForm" action="./../controllers/index.php" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add new product</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" maxlength=50 required>
                    </div>
                    <div>
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" id="price" min=1000 required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success" name="addProductBtn">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    include './../models/products.php';
    session_start();
    if(isset($_SESSION['products'])){
        $products = $_SESSION['products'];
        // echo 'Yes';
    }
    if(isset($_POST['addProductBtn'])){
        if (isset($_POST['name'], $_POST['price']) && !empty($_POST['name']) && !empty($_POST['price'])) {
            $products[] = ['name' => $_POST['name'], 'price' => $_POST['price']];
            $_SESSION['products'] = $products;
        }
    }
    // print_r($_SESSION['products']);
    // echo $_POST['addProductBtn'];
    // print_r($_POST)
?>