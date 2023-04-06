<?php

use App\Database;

$db = new Database();

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$password = $_POST['password'];
$rpassword = $_POST['rpassword'];
$errors = [];

//validation
if(trim($name) === '') {
    $errors['name'] = 'Name required';
}
if(trim($email) === '') {
    $errors['email'] = 'Email required';
}
if(trim($password) === '') {
    $errors['password'] = 'Password required';
}
if(!email($email) && trim($email) !== '') {
    $errors['email'] = 'Invalid email';
}
if(!passwordLength($password) && trim($password) !== '') {
    $errors['password'] = 'Password must have between 6 and 20 characters';
}
if(!compareValues($password, $rpassword)) {
    $errors['rpassword'] = 'Passwords are not matching';
}

//check if user exists
$sql = "SELECT email FROM users where email = ?";
$res = $db->query($sql, [$email])->find();
if($res) {
    $errors['email'] = 'User already exists';
}

if(!empty($errors)) {
    require_once BASE_PATH . '/views/register.view.php';
} else {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $db->query($sql, ['name' => $name, 'email' => $email, 'password' => $password]);
    $_SESSION['success'] = 'Success!';
    header('location: /login');
    die();
}
