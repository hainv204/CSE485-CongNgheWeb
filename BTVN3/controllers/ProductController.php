<?php
define('BASE_URL', '/CSE485_CongNgheWeb/BTVN3');
require_once __DIR__ . '/../models/ProductModel.php';
class ProductController
{
    #Requied index product
    public function index()
    {
        $products = ProductModel::getAllProduct();
        require __DIR__ .'/../views/products/nav.php';
        require __DIR__ .'/../views/products/header.php';
        require __DIR__ .'/../views/products/main.php';
        require __DIR__ .'/../views/products/footer.php';
    }
    public function addProduct()
    {
        require __DIR__ .'/../views/products/add_product.php';
    }
    public function editProduct($id)
    {
        $products = ProductModel::getProductById($id);
        require __DIR__ .'/../views/products/edit_product.php';
    }
    public function deleteProduct()
    {
        require __DIR__ .'/../views/products/delete_product.php';
    }
    //Handle add product
    public function handleAddProduct(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['addProductBtn'])&&$_POST['addProductBtn']==="Add"){
                if (isset($_POST['name'], $_POST['price'])) {
                    $target_dir = "../assets/images/"; //Folder server, where to save image store
                    $target_file = $target_dir . basename($_FILES["image"]["name"]); // Path to file
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); //upload file
                    // Path web display image
                    $image_url = BASE_URL . '/assets/images/' . basename($_FILES["image"]["name"]);
                    $name = $_POST['name'];
                    $price = $_POST['price'];
                    $result=ProductModel::addProduct($name,$price,$image_url);
                    if ($result)
                        header("Location: index.php?controller=Product&action=index");
                }
            }else{
                header("Location: index.php?controller=Product&action=index");
            }
        }
    }
    //Handle edit product
    public function handleEditProduct($id){
        if (isset($_POST['editProductBtn'])&&$_POST['editProductBtn']==='Save') {
            if (isset($_POST['name'], $_POST['price'], $_POST['id']) && !empty($_POST['id'])) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $id = $_POST['id'];
                $image_url = null;
                //Check upload new image
                if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                    $target_dir = __DIR__."/../assets/images/";
                    $target_file = $target_dir . basename($_FILES["image"]["name"]);
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                    $image_url = BASE_URL . '/assets/images/' . basename($_FILES["image"]["name"]);
                }else {
                    //Get the current image URL from the database
                    $products = ProductModel::getProductById($id);
                    $image_url = $products['image'];
                }
                    $result=ProductModel::updateProduct($id,$name,$price,$image_url);
                    if ($result)
                    header("Location: index.php?controller=Product&action=index");
            }
        }else{
            header("Location: index.php?controller=Product&action=index");
        }
    }
    //Handle delete product
    public function handleDeleteProduct($id){
        if (isset($_POST['delProductBtn'])&&$_POST['delProductBtn']==='Yes') {
        $result=ProductModel::deleteProduct($id);
        if ($result)
            header("Location: index.php?controller=Product&action=index");
        }else{
            header("Location: index.php?controller=Product&action=index");
        }
    }
}
?>