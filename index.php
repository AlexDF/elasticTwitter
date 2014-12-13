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
  $tweets = $twitter->getPublicTweets(1);

  //$client = new Elasticsearch\Client();

  // Index a document
  /*$params = array();
  $params['body'] = array('Field1'=>'item1', 'Field2'=>'item2', 'Field3'=>'item3');
  $params['index'] = 'my_index';
  $params['type'] = 'my_type';
  $params['id'] = 'my_id';*/
  //$ret = $client->index($params);

  
  //$searchParams = array();
  /*$searchParams['index'] = 'my_index';
  $searchParams['type'] = 'my_type';
  $searchParams['body']['query']['wildcard']['Field2'] = '*i*';
  $retDoc = $client->search($searchParams);*/

  //print_r($retDoc);


  /*foreach($tweets as $tweet) {
    echo $tweet['text'] . '<br>';
    echo $tweet['user']['screen_name'] . '<br>';
    echo $tweet['created_at'] . '<br>';
    echo $tweet['id'];
    echo '<br><br><hr>';
  }*/

  //print_r($tweets);
  //$db = new ElasticSearchController\ElasticSearch;
  //$ret = $db->insertTweet($tweets[0]);
  //$res = $db->searchTweets('Eng');
  //print_r($res);

  if(!isset($_GET['pagetype'])) {
    $_GET['pagetype'] = 'Index';
  }

  \HtmlController\Html::render($_GET['pagetype']);

?>