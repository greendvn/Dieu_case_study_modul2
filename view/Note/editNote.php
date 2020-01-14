<h2>Chỉnh sửa "<?php echo $note->getTitle() ?>" </h2>
<form method="post">
    <input type="text" class="form-control" name="id" value="<?php echo $note->getId() ?>" hidden>

    <div class="form-group">
        <label>Title </label>
        <input type="text" class="form-control" name="title" value="<?php echo $note->getTitle() ?>">
    </div>
    <div class="form-group">
        <label>Note type</label>
        <select class="form-control" name="typeId">
            <?php
            foreach ($noteTypes as $noteType):
            ?>
            <option value="<?php echo $noteType->getId() ?>" <?php if ($noteType->getId() == $note->getTypeId()): ?> selected <?php endif; ?> ><?php echo $noteType->getName() ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Content</label>
        <textarea class="form-control" name="content"
                  rows="3"><?php echo $note->getContent() ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Sửa</button>
    <a href="index.php" class="btn btn-primary">Thoát</a>
</form>

