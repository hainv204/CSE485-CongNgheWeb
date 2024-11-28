<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit flower</title>
</head>
<link rel="stylesheet" href="./../../assets/css/bootstrap.min.css">

<body>
    <form class="form-group" action="./../../models/TaskModel.php" method="post" enctype="multipart/form-data">
        <div class="header">
            <h4 class="title">Edit flower</h4>
        </div>
        <div class="body">
            <div>
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" name="name"
                    value="<?= isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ?>">
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description"
                    rows="4"><?= isset($_GET['description']) ? htmlspecialchars($_GET['description']) : '' ?></textarea>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <img src="<?= isset($_GET['image']) ? htmlspecialchars($_GET['image']) : '' ?>"
                    style="max-width: 200px;">
                <input class="my-2" type="file" name="image">
            </div>
            <!-- Index hidden -->
            <input type="hidden" name="index"
                value="<?= isset($_GET['index']) ? htmlspecialchars($_GET['index']) : '' ?>">
        </div>
        <div class="footer my-2">
            <button type="submit" class="btn btn-default" name="editFlowerBtn" value="Cancel">Cancel</button>
            <button type="submit" class="btn btn-success" name="editFlowerBtn" value="Edit">Save</button>
        </div>
    </form>
</body>

</html>