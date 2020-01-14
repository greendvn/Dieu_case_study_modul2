<h2>Note type List</h2>

<a href="noteType.php?page=addNoteType">Add new note type</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($noteTypes as $key => $noteType): ?>
        <tr>
            <th scope="row"><?php echo ++$key ?></th>
            <td><?php echo $noteType->getName() ?></td>
            <td><?php echo  $noteType->getDescription() ?></td>
            <td>
                <a href="noteType.php?page=editNoteType&id=<?php echo $noteType->getId(); ?>"
                   class="btn btn-primary btn-sm">Chỉnh sửa</a>
                <a href="noteType.php?page=deleteNoteType&id=<?php echo $noteType->getId(); ?>"
                   class="btn btn-warning btn-sm">Xóa</a>
            </td>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>