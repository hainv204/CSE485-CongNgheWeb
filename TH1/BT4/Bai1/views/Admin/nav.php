<!-- Link Bootstrap 5 -->
<link rel="stylesheet" href="./assets/css/bootstrap.min.css">
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><b>Flowers</b></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['controller'] == 'Admin' && $_GET['action'] == 'index') ? 'active' : '' ?>"
                        href="index.php?controller=Admin&action=index">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_GET['controller'] == 'User' && $_GET['action'] == 'index') ? 'active' : '' ?>"
                        href="index.php?controller=User&action=index">User</a>
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