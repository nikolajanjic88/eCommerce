<?php

use App\Database;

$db = new Database();

$id = $_POST['id'];

$sql = "DELETE FROM cart WHERE id = ?";

$db->query($sql, [$id]);
header('location: /cart');
die();