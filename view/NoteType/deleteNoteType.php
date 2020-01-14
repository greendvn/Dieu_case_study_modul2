<h2>Xóa mặt hàng</h2>
<h5>Bạn có chăc chắn muốn xóa "<?php echo $noteType->getName()  ?>" ?</h5>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $id = $_POST["id"];
    $this->noteType->delete($id);
    header("Location:noteType.php");
}
?>

<form method="post">
    <input type="text" class="form-control" name="id" value="<?php echo $noteType->getId()?> " hidden>
    <a  href="noteType.php" class="btn btn-primary">Thoát</a>
    <button type="submit" class="btn btn-primary">Xóa </button>
</form>