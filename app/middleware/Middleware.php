<?php

namespace app\middleware;

class Middleware 
{
  public const MAP = [
    'guest' => Guest::class,
    'auth' => Auth::class,
    'admin' => Admin::class
  ];

}