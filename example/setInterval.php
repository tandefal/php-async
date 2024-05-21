<?php

require __DIR__ . '/../vendor/autoload.php';

setInterval(function ($timer) {
    static $counter = 1;
    echo "Count: {$counter}\n";

    if($counter === 10){
        clearInterval($timer);
    }

    $counter++;
}, 1000);