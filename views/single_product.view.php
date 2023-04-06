<?php
    include_once 'inc/head.php';
    include_once 'inc/nav.php';
?>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="<?= $images[0]['path'] ?>" width="100%" id="product-img">
            <div class="small-img-row">
                <?php foreach($images as $image): ?>
                <div class="small-img-col">
                    <img src="<?= $image['path'] ?>" width="100%" class="small-img">
                </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="col-2">
            <h1><?= $product['title'] ?></h1>
            <h4>$<?= $product['price'] ?></h4>
            <form action="/cart" method="post">
                <input type="hidden" name="id" value="<?=$_GET['id'] ?>">
                <input type="number" step="1" min="1" name="qty" value="1">
                <?php if(isset($errors['qty'])): ?>
                <p class="error"><?= $errors['qty'] ?></p>
                <?php endif ?>
                <button class="btn">Add to Cart</button>
            </form>
            
            <h3>Product Detail</h3>
            <p><?= $product['description'] ?></p>
        </div>
    </div>
</div>

<?php
    include_once 'inc/footer.php'
?>
