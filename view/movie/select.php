<?php
// Get essentials


include(__DIR__ . "/../../vendor/autoload.php");
include(__DIR__ . "/../../config/database.php");

?>
<div class="nav2">
    <a href="movie">View</a> <a href="select">CRUD</a>
</div>
<form class="" action="edit" method="post">
    <select class="" name="title">
        <?php foreach ($res as $row): ?>
            <option value="<?=$row->title  ?>"><?=$row->title  ?></option>
        <?php endforeach; ?>
        <option value=""></option>
    </select>
    <input class="btn" type="submit" name="add" value="add">
    <input class="btn orange" type="submit" name="edit" value="edit">
    <input class="btn red" type="submit" name="delete" value="delete">
</form>
