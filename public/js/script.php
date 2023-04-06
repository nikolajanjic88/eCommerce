<?php if(isset($_SESSION['success'])): ?>
<script>swal("Good job!", "<?= $_SESSION['success'] ?>", "success");</script>
<?php unset($_SESSION['success']);
endif ?>

<?php if(isset($_SESSION['update'])): ?>
<script>swal("Good job!", "<?= $_SESSION['update'] ?>", "success");</script>
<?php unset($_SESSION['update']);
endif ?>

<?php if(isset($_SESSION['added'])): ?>
<script>swal("Good job!", "<?= $_SESSION['added'] ?>", "success");</script>
<?php unset($_SESSION['added']);
endif ?>

<?php if(isset($_SESSION['post_created'])): ?>
<script>swal("Good job!", "<?= $_SESSION['post_created'] ?>", "success");</script>
<?php unset($_SESSION['post_created']);
endif ?>
