<?php

use App\Database;

$db = new Database();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $errors = [];

    if(trim($email) === '') {
        $errors['email'] = 'Email required';
    }
    if(trim($password) === '') {
        $errors['password'] = 'Password required';
    }
    if(!email($email) && trim($email) !== '') {
        $errors['email'] = 'Please, enter valid email';
    }

    $sql = "SELECT * FROM users WHERE email = ?";
    $res = $db->query($sql, [$email])->find();
    
    if(!$res && trim($email) !== '' && email($email)) {
        $errors['email'] = "User doesn't exist";
    }
    if($res && !password_verify($password, $res['password'])) {
        $errors['password'] = 'Wrong password';
    }

    if(empty($errors)) {
        $_SESSION['user'] = [
            'id' => $res['id'],
            'name' => $res['name'],
            'is_admin' => $res['is_admin']
        ];
        $_SESSION['success'] = 'Success!';
        header('location: /');
        die();
    }
}

require_once BASE_PATH . '/views/login.view.php';