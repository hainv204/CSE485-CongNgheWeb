<?php
// Base URL
$base_url = '/CSE485_CongNgheWeb/BTVN2';
//Relative path
$home_link = $base_url . '/index.php';
$category_link = $base_url . '/controllers/index.php';
$images_link = $base_url . '/views/images/upload_form.php';

$current_page = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo htmlspecialchars($home_link); ?>"><b>Products</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'index.php') ? 'active' : ''; ?>"
                        href="<?php echo htmlspecialchars($category_link) ?>">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#life">Life</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#article">Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'upload_form.php') ? 'active' : ''; ?>"
                        href="<?php echo htmlspecialchars($images_link) ?>">Images</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>