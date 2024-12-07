<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit flower</title>
    <!-- Link Bootstrap 5 -->
    <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
</head>

<body>
    <form class="form-group" action="index.php?controller=Admin&action=handleEditFlower" method="post"
        enctype="multipart/form-data">
        <div class="header">
            <h4 class="title">Edit flower</h4>
        </div>
        <div class="body">
            <div>
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" name="name" value="<?= htmlspecialchars($flowers['name']) ?>">
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description"
                    rows="4"><?= htmlspecialchars($flowers['description']) ?></textarea>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <img src="<?= htmlspecialchars($flowers['image']) ?>" style="max-width: 200px">
                <input class="my-2" type="file" name="image">
            </div>
            <!-- Index hidden -->
            <input type="hidden" name="id" value="<?=htmlspecialchars($flowers['id'])?>">
        </div>
        <div class="footer my-2">
            <button type="submit" class="btn btn-default" name="editFlowerBtn" value="Cancel">Cancel</button>
            <button type="submit" class="btn btn-success" name="editFlowerBtn" value="Edit">Save</button>
        </div>
    </form>
</body>

</html>