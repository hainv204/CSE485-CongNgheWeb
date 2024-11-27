<main>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="py-3 text-center">STT</th>
                <th class="py-3 text-center">Name</th>
                <th class="py-3 text-center">Price</th>
                <th class="py-3 text-center">Update</th>
                <th class="py-3 text-center">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
            <tr>
                <td colspan="5" class="py-3 text-center">No products</td>
            </tr>
            <?php else: ?>
            <?php $count = 1;
            ?>
            <?php
            if(!isset($_SESSION))
                session_start();
             if(isset($_SESSION['products']))
                $products = $_SESSION['products'];
            foreach ($products as $index=>$value): ?>
            <tr>
                <td class="py-3 text-center"><?= htmlspecialchars($count++) ?></td>
                <td class="py-3 text-center"><?= htmlspecialchars($value['name']) ?></td>
                <td class="py-3 text-center"><?= htmlspecialchars($value['price']) ?> VND</td>
                <td class="py-3 text-center">
                    <a
                        href="./../views/edit_product.php?name=<?php echo urlencode($value['name']); ?>&price=<?php echo urlencode($value['price']); ?> &index=<?php echo $index; ?>">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </td>

                <td class="py-3 text-center"><a
                        href="./../views/delete_product.php?name=<?php echo urlencode($value['name']); ?>&price=<?php echo urlencode($value['price']); ?> &index=<?php echo $index; ?>">
                        <i class="fa-solid fa-trash"></i></a></td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?>
        </tbody>
    </table>
</main>