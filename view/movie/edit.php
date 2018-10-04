<?php
// Get essentials


include(__DIR__ . "/../../vendor/autoload.php");
include(__DIR__ . "/../../config/database.php");

?>
<div class="nav2">
    <a href="movie">View</a> <a href="select">CRUD</a>
</div>


<form class="" action="update" method="post">
    id: <input type="text" name="id" readonly value="<?= $res[0]->id ?>">
    title: <input type="text" name="title"  value="<?= $res[0]->title ?>">
    year: <input type="text" name="year"  value="<?= $res[0]->year ?>">
    image: <input type="text" name="image"  value="<?= $res[0]->image ?>">
    <input class="btn" type="submit" name="update" value="Update">
</form>
