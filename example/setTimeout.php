<?php
require __DIR__ . '/../vendor/autoload.php';

setTimeout(function(){
    echo "1\n";
    $timeout = setTimeout(function(){
        echo "2\n";
    },1000);
    clearTimeout($timeout);
},1000);


