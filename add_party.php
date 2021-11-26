<?php
	$id = $_POST['id'];
	$name = $_POST['name'];
	$rep = $_POST['rep'];
	$wanted = $_POST['wanted'];

	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "INSERT INTO `tbparty`(`party_id`, `party_name`, `reputation`, `wanted`) VALUES ($id,'$name', $rep, $wanted)";

	if ($db->query($query) === TRUE) {
		echo "New record created successfully";
	      } else {
		echo "Error: " . $query . "<br>" . $db->error;
	      }
	      
	      $db->close();
?>

<script>
	window.location.assign("partys.php?id=<?php echo $id?>")
</script>