<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<!--CSS Bootstrap 5 and Font Awesome-->
<link rel="stylesheet" href="./../../assets/css/bootstrap.min.css">
<link rel="stylesheet" href="./../../assets/css/all.min.css">

<body>
    <?php
    include './../../views/layouts/nav.php';
    include './../../models/flowers.php';
    ?>
    <header>
        <div class="d-flex justify-content-between bg-secondary">
            <h2 class="text-light pt-3">Flower Infomation Management</h2>
            <div class="mx-2 p-3">
                <a href="./../tasks/add_flower.php">
                    <button class="btn btn-success">Add new flower</button>
                </a>
            </div>
        </div>
    </header>
    <main>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(!isset($_SESSION))
                    session_start();
                if(isset($_SESSION['flowers']))
            $flowers = $_SESSION['flowers'];
            static $count = 1;
            foreach ($flowers as $index => $flower) : ?>
                <tr>
                    <td class="py-3 text-center"><?php echo $count++ ?></td>
                    <td class="py-3 text-center"><?php echo htmlspecialchars($flower['name']); ?></td>
                    <td><?php echo htmlspecialchars($flower['description']); ?></td>
                    <td class="py-3 text-center">
                        <img src="<?php echo $flower['image']; ?>"
                            alt="<?php echo htmlspecialchars($flower['name']); ?>" class="img-fluid"
                            style="max-width: 100px;">
                    </td>
                    <td class="py-3 text-center">
                        <a href="./../tasks/edit_flower.php?name=<?php echo urlencode($flower['name']); ?>
                        &description=<?php echo urlencode($flower['description']); ?>&image=<?php echo urlencode($flower['image']); ?> &index=<?php echo $index; ?>"
                            class="btn btn-warning m-1 w-75">Edit</a>
                        <a href="./../tasks/delete_flower.php?name=<?php echo urlencode($flower['name']); ?>
                        &description=<?php echo urlencode($flower['description']); ?>&image=<?php echo urlencode($flower['image']); ?> &index=<?php echo $index; ?>"
                            class="btn btn-danger m-1 w-75">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
    <footer colspan="5"><b>Total: <?php echo count($flowers)?> flower</b></footer>
    <!-- JS Bootrap 5 and Font Awesome -->
    <script src="./../../assets/js/bootstrap.bundle.js"></script>
    <script src="./../../assets/js/all.min.js"></script>
</body>

</html>