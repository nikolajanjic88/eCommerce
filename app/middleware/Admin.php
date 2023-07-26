<?php

namespace app\middleware;

class Admin 
{
  public function handle()
  {
    if($_SESSION['user']['is_admin'] != 1) {
      header('location: /products');
      die();
    }
  }
}