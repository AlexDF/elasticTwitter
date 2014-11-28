<?php
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);

  function my_autoloader($class){
    $filepath = 'class/' . str_replace("\\", "/", $class) . '.class.php';
    include $filepath;
  }

  spl_autoload_register('my_autoloader');

  


?>