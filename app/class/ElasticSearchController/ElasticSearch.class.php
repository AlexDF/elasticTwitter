<?php

class ElasticSearch {
  
  $client;

  function insertTweet($tweetData) {
    $index = $tweetData['id'];
    $type = 'tweet';
    $id = $tweetData['id'];


    $params = array();
    $params['body'] = array('text'=>$tweetData['text'], 'user'=>$tweetData['user']['screen_name'], 'time'=>$tweetData['created_at']);
    $params['index'] = $index;
    $params['type'] = $type;
    $params['id'] = $id;
    $client->index($params);
  }

  function searchTweets($searchString) {
    
  }


  function __construct() {
    $this->client = new \Elasticsearch\Client();

  }


}



?>