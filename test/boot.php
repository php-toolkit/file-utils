<?php
/**
 * phpunit
 */

error_reporting(E_ALL);
ini_set('display_errors', 'On');
date_default_timezone_set('Asia/Shanghai');

spl_autoload_register(function ($class) {
    $file = null;

    if (0 === strpos($class,'Toolkit\FileUtil\Example\\')) {
        $path = str_replace('\\', '/', substr($class, strlen('Toolkit\FileUtil\Example\\')));
        $file = dirname(__DIR__) . "/example/{$path}.php";
    } elseif (0 === strpos($class,'Toolkit\FileUtil\Test\\')) {
        $path = str_replace('\\', '/', substr($class, strlen('Toolkit\FileUtil\Test\\')));
        $file = __DIR__ . "/{$path}.php";
    } elseif (0 === strpos($class,'Toolkit\FileUtil\\')) {
        $path = str_replace('\\', '/', substr($class, strlen('Toolkit\FileUtil\\')));
        $file = dirname(__DIR__) . "/src/{$path}.php";
    }

    if ($file && is_file($file)) {
        include $file;
    }
});
