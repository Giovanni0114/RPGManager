<?php
	$edit = false;

	if (isset($_GET['id'])) {
		$edit = true;

			$db = mysqli_connect("localhost", "root", "", "rpg");
			$query = "SELECT * FROM tbplayer WHERE tbplayer.player_id =".$_GET['id'];
			$result = mysqli_query($db, $query);
    		while ($row = mysqli_fetch_array  ($result))
    		{
			$f_name = $row["first_name"];
		        $l_name = $row["last_name"];
			
			$h_played = $row['hours_played'];

			$p_number = $row["phone_number"];
			$id = $_GET['id'];

			$class = $row['fav_class'];
		}
	}
	else{
		$id = $_GET['nip'];
	}

	
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" href="style.css">

	<?php
		if ($edit) echo "<title>Edit $f_name</title>";
		else echo "<title>New Player</title>"
	?>
</head>
<body>

<a href="index.html">
	<?php
		if ($edit) echo "<h1>RPG Manager | Player Editor</h1>";
		else echo "<h1>RPG Manager | Player Creator</h1>"
	?>
</a>

<?PHP
if ($edit)	
echo "<form action='update_player.php' method='post'>";
else
echo "<form action='add_player.php' method='post'>";
?>
	

<input type="text" name="fname" id="fname" placeholder="First name"
	value="<?php echo ($edit)?$f_name:'';?>">
	<input type="text" name="lname" id="lname" placeholder="Last name"
	value="<?php echo ($edit)?$l_name:'';?>">
	

	<br>
	
	<div style="display: inline-block;">
		<label for="p_number">Phone number</label>
		<input type="text" name="p_number" style="margin-top: 0;" id="p_number" value="<?php echo ($edit)?$p_number:'' ?>">
	</div>
	<div style="display: inline-block;">
		<label for="h_played">Hours played</label>
		<input type="text" name="h_played" style="margin-top: 0;" id="h_played" value="<?php echo ($edit)?$h_played:'' ?>">
	</div>

	<div style="clear: both;"></div>
	<br>
	
	
	<div id="cplayer">
	
	<label for="fav">Favourite class</label>
	<select name="fav" id="fav">
		<option value="0">Class</option>
	<?php
	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "SELECT class_id, class_name FROM tbclass";
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_array($result)){
		echo "<option value=".$row['class_id']." ".(($edit && $row['class_id'] == $class)?'selected':'').">";
		echo $row['class_name'];
		echo "</option>";
	}
	?>
	</select>

	</div>
	
	<input type="hidden" name="id" value="<?php echo $id ?>">

	<a href="players.php?id=<?php echo $id ?>">
		<input type="button" value="Cancel">
	</a>
	<input type="submit" value="Apply">
<br>
<br>
<br>
<?php
if ($edit)	
echo '<a href="delete_player.php?id='.$id.'"><input id="del" type="button" value="DELETE"></a>';

?>
</form>


<script src="script.js"> </script>
<script src="script_mods.js"> </script>
</body>
</html>