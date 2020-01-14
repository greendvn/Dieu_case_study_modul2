<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>
<h4>Add new note</h4>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Title</label>
        <input class="form-control" name="title" placeholder="title">
    </div>
    <div class="form-group">
        <label>Note type</label>
        <select class="form-control" name="typeId">
            <?php
                foreach ($noteTypes as $noteType):
            ?>
            <option value="<?php echo $noteType->getId() ?>"><?php echo $noteType->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Content</label>
        <textarea class="form-control" name="content" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>