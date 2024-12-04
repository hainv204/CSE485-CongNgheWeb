<?php
require_once __DIR__.'/../configs/database.php';
class AdminModel{
    //Create
    public static function addFlower($name,$description,$image){
        //Connect PDO
        $database = new Database();
        $conn = $database->getConnection();
        //Prepare statement
        $stmt = $conn->prepare('insert into flower_tb(name,description,image) values(:name,:description,:image)');
        //Bind parameters to values
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':image',$image);
        //Execute statement
        if($stmt->execute())
            return true;
        return false;
    }
    //Read
    public static function getAllFlower(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->query('select *from flower_tb');
        //Get all results
        $flowers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $flowers;
    }
    //Update
    public static function editFlower($id,$name,$description,$image){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('update flower_tb set name= :name,description= :description,image= :image where id= :id');
        $stmt->bindParam(':name',$name);
        $stmt->bindParam(':description',$description);
        $stmt->bindParam(':image',$image);
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        if($stmt->execute())
            return true;
        return false;
    }
    //Delete
    public static function delFlower($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('delete from flower_tb where id= :id');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        if($stmt->execute())
            return true;
        return false;
    }
    //Get flower by id
    public static function getFlowerByID($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('select name,description,image from flower_tb where id= :id');
        $stmt->bindParam(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return [
            'id'=>$id,
            'name'=>$result['name'],
            'description'=>$result['description'],
            'image'=>$result['image']
        ];
    }
}
?>