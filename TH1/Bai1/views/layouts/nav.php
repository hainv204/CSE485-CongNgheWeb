<?php
// Base URL
$base_url = '/CSE485_CongNgheWeb/TH1/Bai1';
//Relative path
$user_link = $base_url . '/controllers/userController.php';
$admin_link = $base_url . '/views/layouts/admin.php';

$current_page = basename($_SERVER['PHP_SELF']);
// echo $current_page;
?>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?php echo htmlspecialchars($home_link); ?>"><b>Flowers</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'admin.php') ? 'active' : ''; ?>"
                        href="<?php echo htmlspecialchars($admin_link) ?>">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($current_page === 'userController.php') ? 'active' : ''; ?>"
                        href="<?php echo htmlspecialchars($user_link) ?>">User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#life">Life</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#article">Article</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
    </div>
</nav>