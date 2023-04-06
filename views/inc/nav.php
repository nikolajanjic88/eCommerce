<body>
<div class="navbar">
    <div class="logo">
        <img src="images/logo.png" width="125px" alt="">
    </div>
    <nav>
        <ul>
            <li><a href="/" class="<?= urlIs('/') ? 'active' : '' ?>">Home</a></li>
            <li><a href="/products" class="<?= urlIs('/products') ? 'active' : '' ?>">Products</a></li>
            <li><a href="/cart" class="<?= urlIs('/cart') ? 'active' : '' ?>">Cart</a></li>
            <?php if(isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1): ?>
            <li><a href="/manage" class="<?= urlIs('/manage') ? 'active' : '' ?>">Manage</a></li>
            <?php endif ?>
            <?php if(!isset($_SESSION['user'])): ?>
            <li><a href="/login" class="<?= urlIs('/login') ? 'active' : '' ?>">Account</a></li>
            <?php else: ?>
            <li><a href="/logout" class="<?= urlIs('/logout') ? 'active' : '' ?>"><?= $_SESSION['user']['name'] ?></a></li>
            <?php endif ?>
        </ul>
    </nav>
</div>