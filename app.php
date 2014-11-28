<?php

ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

require 'vendor/autoload.php';

$client = new Elasticsearch\Client();


// Index a document
/*$params = array();
$params['body'] = array('testField' => 'abc');
$params['index'] = 'my_index';
$params['type'] = 'my_type';
$params['id'] = 'my_id';

$ret = $client->index($params);
*/

// Get a document
/*$getParams = array();
$getParams['index'] = 'my_index';
$getParams['type'] = 'my_type';
$getParams['id'] = 'my_id';
$retDoc = $client->get($getParams);
*/


// Search for a document
/*$searchParams['index'] = 'my_index';
$searchParams['type'] = 'my_type';
$searchParams['body']['query']['match']['testField'] = 'abc';
$retDoc = $client->search($searchParams);

print_r($retDoc);
*/

// Delete a document
/*$deleteParams = array();
$deleteParams['index'] = 'my_index';
$deleteParams['type'] = 'my_type';
$deleteParams['id'] = 'my_id';
$retDelete = $client->delete($deleteParams);*/



// Delete an index
/*$deleteParams2['index'] = 'my_index';
$client->indices()->delete($deleteParams2);
*/




?>









