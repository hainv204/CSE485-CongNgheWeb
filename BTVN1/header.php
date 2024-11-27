<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><b>Products</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#category">Category</a>
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
    <div class="heading d-flex justify-content-between bg-secondary">
        <h2 class="text-light pt-3">List Products</h2>
        <div class="form-button mx-4 my-3">
            <button class="btn btn-danger">Delete</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProduct">Add new product</button>
            <?php include './modals.php' ?>
        </div>
    </div>
</header>