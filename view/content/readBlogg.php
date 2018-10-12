
<article>
    <header>
        <h1><?= htmlentities($res->title) ?></h1>
    <?= $res->data ?>
    <p><i>Published: <time datetime="<?= htmlentities($res->published) ?>" pubdate><?= htmlentities($res->published) ?></time></i></p>
</header>
</article>
