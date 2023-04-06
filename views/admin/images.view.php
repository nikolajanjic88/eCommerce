<?php
    include_once BASE_PATH .'/views/inc/head.php';
    include_once BASE_PATH .'/views/inc/nav.php';
?>

<div class="small-container">
    <div class="row">
        <?php if(count($images) < 1): ?>
            <h1>No Images for this Product</h1>
        <?php endif ?>
        <?php foreach($images as $image): ?>
            <div class="col-4">
                <img src=<?= $image['path'] ?> alt="">
            </div>
        <?php endforeach ?>
    </div>
    <div class="row">
        <div class="edit">
            <form action="" method="post" enctype="multipart/form-data">
                <input class="file" type="file" name="image">
                <?php if(isset($errors['image'])): ?>
                <p class="error"><?= $errors['image'] ?></p>
                <?php endif ?>
                <button class="edit-btn">Upload images</button>
            </form>
        </div>
    </div>

</div>

<?php
    include_once BASE_PATH . '/views/inc/footer.php'
?>