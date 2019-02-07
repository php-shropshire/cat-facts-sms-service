<?php

include "vendor/autoload.php";

$dotenv = Dotenv\Dotenv::create(__DIR__);
$dotenv->load();

$app = new Silly\Edition\PhpDi\Application();

$app->command('consume:subscribers', '\App\Commands\ConsumeNewSubscribers');

$app->run();
