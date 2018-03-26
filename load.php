<?php

require 'vendor/autoload.php';


// Setting up the data store

$dir = __DIR__.'/data';

$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));

$repo = new \JamesMoss\Flywheel\Repository('chat', $config);


// Send the 20 latest shouts as json

$items = $repo->query()
        ->orderBy('createdAt ASC')
        ->limit(20,0)
        ->execute();

$results = array();

$config = array(
    'language' => '\RelativeTime\Languages\English',
    'separator' => ', ',
    'suffix' => true,
    'truncate' => 1,
);

$relativeTime = new \RelativeTime\RelativeTime($config);

foreach($items as $item) {
    $item->timeAgo = $relativeTime->timeAgo($item->createdAt);
    $results[] = $item;
}

header('Content-type: application/json');
echo json_encode($results);
