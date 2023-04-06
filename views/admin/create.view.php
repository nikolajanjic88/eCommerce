<?php
    include_once BASE_PATH .'/views/inc/head.php';
    include_once BASE_PATH .'/views/inc/nav.php';
?>

<div class="edit-page">
 
    <div class="row">
        <div class="edit">
            <form action="" method="post">
                <input class="input-edit" type="text" name="title" value="<?= $_POST['title'] ?? null ?>">
                <?php if(isset($errors['title'])): ?>
                <p class="error"><?= $errors['title'] ?></p>
                <?php endif ?>
                <textarea class="input-edit" name="desc" id="" cols="30" rows="10"><?= $_POST['desc'] ?? null ?></textarea>
                <?php if(isset($errors['desc'])): ?>
                <p class="error"><?= $errors['desc'] ?></p>
                <?php endif ?>
                <input class="input-edit" type="number" step="0.01" name="price" value="<?= $_POST['price'] ?? null ?>">
                <?php if(isset($errors['price'])): ?>
                <p class="error"><?= $errors['price'] ?></p>
                <?php endif ?>
                <button class="edit-btn">Add Product</button>
            </form>
        </div>
    </div>

</div>

<?php
    include_once BASE_PATH . '/views/inc/footer.php'
?>