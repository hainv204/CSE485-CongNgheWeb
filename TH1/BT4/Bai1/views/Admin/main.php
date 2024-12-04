<main>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th class="py-3 text-center">STT</th>
                <th class="py-3 text-center">Name</th>
                <th class="py-3 text-center">Description</th>
                <th class="py-3 text-center">Image</th>
                <th class="py-3 text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($flowers)): ?>
            <tr>
                <td colspan="5" class="py-3 text-center">No Flowers</td>
            </tr>
            <?php else: ?>
            <?php
            static $count = 1;
            foreach ($flowers as $id => $flower) : ?>
            <tr>
                <td class="py-3 text-center"><?php echo $count++ ?></td>
                <td class="py-3 text-center"><?php echo htmlspecialchars($flower['name'])?></td>
                <td><?php echo htmlspecialchars($flower['description']) ?></td>
                <td class="py-3 text-center">
                    <img src="<?php echo htmlspecialchars($flower['image']) ?>" class="img-fluid"
                        style="max-height:120px; max-width: 150px;">
                </td>
                <td class="py-3 text-center">
                    <a href="index.php?controller=Admin&action=editFlower&id=<?=htmlspecialchars($flower['id'])?>"
                        class="btn btn-warning m-1 w-75">Edit</a>
                    <a href="index.php?controller=Admin&action=deleteFlower&id=<?=htmlspecialchars($flower['id'])?>"
                        class="btn btn-danger m-1 w-75">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</main>