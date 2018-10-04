<?php
// Get essentials


include(__DIR__ . "/../../vendor/autoload.php");
include(__DIR__ . "/../../config/database.php");

?>
<div class="nav2">
    <a href="movie">View</a> <a href="select">CRUD</a>
</div>


<form class="" action="add" method="post">
    title: <input type="text" name="title"  value="title">
    year: <input type="text" name="year"  value="year">
    image: <input type="text" name="image"  value="image">
    <input class="btn" type="submit" name="add" value="Create">
</form>
