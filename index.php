<?php

use system\Routes;

session_start();

function Autoload($class_name)
{
    include $class_name.'.php';
 }

spl_autoload_register('Autoload');

$url = substr($_SERVER['REQUEST_URI'],1);
$url = explode('/',$url);

new Routes($url);