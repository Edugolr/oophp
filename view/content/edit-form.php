<?php
    $check = explode(",", $res->filter)
?>

<form action="../save" method="POST">
    <p>
        <input type="text" name="id" readonly value="<?=$res->id ?>">
    </p>
    <p>
        <input type="text" name="title"  value="<?=$res->title ?>">
    </p>
    <p>
        <input type="text" name="path"  value="<?=$res->path ?>">
    </p>
    <p>
        <input type="text" name="slug"  value="<?=$res->slug ?>">
    </p>
    <select class="round" name="type">
        <?php if ($res->type =="page") : ?>
            <option selected="selected" value="page">Page</option>
            <option value="post">Post</option>
        <?php else : ?>
            <option value="page">Page</option>
            <option selected="selected"  value="post">Post</option>
        <?php endif; ?>
   </select>
    <p>
        <textarea name="data" rows="8" cols="80"><?=htmlentities($res->data) ?></textarea>
    </p>
    <p>
    <?php foreach ($filters as $key => $value) : ?>
        <div class="item">
            <?php if (in_array($key, $check)) : ?>
                <?=$key ?>: <input type="checkbox" name="filter_array[]" checked value="<?=$key ?>">
            <?php else : ?>
                <?=$key ?>: <input type="checkbox" name="filter_array[]"  value="<?=$key ?>">
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    </p>
    <p>
        <input type="submit"  value="Save">
    </p>
</form>
