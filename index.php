<?php
  /*ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);*/

  require 'vendor/autoload.php';

  function my_autoloader($class){
    $filepath = 'app/class/' . str_replace("\\", "/", $class) . '.class.php';
    include $filepath;
  }

  spl_autoload_register('my_autoloader');

  $db = null;
  $twitter = null;

  $twitter = new \TwitterController\Twitter;
  $tweets = $twitter->getPublicTweets(50);
  $db = new \ElasticSearchController\ElasticSearch;
  $db->insertTweet($tweets);

  if(!isset($_GET['pagetype'])) {
    $_GET['pagetype'] = 'Index';
  }

  \HtmlController\Html::render($_GET['pagetype']);

?>
