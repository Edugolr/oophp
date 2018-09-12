<?php
/**
 * Create routes using $app programming style.
 */
//var_dump(array_keys(get_defined_vars()));



/**
 * Guess my number with get
 */
$app->router->get("gissa/get", function () use ($app) {
    $data = [
        "title" => "Gissa numret med GET",
    ];

    $app->page->add("guess/get", $data);
    return $app->page->render($data);
});
/**
 * Guess my number with post
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    $data = [
        "title" => "Gissa numret med POST",
    ];

    $app->page->add("guess/post", $data);
    return $app->page->render($data);
});
$app->router->any(["GET", "POST", "SESSION"], "gissa/session", function () use ($app) {
    $data = [
        "title" => "Gissa numret med SESSION",
    ];

    $app->page->add("guess/session", $data);
    return $app->page->render($data);
});
