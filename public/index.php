<?php

require_once __DIR__.'/../helpers.php';
require_once __DIR__.'/../vendor/autoload.php';

/* Instance of Application */
$app = new \Jan\Foundation\Application(__DIR__.'/../');


/* Bind params */
$app->bind('salut', function () {
    return 'Hello My Friend';
});

$app->bind(\Jan\Components\FileSystem\File::class, function () {
    return new \Jan\Components\FileSystem\File(__DIR__.'/../');
});

$app->bind('file', function () {
    return new \Jan\Components\FileSystem\File(__DIR__.'/../');
});

$app->bind('upload', 'File was been uploaded successfully!');




/* Run Application */
$app->run();