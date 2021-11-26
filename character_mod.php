<?php
	$edit = false;

	if (isset($_GET['id'])) {
		$edit = true;

			$db = mysqli_connect("localhost", "root", "", "rpg");
			$query = "SELECT * FROM tbcharacter WHERE tbcharacter.character_id =".$_GET['id'];
			$result = mysqli_query($db, $query);
    		while ($row = mysqli_fetch_array  ($result))
    		{
			$id = $row['character_id'];
			$f_name = $row["first_name"];
		        $l_name = $row["last_name"];
        

			$str = $row['str_v'];
			$dex = $row['dex_v'];
			$int = $row['int_v'];
			
			$hp = $row['hp'];
			$pd = $row['pd'];
			$prof = $row['prof_bonus'];

			$class = $row['class_id'];
			$species = $row['species_id'];
			$apperance = $row['apperance_id'];
			$player = $row['player_id'];
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
		else echo "<title>New Character</title>"
	?>
</head>
<body>

<a href="index.html">
	<?php
		if ($edit) echo "<h1>RPG Manager | Character Editor</h1>";
		else echo "<h1>RPG Manager | Character Creator</h1>"
	?>
</a>

<?PHP
if ($edit)	
echo "<form action='update_character.php' method='post'>";
else
echo "<form action='add_character.php' method='post'>";
?>
	

<input type="text" name="fname" id="fname" placeholder="First name"
	value="<?php echo ($edit)?$f_name:'';?>">
	<input type="text" name="lname" id="lname" placeholder="Last name"
	value="<?php echo ($edit)?$l_name:'';?>">
	

	<br>

	<select name="class" id="class">
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

	<select name="species" id="species">
		<option value="0">Species</option>
	<?php
	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "SELECT species_id, species_name FROM tbspecies";
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_array($result)){
		echo "<option value=".$row['species_id']." ".(($edit && $row['species_id'] == $species)?'selected':'').">";
		echo $row['species_name'];
		echo "</option>";
	}
	?>
	</select>

	<select name="app" id="app">
		<option value="0">Apperance</option>
	<?php
	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "SELECT apperance_id, description FROM tbapperance";
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_array($result)){
		echo "<option value=".$row['apperance_id']." ".(($edit && $row['apperance_id'] == $apperance)?'selected':'').">";
		echo $row['description'];
		echo "</option>";
	}
	?>
	</select>
	<br>
	<div style="width: 1208px; margin: 0 auto ;">
		<div class="backsite">	
			<label for="str">
				</span><span class='stat_name'>
			Strength
		</span>
		</label>
		<input type="text" name="str" class='stats' 
			value="<?php echo ($edit)?$str:'10';?>">
		<label for="str">0</label>
		<br>
		
		
		<label for="dex">
			<span class='stat_name'>
				Dexterity
			</span>
		</label>
		<input type="text" name="dex" class='stats' 
			value="<?php echo ($edit)?$dex:'10';?>">
			<label for="dex">0</label>
			<br>
			
			<label for="int">
				<span class='stat_name'>
					Inteligence
			</span>
		</label>
		<input type="text" name="int" class='stats' 
		value='<?php echo ($edit)?$int:'10';?>'>
		<label for="int">0</label>
	</div>

	<div class="backsite">	
		<label for="str">
			</span><span class='stat_name'>
			Health
		</span>
		</label>
		<input type="text" name="hp" class='stats' 
			value="<?php echo ($edit)?$hp:'12';?>">
		<br>
		
		
		<label for="dex">
			<span class='stat_name'>
				Proficiency
			</span>
		</label>
		<input type="text" name="prof" class='stats' 
		value="<?php echo ($edit)?$prof:'3';?>">
		<br>
		
		<label for="int">
			<span class='stat_name'>
				Experience
			</span>
		</label>
		<input type="text" name="pd" class='stats' 
		value='<?php echo ($edit)?$pd:'0';?>'>
	</div>
	<div style="clear: both;"> </div>
	
	<div id="cplayer">
	<select name="player" id="player">
		<option value="0">Player</option>
	<?php
	$db = mysqli_connect("localhost", "root", "", "rpg");
	$query = "SELECT player_id, first_name, last_name FROM tbplayer";
	$result = mysqli_query($db, $query);

	while ($row = mysqli_fetch_array($result)){
		echo "<option value=".$row['player_id']." ".(($edit && $row['player_id'] == $player)?'selected':'').">";
		echo $row['first_name']." ".$row['last_name'];
		echo "</option>
		";
	}
	?>
	</select>

	</div>
	
	<input type="hidden" name="id" value="<?php echo $id ?>">

	<a href="characters.php?id=<?php echo $id ?>">
		<input type="button" value="Cancel">
	</a>
	<input type="submit" value="Apply">
	<br>
	<?php
	if ($edit)
		echo '<a href="delete_character.php?id='.$id.'"><input id="del" type="button" value="DELETE"></a>';

	?>
</form>

<script src="script.js"> </script>
<script src="script_mods.js"> </script>
</body>
</html>