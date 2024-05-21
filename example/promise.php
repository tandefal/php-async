<?php

require __DIR__ . '/../vendor/autoload.php';


function httpGet($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    $content = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    return [$http_code, $content];
}

$promiseErr = new Promise(function ($resolve, $reject) {
    [$http_code, $content] = httpGet('https://jsonplaceholder.typicode.com/t');

    if ($http_code === 200) {
        $resolve($content);
    } else {
        $reject(new Exception('Something went wrong!'));
    }
});
$promiseErr->then(function ($data) {
    var_dump($data);
})->catch(function ($err) {
    echo $err->getMessage() . PHP_EOL;
})->finally(function () {
    echo "finally" . PHP_EOL;
});

$promise = new Promise(function ($resolve, $reject) {
    [$http_code, $content] = httpGet('https://jsonplaceholder.typicode.com/todos/1');

    if ($http_code === 200) {
        $resolve($content);
    } else {
        $reject(new Exception('Something went wrong!'));
    }
});

$promise->then(function ($data) {
    return json_decode($data);
})->then(function ($data) {
    var_dump($data);
})->catch(function ($err) {
    echo $err->getMessage() . PHP_EOL;
})->finally(function () {
    echo "finally" . PHP_EOL;
});