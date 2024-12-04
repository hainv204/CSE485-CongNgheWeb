<?php
require_once __DIR__.'/../models/AdminModel.php';
class UserController{
    public function index(){
        $flowers = AdminModel::getAllFlower();
        include __DIR__.'/../views/Admin/nav.php';
        include __DIR__.'/../views/Users/header.php';
        include __DIR__.'/../views/Users/main.php';
        include __DIR__.'/../views/Users/footer.php';
    }
}
?>