<main class="container mt-4">
    <div class="row">
        <?php
        if(!isset($_SESSION))
            session_start();
        if(isset($_SESSION['flowers']))
            $flowers = $_SESSION['flowers'];
        foreach ($flowers as $index => $flower) : ?>
        <div class="col-md-4 mb-4 d-flex">
            <div class="card flex-grow-1 d-flex flex-column">
                <img src="<?php echo $flower['image']; ?>" class="card-img-top" alt="<?php echo $flower['name']; ?>"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ($index + 1) . '. ' . $flower['name']; ?></h5>
                    <p class="card-text"><?php echo $flower['description']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</main>