<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images</title>
    <link rel="stylesheet" href="./../assets/css/bootstrap.min.css">
</head>

<body>
    <?php include  './../nav.php'?>
    <form action="./upload.php" method="post" enctype="multipart/form-data">
        Chọn ảnh để tải lên:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Tải lên Ảnh" name="submit">
    </form>
</body>

</html>