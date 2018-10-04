<?php
// Get essentials


include(__DIR__ . "/../../vendor/autoload.php");
include(__DIR__ . "/../../config/database.php");

?>

<div class="nav2">
    <a href="movie">View</a> <a href="select">CRUD</a>
</div>
<form class="" method="post">
    <div class="group">
      <input type="search" required name="q" value="">
      <span class="highlight"></span>
      <span class="bar"></span>
      <label>Search</label>
    </div>

</form>

<div style="overflow-x:auto;">
    <table>
        <tr>
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
        </tr>
        <?php foreach ($res as $row) : ?>
          <tr>
            <td><?= $row->id ?></td>
            <td background='<?= $row->image ?>' background-size: 'contain'></td>
            <td><?= $row->title ?></td>
            <td><?= $row->year ?></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>
