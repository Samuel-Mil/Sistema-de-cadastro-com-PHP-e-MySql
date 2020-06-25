<?php
    $autoload = function($class){
        include_once('classes/'.$class.'.php');
    };

    spl_autoload_register($autoload);

    $url = isset($_GET['url']) ? $_GET['url'] : 'home';

    if(file_exists('pages/'.$url.'.php'))
        include('pages/'.$url.'.php');
 
?>