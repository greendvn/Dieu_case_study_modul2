<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>
<h4>Add new note_type</h4>
<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Name</label>
        <input class="form-control" name="name" placeholder="name">
    </div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>