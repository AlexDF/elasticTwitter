<?php

namespace HtmlController;


class Search extends Page {
  
  function __construct() {
    $query = $_POST['searchQuery'];
    $db = new \ElasticSearchController\ElasticSearch;

    if(isset($_GET['Filter'])) {
      $results = $db->filterSearchByUser($_GET['Filter']);
    } else {
      $results = $db->searchTweets($query);
    }

    $this->content .= '<table><tr><th>User</th><th>Tweet</th><th>Time</th></tr>';
    
    foreach( $results['hits']['hits'] as $result) {
      $tweet = $result['_source'];
      $filter = $tweet['user'];

      $this->content .= '<tr><td>' . $tweet['user'] . '</td><td>' .
        $tweet['text'] . '</td><td>' . $tweet['time'] . '</td><tr>';
    };
    $this->content .= '</table>';

    $this->content .= '<br><br><h3>MY FILTER</h3><a href="index.php?pagetype=Search&Filter=' . $filter . '">' . $filter . '</a><br><br>';   

    $db = null;

    $this->buildPage();

  }

  

}




?>