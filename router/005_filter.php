<?php


$app->router->get("filter", function () use ($app) {
    $title = "Textfilter";

    $app->page->add("filter/index");

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("bbcode", function () use ($app) {
    $title = "bbcode example";

    $app->page->add("filter/bbcode");

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("link", function () use ($app) {
    $title = "link example";

    $app->page->add("filter/link");

    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->get("markdown", function () use ($app) {
    $title = "markdown example";

    $app->page->add("filter/markdown");

    return $app->page->render([
        "title" => $title,
    ]);
});
