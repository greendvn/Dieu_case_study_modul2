<h2>Note List</h2>
<div class="row">
    <div class="col-12 col-md-6">
        <a href="index.php?page=addNote">Add new note</a>
    </div>
    <div class="col-12 col-md-6 ml-auto">
        <form class="form-inline my-2 my-lg-0 ">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Content</th>
        <th scope="col">Type ID</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($notes as $key => $note): ?>
        <tr>
            <th scope="row"><?php echo ++$key ?></th>
            <td><?php echo $note->getTitle() ?></td>
            <td><?php echo $note->getContent() ?></td>
            <td>
                <?php
                foreach ($noteTypes as $noteType) {
                    if ($note->getTypeId() == $noteType->getId())
                        echo $noteType->getName();
                }
                ?>
            </td>
            <td>
                <a href="index.php?page=editNote&id=<?php echo $note->getId(); ?>"
                   class="btn btn-primary btn-sm">Chỉnh sửa</a>
                <a href="index.php?page=deleteNote&id=<?php echo $note->getId(); ?>"
                   class="btn btn-warning btn-sm">Xóa</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>