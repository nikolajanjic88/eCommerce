<?php

$router->get('/', 'controllers/homeController.php');
$router->get('/products', 'controllers/productsController.php');
$router->get('/product', 'controllers/singleProductController.php');

$router->get('/login', 'controllers/users/login.php')->only('guest');
$router->post('/login', 'controllers/users/login.php');
$router->get('/logout', 'controllers/users/logout.php');

$router->get('/register', 'controllers/users/registration/create.php')->only('guest');
$router->post('/register', 'controllers/users/registration/store.php');

$router->get('/cart', 'controllers/cart/index.php')->only('auth');
$router->post('/cart', 'controllers/cart/store.php')->only('auth');
$router->delete('/cart', 'controllers/cart/destroy.php');

$router->get('/manage', 'controllers/admin/manage.php')->only('admin');
$router->get('/create', 'controllers/admin/create.php')->only('admin');
$router->post('/create', 'controllers/admin/store.php');
$router->get('/edit', 'controllers/admin/edit.php')->only('admin');
$router->put('/edit', 'controllers/admin/update.php');
$router->delete('/manage', 'controllers/admin/destroy.php');
$router->get('/upload', 'controllers/admin/images.php')->only('admin');
$router->post('/upload', 'controllers/admin/images.php')->only('admin');