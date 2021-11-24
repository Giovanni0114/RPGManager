<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$p_number = $_POST['p_number'];
	$fav = $_POST['fav'];
	$id = $_POST['id'];
	$h_played = $_POST['h_played'];


	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "UPDATE `tbplayer` SET `first_name`='$fname',`last_name`='$lname',`phone_number`='$p_number',`fav_class`=$fav,`hours_played`=$h_played WHERE player_id = $id";

	$result = mysqli_query($db, $query);
	header("Location:players.php?id=$id");
?>