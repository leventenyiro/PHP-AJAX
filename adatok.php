<?php
    include("classes.php");
	$adatok = new Adatbazis();
	$adatok->adatok($_GET["input_id"]); ?>	