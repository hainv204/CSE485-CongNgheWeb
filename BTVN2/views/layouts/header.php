<header>
    <div class="heading d-flex justify-content-between bg-secondary">
        <h2 class="text-light pt-3">List Products</h2>
        <div class="form-button mx-4 my-3">
            <button class="btn btn-danger">Delete</button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addnewProduct">
                Add new product</button>
            <?php include './../views/add_product.php'?>
        </div>
    </div>
</header>