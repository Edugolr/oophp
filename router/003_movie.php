<?php
/**
 * Show all movies.
 */
$app->router->any("GET | POST", "movie", function () use ($app) {
    $title = "Movie database | oophp";


    $app->db->connect();
    if ($app->request->getPost('q')) {
        $query = $app->request->getPost('q');
        $sql = "SELECT * FROM movie where title LIKE '%$query%'
        OR year LIKE '$query'";
    } elseif ($app->request->getPost('reset')) {
        $sql = "SELECT * FROM movie";
    } else {
        $sql = "SELECT * FROM movie";
    };

    $res = $app->db->executeFetchAll($sql);
    $app->page->add("movie/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->get("select", function () use ($app) {
    $title = "Movie database select | oophp";
    $app->db->connect();
    $sql = "SELECT * FROM movie";

    $res = $app->db->executeFetchAll($sql);
    $app->page->add("movie/select", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any("GET | POST", "edit", function () use ($app) {
    $title = "Movie database edit | oophp";


    $app->db->connect();
    if ($app->request->getPost('edit')) {
        $test = $app->request->getPost('title');
        $sql = "SELECT * FROM movie WHERE title='$test'";
        $route = 'movie/edit';
    }

    if ($app->request->getPost('delete')) {
        $test = $app->request->getPost('title');
        $sql = "DELETE FROM movie WHERE title='$test'";
        $app->db->execute($sql);
        $route = 'movie/index';
    }

    if ($app->request->getPost('add')) {
        $route = 'movie/add';
        $app->page->add("$route");
        return $app->page->render([
            "title" => $title,
        ]);
    }

    $res = $app->db->executeFetchAll($sql);
    $app->page->add("$route", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});


$app->router->any("GET | POST", "update", function () use ($app) {
    $title = "Movie database edit | oophp";

    $movieId    = $app->request->getPost('id');
    $movieTitle = $app->request->getPost('title');
    $movieYear  = $app->request->getPost('year');
    $movieImage = $app->request->getPost('image');
    $app->db->connect();
    if ($app->request->getPost('update')) {
        $test = $app->request->getPost('title');
        $sql = "UPDATE movie SET title = '$movieTitle', year = '$movieYear', image='$movieImage' WHERE id='$movieId'";
        $app->db->execute($sql);
    }

    $sql = "SELECT * FROM movie";
    $res = $app->db->executeFetchAll($sql);
    $app->page->add("movie/edit", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});

$app->router->any("GET | POST", "add", function () use ($app) {
    $title = "Movie database edit | oophp";

    $movieTitle = $app->request->getPost('title');
    $movieYear  = $app->request->getPost('year');
    $movieImage = $app->request->getPost('image');
    $app->db->connect();
    if ($app->request->getPost('add')) {
        $sql = "INSERT INTO movie (title, year, image) VALUES (?, ?, ?)";
        $app->db->execute($sql, [$movieTitle, $movieYear, $movieImage]);
    }

    $sql = "SELECT * FROM movie";
    $res = $app->db->executeFetchAll($sql);
    $app->page->add("movie/index", [
        "res" => $res,
    ]);

    return $app->page->render([
        "title" => $title,
    ]);
});
