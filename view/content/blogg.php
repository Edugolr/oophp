<div class="nav2">
    <a href="../content">Index</a> | <a href="create">Create</a> | <a href="#">Blogg</a>
     | <a href="page">Pages</a>
</div>

<div style="overflow-x:auto;">

        <?php foreach ($res as $row) : ?>
            <?php $slug = $row->slug ?? $row->path ?? $row->id ?>
        <article>
            <h1> <a href="<?= "../content/read/{$slug}" ?>"><?= $row->title ?></a> </h1>
            <?= $row->data ?>
            <br><br>
            <div class="articlefoot">
                Published: <?= $row->published ?><br>
                Updated: <?= $row->updated ?>
            </div>
        </article>

        <?php endforeach; ?>
</div>
