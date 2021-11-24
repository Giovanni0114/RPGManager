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
	$player= $_POST['player']; 


	
	$db = mysqli_connect("localhost", "root", "", "rpg");

	$query = "INSERT INTO `tbcharacter`(`character_id`,`first_name`, `last_name`, `species_id`, `apperance_id`, `class_id`, `pd`, `hp`, `str_v`, `dex_v`, `int_v`, `prof_bonus`, `player_id`) VALUES ($id,'$fname','$lname',$species, $app, $class, $pd, $hp, $str, $dex, $int, $prof, $player)";

	// $result = mysqli_query($db, $query);
	
	if ($db->query($query) === TRUE) {
		echo "New record created successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();
?>

<script>
	window.location.assign("characters.php?id=<?php echo $id?>")
</script>