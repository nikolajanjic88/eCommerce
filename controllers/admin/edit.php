<?php

use App\Database;

$db = new Database();

$sql = "SELECT * FROM products WHERE id = ?";

$product = $db->query($sql, [$_GET['id']])->findOrFail();

require_once BASE_PATH . '/views/admin/edit.view.php';