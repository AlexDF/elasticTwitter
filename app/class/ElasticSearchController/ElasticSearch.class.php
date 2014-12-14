<?php

namespace ElasticSearchController;

class ElasticSearch {
  
  public $client;

  function insertTweet($tweetSet) {
    $index = 'public_tweets';
    $type = 'tweet';

    foreach($tweetSet as $tweetData){
      $id = $tweetData['id_str'];
      $params = array();
      $params['body']['text'] = $tweetData['text'];
      $params['body']['user'] = $tweetData['user']['screen_name'];
      $params['body']['time'] = $tweetData['created_at'];
      $params['index'] = $index;
      $params['type'] = $type;
      $params['id'] = $id;
    
      $this->client->index($params);
      
    }
   
  }

  function searchTweets($searchString) {
    $searchParams = array();
    $searchParams['index'] = 'public_tweets';
    $searchParams['type'] = 'tweet';
    $searchParams['body']['query']['wildcard']['text'] = '*' . strtolower($searchString) . '*';

    $retDoc = $this->client->search($searchParams);
    return $retDoc;
  }

  function filterSearchByUser($userSearch) {
    $searchParams = array();
    $searchParams['index'] = 'public_tweets';
    $searchParams['type'] = 'tweet';
    $searchParams['body']['query']['match']['user'] = strtolower($userSearch);

    $retDoc = $this->client->search($searchParams);
    return $retDoc;
  }


  function __construct() {
    $this->client = new \Elasticsearch\Client();
  }


}



?>