<?php
$db = mysqli_connect("localhost", "root", "", "rpg");

    $query = "SELECT COUNT(character_id) FROM tbcharacter";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
        $count = $row['COUNT(character_id)'];

    $_SESSION['c_id'] = 1;
    if (isset($_GET['id']) && $_GET['id'] < $count+1){
        $_SESSION['c_id'] = $_GET['id'];
    }


    $query = "SELECT * FROM tbcharacter JOIN tbclass ON tbcharacter.class_id=tbclass.class_id JOIN tbspecies ON tbspecies.species_id = tbcharacter.species_id JOIN tbapperance ON tbcharacter.apperance_id = tbapperance.apperance_id  WHERE tbcharacter.character_id =".$_SESSION['c_id'];
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        $id = $row['character_id'];

        // echo implode(" ", $row);
        // echo "<tr>";
        // echo "<td>".$row['first_name']."</td>";
        $f_name = $row["first_name"];
        $l_name = $row["last_name"];
        

        $str = $row['str_v'];
        $dex = $row['dex_v'];
        $int = $row['int_v'];
        
        $hp = $row['hp'];
        $pd = $row['pd'];
        $prof = $row['prof_bonus'];

        // echo "<td>".$row['last_name']."</td>";
        
        // echo "<td>".$row['phone_number']."</td>";
        $class = $row['class_name'];
        
        // echo "<td>".$row['hours_played']."</td>";
        $species = $row['species_name'];
        
        // echo "<td>".$row['class_name']."</td>";
        $apperance = $row['description'];
        $player = $row['player_id'];

        
    }


    $query = "SELECT tbplayer.first_name, tbplayer.last_name, tbplayer.player_id  FROM tbcharacter JOIN tbplayer ON tbplayer.player_id = tbcharacter.player_id WHERE tbcharacter.character_id =".$id;
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result)){

        $p_f_name = $row['first_name'];
        $p_l_name = $row['last_name'];
        $p_id = $row['player_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
        <?php 
            echo $f_name."'s page"
        ?>
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.html">
        <h1>RPG Manager | Character Viewer</h1>
    </a>

    <div id="label">
        <?php
            for ($i = 0; $i < $count; $i++){
                echo "<a href='characters.php?id=".($i+1)."'> ";
                echo "<div class='counting ";
                if($i + 1 == $_SESSION['c_id']) echo "selected";
                echo "'style='--mod:".(80/$count)."%;'>".($i+1)."</div>";
                echo "</a>";
            }
            ?>
    </div>

    <div id="contener">
        <div class="playerinfo">
        <h2>Character Info</h2>
        <div class="place">
                <div class="l">Name</div>
                <div class="content">
                    <span>
                        <?php echo $f_name." ".$l_name?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="place">
                <div class="l">Species</div>
                <div class="content">
                    <?php echo $species ?>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="place">
                <div class="l">Class</div>
                <div class="content">
                    <?php echo $class ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="place">
                <div class="l">Apperance</div>
                <div class="content">
                    <?php echo $apperance ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            

        </div>
        <div class="playerinfo">
            <h2>Stats</h2>
            <div class="place">
                <div class="l" style="width: 22%">STR</div>
                <div class="content" style="width: 10%">
                    <?php echo $str ?>
                </div>

                <div class="l" style="width: 15%">DEX</div>
                <div class="content" style="width: 10%">
                    <?php echo $str ?>
                </div>

                <div class="l" style="width: 15%">INT</div>
                <div class="content" style="width: 10%">
                    <?php echo $int ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="place">
                <div class="l" style="width: 35%">HP</div>
                <div class="content" style="width: 10%">
                    <?php echo $hp ?>
                </div>

                <div class="l" style="width: 15%">PD</div>
                <div class="content" style="width: 10%">
                    <?php echo $pd ?>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="place">
                <div class="l">Proficiency</div>
                <div class="content">
                    <?php echo $prof ?>
                </div>
                <div style="clear: both;"></div>
            </div>
            
            <div class="place">
                <a href="players.php?id=<?php echo $p_id;?>">
                <div class="l">Player</div>
                <div class="content">
                    <?php echo $p_f_name." ".$p_l_name ?>
                </div>
                <div style="clear: both;"></div>
                </a>
            </div>
            
        </div>

    </div>


    <div id="nav">
        <a href="character_mod.php?id=<?php echo $_SESSION['c_id'] ?>">
        <input type="button" value="EDIT" id="edit">
        <a>

        <?php 
        if($_SESSION['c_id'] == 1){
            echo "<input type='button' value='<<' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
        echo "<a href='characters.php?id=1'>";
        echo "<input type='button' value='<<'>";
            echo "</a>";
        }

        if($_SESSION['c_id'] == 1){
            echo "<input type='button' value='<' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
        echo "<a href='characters.php?id=".($_SESSION['c_id']-1)."'>";
        echo "<input type='button' value='<'>";
            echo "</a>";
        }

        if($_SESSION['c_id'] == $count){
            echo "<input type='button' value='>' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
            echo "<a href='characters.php?id=".($_SESSION['c_id']+1)."'>";
            echo "<input type='button' value='>'>";
            echo "</a>";
        }

        if($_SESSION['c_id'] == $count){
            echo "<input type='button' value='>>' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
            echo "<a href='characters.php?id=".$count."'>";
            echo "<input type='button' value='>>'>";
            echo "</a>";
        }
        
        ?>

        <a href="character_mod.php?nip=<?php echo $count + 1?>">
            <input type="button" value="ADD NEW" id="add">
        </a>
    </div>
<script src="script.js"> </script>
</body>
</html>