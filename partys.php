<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
        NAME
    </title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.html">
        <h1>RPG Manager | Party Viewer</h1>
    </a>

    <div id="label">
        
    </div>

    <div id="contener">
        <div class="playerinfo">
        <h2>Party Info</h2>
        <div class="place">
                <div class="l">Name</div>
                <div class="content">
                    <span>
                        <?php echo $name?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="place">
                <div class="l">Reputation</div>
                <div class="content">
                    <span>
                        <?php echo $rep?>
                    </span>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="place">
                <div class="l">Wanted</div>
                <div class="content">
                    
                    
                </div>
                <div style="clear: both;"></div>
            </div>

        </div>
        <div class="playerinfo">
            <h2>Characters</h2>
            
            
        </div>

    </div>

    
    <!-- TODO Make this shit work. Theres should be a lot of buttons. Extracted to get_party.php-->
    <div id="nav">
        <a href="party_mod.php?id=<?php echo $_SESSION['pa_id'] ?>">
        <input type="button" value="EDIT" id="edit">
        <a>    

        <a href="party_mod.php?nip=<?php echo $count + 1?>">
            <input type="button" value="ADD NEW" id="add">
        </a>
    </div>
<script src="script.js"> </script>
<script src="arrow_navigation.js"> </script>

</body>
</html>