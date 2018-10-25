<?php

define('LARAVEL_START', microtime(true));
//microtime()，返回Unix时间戳： ‘0.47480800 1540473991’ ，参数为true时，返回浮点数：‘1540474027.3328’
/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so we do not have to manually load any of
| our application's PHP classes. It just feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';
