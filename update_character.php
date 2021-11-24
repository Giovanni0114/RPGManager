<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$species= $_POST['species'];
	$app= $_POST['app'];
	$class= $_POST['class'];
	$pd= $_POST['pd'];
	$hp= $_POST['hp'];
	$str= $_POST['str'];
	$dex= $_POST['dex'];
	$int= $_POST['int'];
	$prof= $_POST['prof'];
	$id= $_POST['id'];


	
	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "UPDATE `tbcharacter` SET `first_name`='$fname',`last_name`='$lname',`species_id`=$species,`apperance_id`=$app,`class_id`=$class,`pd`=$pd,`hp`=$hp,`str_v`=$str,`dex_v`=$dex,`int_v`=$int,`prof_bonus`=$prof WHERE `character_id` = $id";

	$result = mysqli_query($db, $query);
	header("Location:characters.php?id=$id");
?>