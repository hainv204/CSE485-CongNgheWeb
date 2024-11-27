<!-- Delete Product -->
<link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
<form action="./delete_product.php" method="post">
    <p>Bạn chắn chắn xoá?</p>
    <input type="hidden" name="index" value="<?php echo $_GET['index'] ?>">
    <button type="submit" class="btn btn-default" name="del">No</button>
    <button type="submit" class="btn btn-danger" name="del" value="Yes">Yes</button>
</form>
<?php 
    include './../models/products.php';
    if(!isset($_SESSION))
        session_start();
    if(isset($_SESSION['products'])){
        $products = $_SESSION['products'];
    }
    // print_r($_POST);
    if(isset($_POST['del'])=="Yes"){
        $index = $_POST['index'];
        // echo $index;
        unset($products[$index]);
        $_SESSION['products'] = $products;
        header('location: ./../controllers/index.php');
    }
?>