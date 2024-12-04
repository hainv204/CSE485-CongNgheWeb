<?php
require_once __DIR__.'/../models/AuthModel.php';
class AuthController{
    //Login->view
    public function index(){
        include __DIR__.'/../views/Authentication/login.php';
    }
    //Login->handleModel
    public function handleSignIn(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_POST['signIn'])&&$_POST['signIn']==='login'){
                if (isset($_POST['username'], $_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $result = AuthModel::login($username,$password);
                    if ($result)
                        header("Location: index.php?controller=Admin&action=index");
                    else echo "Invalid username or password";
                }
            }
        }
    }
}
?>