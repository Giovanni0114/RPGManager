<?php
    $db = mysqli_connect("localhost", "root", "", "rpg");


    $query = "SELECT COUNT(player_id) FROM tbplayer";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
        $count = $row['COUNT(player_id)'];

    $_SESSION['p_id'] = 1;
    if (isset($_GET['id']) && $_GET['id'] < $count+1){
        $_SESSION['p_id'] = $_GET['id'];
    }



    $query = "SELECT first_name, last_name, phone_number, hours_played, class_name FROM tbplayer JOIN tbclass ON fav_class=class_id WHERE player_id=".$_SESSION['p_id'];
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        // echo "<td>".$row['first_name']."</td>";
        $f_name = $row['first_name'];
        
        // echo "<td>".$row['last_name']."</td>";
        $l_name = $row['last_name'];
        
        // echo "<td>".$row['phone_number']."</td>";
        $p_number = $row['phone_number'];
        
        // echo "<td>".$row['hours_played']."</td>";
        $h_played = $row['hours_played'];
        
        // echo "<td>".$row['class_name']."</td>";
        $fav_class = $row['class_name'];
    }
    
    $query = "SELECT COUNT(player_id) FROM tbplayer";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
        $count = $row['COUNT(player_id)'];
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
        <h1>RPG Manager | Player Viewer</h1>
    </a>
    
    <div id="label">
        <?php
            for ($i = 0; $i < $count; $i++){
                echo "<a href='players.php?id=".($i+1)."'> ";
                echo "<div class='counting ";
                if($i + 1 == $_SESSION['p_id']) echo "selected";
                echo "'style='--mod:".(80/$count)."%;'>".($i+1)."</div>";
                echo "</a>";
            }
        ?>
    </div>
    <div id="contener">
        <div class="playerinfo">
        <h2>Personal Info</h2>

            <div class="place" style="margin-top:40px;">
                <div class="l">First name</div>
                <div class="content">
                    <span>
                        <?php echo $f_name ?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="place">
                <div class="l">Last name</div>
                <div class="content">
                    <?php echo $l_name ?>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="place">
                <div class="l">Phone number</div>
                <div class="content">
                    <?php echo $p_number ?>
                </div>
                <div style="clear: both;"></div>
            </div>


        </div>
        <div class="playerinfo">
            <h2>Gameplay Info</h2>

            <div class="place" style="margin-top:40px;">
                <div class="l">Hours played</div>
                <div class="content">
                    <span>  
                        <?php echo $h_played ?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>

            <div class="place" style="margin-top:40px;">
                <div class="l">Favourite class</div>
                <div class="content">
                    <span>  
                        <?php
                         echo $fav_class 
                         ?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>

            <h3>Characters</h3>
                <?php
                     $query = "SELECT tbcharacter.first_name, tbcharacter.last_name, tbcharacter.character_id FROM tbcharacter JOIN tbplayer ON tbplayer.player_id = tbcharacter.player_id WHERE tbplayer.player_id =".$_GET['id'];
                     $result = mysqli_query($db, $query);
                     while ($row = mysqli_fetch_array  ($result))
                     {
                        $d = mysqli_connect("localhost", "root", "", "rpg");
                         
                         $chad_id = $row['character_id'];
                         $f = $row['first_name'];
                         $l = $row['last_name'];
                        $q = "SELECT tbclass.class_name, tbapperance.description, tbspecies.species_name FROM tbcharacter JOIN tbclass ON tbcharacter.class_id=tbclass.class_id JOIN tbspecies ON tbspecies.species_id = tbcharacter.species_id JOIN tbapperance ON tbcharacter.apperance_id = tbapperance.apperance_id  WHERE tbcharacter.character_id="   .$chad_id;
                        $r = mysqli_query($d, $q);
                        while ($ro = mysqli_fetch_array ($r))
                        {
                            $cl = $ro['class_name'];
                            $app = $ro['description'];
                            $spe = $ro['species_name'];
                        }


                        echo "<a href='characters.php?id=$chad_id'>";
                        echo "<div class='char_list'><b>$f $l</b> - $app $spe $cl</div>";
                        echo "</a>";

                     }

                ?>

            
        </div>
        <div style="clear: both;"></div>
    </div>




    <div id="nav">

        <a href="player_mod.php?id=<?php echo $_GET['id'] ?>">
            <input type="button" value="EDIT" id="edit">
        </a>

        <?php 
        if($_SESSION['p_id'] == 1){
            echo "<input type='button' value='<<' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
        echo "<a href='players.php?id=1'>";
        echo "<input type='button' value='<<'>";
            echo "</a>";
        }

        if($_SESSION['p_id'] == 1){
            echo "<input type='button' value='<' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
        echo "<a href='players.php?id=".($_SESSION['p_id']-1)."'>";
        echo "<input type='button' value='<'>";
            echo "</a>";
        }

        if($_SESSION['p_id'] == $count){
            echo "<input type='button' value='>' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
            echo "<a href='players.php?id=".($_SESSION['p_id']+1)."'>";
            echo "<input type='button' value='>'>";
            echo "</a>";
        }

        if($_SESSION['p_id'] == $count){
            echo "<input type='button' value='>>' ";
            echo "disabled='true' style='pointer-events:none; cursor: finger;'";
            echo ">";
        }
        else{
            echo "<a href='players.php?id=".$count."'>";
            echo "<input type='button' value='>>'>";
            echo "</a>";
        }
        
        ?>

        <a href="player_mod.php?nip=<?php echo $count + 1?>">
            <input type="button" value="ADD NEW" id="add">
        </a>
    </div>
<script src="script.js"> </script>
<script src="arrow_navigation.js"> </script>

</body>

</html>