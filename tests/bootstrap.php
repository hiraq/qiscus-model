<?php

$loader = require __DIR__."/../vendor/autoload.php";
$loader->addPsr4('QiscusCore\\', __DIR__.'/QiscusCore');
$loader->addPsr4('QiscusInfra\\', __DIR__.'/QiscusInfra');

date_default_timezone_set('UTC');
