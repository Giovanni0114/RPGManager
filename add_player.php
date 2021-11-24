<?php
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$p_number = $_POST['p_number'];
	$fav = $_POST['fav'];
	$id = $_POST['id'];
	$h_played = $_POST['h_played'];


	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "INSERT INTO `tbplayer`(`player_id`, `first_name`, `last_name`, `phone_number`, `fav_class`, `hours_played`) VALUES ($id,'$fname','$lname','$p_number',$fav,'$h_played')";

	if ($db->query($query) === TRUE) {
		echo "New record created successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();
?>

<script>
	window.location.assign("players.php?id=<?php echo $id?>")
</script>