<?php
  require 'flowers.php';
  define('BASE_URL', '/CSE485_CongNgheWeb/TH1/Bai1');
  session_start();
  if (isset($_SESSION['flowers']) && !empty($_SESSION['flowers']))
      $flowers = $_SESSION['flowers'];
  //Add new flower
  if(isset($_POST["addFlowerBtn"])&&$_POST["addFlowerBtn"]=="Add"){
      if(isset($_POST["name"]) && isset($_POST["description"])){
      $target_dir = "../assets/images/"; //Thư mục đích trên server, nơi file tải lên sẽ được lưu trữ
      $target_file = $target_dir . basename($_FILES["image"]["name"]); // đường dẫn tới file
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file); //upload file
      // Đường dẫn web để hiển thị ảnh=>path tuyệt đối
      $image_url = BASE_URL . '/assets/images/' . basename($_FILES["image"]["name"]);
      // echo $target_file;
      $flowers[]=[
        'name'=>$_POST['name'],
        'description'=>$_POST['description'],
        'image'=>$image_url//Lưu đường dẫn web
      ];
        $_SESSION["flowers"]=$flowers;
      // print_r($_FILES['image']);//check
      // print_r($_SESSION['flowers']);//check
      }
      // print_r($_SESSION['flowers']);
      header('location: ./../views/layouts/admin.php');
  //Edit flower
  }else if($_POST["editFlowerBtn"]=="Edit"){
    // print_r($_POST);//Check
      echo 'Xin chào';
      $image_url = $_POST['image'];

      // Kiểm tra có upload ảnh mới
      if(isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
          $target_dir = "../assets/images/";
          $target_file = $target_dir . basename($_FILES["image"]["name"]);
          
          if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
              $image_url = BASE_URL . '/assets/images/' . basename($_FILES["image"]["name"]);
          }
      }
      $flowers[$_POST['index']]=
      [
          'name'=>$_POST['name'],
          'description'=>$_POST['description'],
          'image'=>$image_url
      ];
      $_SESSION["flowers"]=$flowers;

      // print_r($_SESSION['flowers']);//Check
      header('location: ./../views/layouts/admin.php');
  //Delete flower
  }else if($_POST["delFlowerBtn"]=="Delete"){
    if(isset($_POST['delFlowerBtn'])=="Delete"){
        $index=$_POST['index'];
        unset($flowers[$index]);
        $_SESSION["flowers"]=$flowers;
        header('location: ./../views/layouts/admin.php');
    }
  }
?>