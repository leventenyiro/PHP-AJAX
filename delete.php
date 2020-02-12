  <?php
    include("classes.php");
	$delete = new Adatbazis();
	$delete->delete($_GET["input_id"]); ?>	