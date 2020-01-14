<h2>Chỉnh sửa "<?php echo $noteType->getName() ?>" </h2>
    <form method="post" >
        <input type="text" class="form-control" name="id" value="<?php echo $noteType->getId() ?>" hidden>

        <div class="form-group">
            <label>Note Type</label>
            <input type="text" class="form-control" name="name" value="<?php echo $noteType->getName() ?>">
        </div>
        <div class="form-group">
            <label>Mô tả</label>
            <textarea class="form-control" name="description"
                      rows="3"><?php echo $noteType->getDescription() ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sửa </button>
        <a href="index.php" class="btn btn-primary">Thoát</a>
    </form>
