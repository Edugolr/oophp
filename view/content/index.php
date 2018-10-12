
<div class="nav2">
    <a href="#">Index</a> | <a href="content/create">Create</a>
    | <a href="content/blogg">Blogg</a> | <a href="content/page">Pages</a>
</div>

<div style="overflow-x:auto;">
    <table>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Type</th>
            <th>Published</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Path</th>
            <th>Slug</th>
            <th>Read</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php foreach ($res as $row) : ?>
            <?php $slug = $row->slug ?? $row->path ?? $row->id ?>
          <tr>
            <td><?= $row->id ?></td>
            <td><?= $row->title ?></td>
            <td><?= $row->type ?></td>
            <td><?= $row->published ?></td>
            <td><?= $row->created ?></td>
            <td><?= $row->updated ?></td>
            <td><?= $row->deleted ?></td>
            <td><?= $row->path ?></td>
            <td><?= $row->slug ?></td>
            <td><a href="<?= "content/read/{$slug}"?>" ><i class="material-icons">open_in_new</i></a></td>
            <td><a href="<?= "content/edit/{$row->id}" ?>" ><i class="material-icons">edit</i></a></td>
            <td><a href="<?= "content/delete/{$row->id}" ?>" ><i class="material-icons">delete</i></a></td>
          </tr>
        <?php endforeach; ?>
    </table>
</div>
