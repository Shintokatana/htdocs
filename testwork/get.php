<?php

$app->get('/', function() use ($authors) {
    return json_encode($authors);
});
$app->get('/{stockcode}', function (Silex\Application $app, $stockcode) use ($authors) {
    if (!isset($authors[$stockcode])) {
        $app->abort(404, "Stockcode {$stockcode} does not exist.");
    }
    return json_encode($authors[$stockcode]);
});




?>