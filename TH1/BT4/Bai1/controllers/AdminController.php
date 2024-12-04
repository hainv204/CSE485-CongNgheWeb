<?php
define('BASE_URL', '/CSE485_CongNgheWeb/TH1/BT4/Bai1');
require_once __DIR__.'/../models/AdminModel.php';
class AdminController{
    public function index(){
        $flowers = AdminModel::getAllFlower();
        include __DIR__.'/../views/Admin/nav.php';
        include __DIR__.'/../views/Admin/header.php';
        include __DIR__.'/../views/Admin/main.php';
        include __DIR__.'/../views/Admin/footer.php';
    }
    //Add flower
    public function addFlower(){
        include __DIR__.'/../views/Admin/add_flower.php';
    }
    public function handleAddFlower(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['addFlowerBtn'])&&$_POST['addFlowerBtn']==='Add'){
                if (isset($_POST['name'], $_POST['description'])){
                    $target_dir = "./assets/images/"; //Folder server, where to save image store
                    $target_file = $target_dir . basename($_FILES["image"]["name"]); // Path to file
                    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); //upload file
                    // Path web display image
                    $image_url = BASE_URL . '/assets/images/' . basename($_FILES["image"]["name"]);
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $result = AdminModel::addFlower($name, $description, $image_url);
                    if($result)
                        header('Location: index.php?controller=Admin&action=index');
                }
            }else header('Location: index.php?controller=Admin&action=index');
        }
    }
    //Edit flower
    public function editFlower(){
        $id = $_GET['id'];//Get id from URL
        $flowers = AdminModel::getFlowerById($id);
        include __DIR__.'/../views/Admin/edit_flower.php';
    }
    public function handleEditFlower(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['editFlowerBtn'])&&$_POST['editFlowerBtn']==='Edit'){
                print_r($_POST);
                if (isset($_POST['name'], $_POST['description'],$_POST['id'])&& !empty($_POST['id'])){
                    $id = $_POST['id'];
                    $name = $_POST['name'];
                    $description = $_POST['description'];
                    $image = null;
                    if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
                        $target_dir = "./assets/images/"; //Folder server, where to save image store
                        $target_file = $target_dir . basename($_FILES["image"]["name"]); // Path to file
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); //upload file
                        // Path web display image
                        $image = BASE_URL . '/assets/images/' . basename($_FILES["image"]["name"]);
                    }else{
                        $flowers = AdminModel::getFlowerByID($id);
                        $image = $flowers['image'];
                    }
                    $result = AdminModel::editFlower($id, $name, $description, $image);
                    if($result)
                        header('Location: index.php?controller=Admin&action=index');
                }
            }else header('Location: index.php?controller=Admin&action=index');
        }   
    }
    //Delete flower
    public function deleteFlower(){
        include __DIR__.'/../views/Admin/delete_flower.php';
    }
    public function handleDeleteFlower(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['delFlowerBtn'])&&$_POST['delFlowerBtn']==='Delete'){
                    $id = $_POST['id'];
                    $result = AdminModel::delFlower($id);
                    if ($result)
                        header("Location: index.php?controller=Admin&action=index");
                }
            else header("Location: index.php?controller=Admin&action=index");
        }
    }
}
?>