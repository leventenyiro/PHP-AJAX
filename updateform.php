<?php
    include("classes.php");
	$updateForm = new Adatbazis();
	$updateForm->updateForm($_GET["input_id"]); ?>