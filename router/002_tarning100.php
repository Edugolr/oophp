<?php

$app->router->any(["GET", "POST", "SESSION"], "tarning100/start", function () use ($app) {
    $data = [
        "title" => "Tärning 100",
    ];

    $app->page->add("tarning100/start", $data);
    return $app->page->render($data);
});
