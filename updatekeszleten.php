<?php
    include("classes.php");
	$updateKesz = new Adatbazis();
	$updateKesz->updateKeszleten($_GET["input_id"]); ?>