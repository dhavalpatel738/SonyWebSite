<?php
// composer autoload
require __DIR__ . '/vendor/autoload.php';

// if you are not using composer
// require_once 'path/to/algoliasearch.php';

$client = new \AlgoliaSearch\Client('WVHGE23Q46', 'eaf4facf98e216f1ec9856f019dee959');

$index = $client->initIndex('products');

$index->setSettings(array(
  "searchableAttributes" => [
    "brand",
]  
));

?>