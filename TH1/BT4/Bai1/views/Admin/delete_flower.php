<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Flower</title>
    <!-- Link Bootstrap 5 -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <form action="index.php?controller=Admin&action=handleDeleteFlower&id=<?=htmlspecialchars($_GET['id'])?>"
        method="post">
        <div class="header">
            <h4 class="title">You sure delete?</h4>
        </div>
        <div class="body">
            <!-- Index hidden -->
            <input type="hidden" name="id" value="<?=htmlspecialchars($_GET['id'])?>">
        </div>
        <div class="footer my-2">
            <button type="submit" class="btn btn-default" name="delFlowerBtn" value="Cancel">Cancel</button>
            <button type="submit" class="btn btn-success" name="delFlowerBtn" value="Delete">Delete</button>
        </div>
    </form>
</body>

</html>