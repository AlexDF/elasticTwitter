<?php
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);

  require 'vendor/autoload.php';

  function my_autoloader($class){
    $filepath = 'app/class/' . str_replace("\\", "/", $class) . '.class.php';
    include $filepath;
  }

  spl_autoload_register('my_autoloader');
  
  $twitter = new TwitterController\Twitter;
  $tweets = $twitter->getPublicTweets(25);

  $client = new Elasticsearch\Client();

  // Index a document
  $params = array();
  $params['body'] = array('Field1'=>'item1', 'Field2'=>'item2', 'Field3'=>'item3');
  $params['index'] = 'my_index';
  $params['type'] = 'my_type';
  $params['id'] = 'my_id';
  $ret = $client->index($params);

  
  // Get a document
  //$searchParams = array();
  $searchParams['index'] = 'my_index';
  $searchParams['type'] = 'my_type';
  $searchParams['body']['query']['wildcard']['Field2'] = '*i*';
  $retDoc = $client->search($searchParams);

  print_r($retDoc);



  //print_r($tweets);
?>