<?php
$app->options('/hello[/{name}]', function($request, $response, $args) {
    $hello = new \RRR\Hello();
    $json = json_encode($hello->getOptions(), JSON_PRETTY_PRINT);
    $response = $response->write($json);
    // Return CORS-friendly response for preflight check
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', 'OPTIONS, GET');
    $response = $response->withHeader('Access-Control-Allow-Headers', 'Content-Type');
    $response = $response->withHeader('Access-Control-Max-Age', '86400'); // 1 day
    return $response;
});


$app->get('/hello[/{name}]', function ($request, $response, $args) {
    $hello = new \RRR\Hello();
    $name = $args['name'] !== null ? $args['name'] : 'World';
    $json = json_encode($hello->getHello($name));
    $response->write($json);
    $response = $response->withHeader('Content-Type', 'application/json');
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');

    return $response;
});

