<?php

namespace HtmlController;


class Search extends Page {
  
  function __construct() {
    $query = $_POST['searchQuery'];
    $db = new \ElasticSearchController\ElasticSearch;
    $results = $db->searchTweets($query);

    $this->content .= '<table><tr><th>User</th><th>Tweet</th><th>Time</th></tr>';
    
    foreach( $results['hits']['hits'] as $result) {
      $tweet = $result['_source'];   
      $this->content .= '<tr><td>' . $tweet['user'] . '</td><td>' .
        $tweet['text'] . '</td><td>' . $tweet['time'] . '</td><tr>';
    };
    $this->content .= '</table>';
   

    $db = null;

    $this->buildPage();

  }

  

}




?>