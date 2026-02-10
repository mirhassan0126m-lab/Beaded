<div class="category">
    <h2><?php echo $category['name']; ?></h2>
    <ul>
        <?php foreach ($products as $product) { ?>
            <li><a href="product.php?id=<?php echo $product['id']; ?>"><?php echo $product['name']; ?></a></li>
        <?php } ?>
    </ul>
</div>
