<?php

namespace ElasticSearchController;

class ElasticSearch {
  
  public $client;

  function insertTweet($tweetData) {
    $index = 'public_tweets';
    $type = 'tweet';
    $id = $tweetData['id_str'];

    $params = array();
    $params['body']['text'] = $tweetData['text'];
    $params['body']['user'] = $tweetData['user']['screen_name'];
    $params['body']['time'] = $tweetData['created_at'];
    //$params['body'] = array('text'=>'my_text', 'user'=>'user', 'time'=>'2:00');
    $params['index'] = $index;
    $params['type'] = $type;
    $params['id'] = $id;
    
    $retDoc = $this->client->index($params);
    return $retDoc;
  }

  function searchTweets($searchString) {
  	$searchParams = array();
    $searchParams['index'] = 'public_tweets';
    $searchParams['type'] = 'tweet';
    $searchParams['body']['query']['wildcard']['text'] = '*' . strtolower($searchString) . '*';

    $retDoc = $this->client->search($searchParams);
    return $retDoc;
  }


  function __construct() {
    $this->client = new \Elasticsearch\Client();

  }


}



?>