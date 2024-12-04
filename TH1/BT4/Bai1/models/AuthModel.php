<?php
require_once __DIR__.'/../configs/database.php';
class AuthModel{
    public static function login($username, $password){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('select *from login_tb where username = :username and password = :password');
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return  count($result) > 0; 
    }
}
?>