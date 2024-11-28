<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new flower</title>
</head>
<link rel="stylesheet" href="./../../assets/css/bootstrap.min.css">

<body>
    <form action="./../../models/TaskModel.php" method="post" enctype="multipart/form-data">
        <div class="header">
            <h4 class="title">Add new flower</h4>
        </div>
        <div class="body">
            <div>
                <label for="name" class="form-label">Name</label>
                <input class="form-control" type="text" name="name">
            </div>
            <div>
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" rows="4"></textarea>
            </div>
            <div>
                <label for="image" class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
            </div>
        </div>
        <div class="footer my-2">
            <button type="button" class="btn btn-default" name="addFlowerBtn" value="Cancel">Cancel</button>
            <button type="submit" class="btn btn-success" name="addFlowerBtn" value="Add">Add</button>
        </div>
    </form>
</body>

</html>