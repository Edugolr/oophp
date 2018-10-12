<div class="nav2">
    <a href="../content">Index</a> | <a href="#">Create</a> | <a href="blogg">Blogg</a>
     | <a href="page">Pages</a>
</div>


<form action="create" method="post">
    Title: <input type="text" name="title"  value="title">
    Path: <input type="text" name="path"  value="">
    Slug: <input type="text" name="slug"  value="">
          <textarea name="data" rows="8" cols="80">Data</textarea>
         <div class="flex">
            <?php foreach ($filters as $key => $value) : ?>

                <?=$key ?>: <input type="checkbox" name="filter_array[]" value="<?=$key ?>">
            <?php endforeach; ?>
        </div>
     <select class="round" name="type">
        <option value="page">Page</option>
        <option value="post">Post</option>
    </select>

    <input class="btn" type="submit" name="add" value="Create">
</form>
