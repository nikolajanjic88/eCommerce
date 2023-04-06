<?php
    include_once BASE_PATH . '/views/inc/head.php';
    include_once BASE_PATH . '/views/inc/nav.php';
?>

<div class="small-container">
    <div class="row row-2">
        <h2>All Products</h2>
        <form action="" method="get">
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="0">Sort By</option>
                <option value="priceDESC">Price High to Low</option>
                <option value="priceASC">Price Low to High</option>
            </select>
        </form>
    </div>
    <div class="row">
        <?php foreach($products as $product): ?>
            <div class="col-4">
                <img src=<?= $product['path'] ?> alt="">
                <a href="/product?id=<?= $product['id'] ?>"><h4><?= $product['title'] ?></h4></a>
                <p>$<?= $product['price'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
</div>

<?php
    include_once BASE_PATH .'/views/inc/footer.php';
?>