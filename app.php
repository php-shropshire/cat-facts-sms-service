<?php

include "vendor/autoload.php";

$app = new Silly\Edition\PhpDi\Application();

$app->command('consume:subscribers', '\App\Commands\ConsumeNewSubscribers');

$app->run();
