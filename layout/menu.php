<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">iNote</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="noteType.php">Note type <span class="sr-only">(current)</span></a>
            </li>
        </ul>


        <form class="form-inline my-2 my-lg-0" method="post">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Database : </label>
                    <select class="form-control" name="noteStore">
                        <option value="DB" <?php if($_SESSION["noteStore"] =="DB"): ?> selected <?php endif; ?>>MySql</option>
                        <option value="File" <?php if($_SESSION["noteStore"] =="File"): ?> selected <?php endif; ?>>File</option>
                    </select>
                </div>

                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Select</button>
        </form>
    </div>
</nav>