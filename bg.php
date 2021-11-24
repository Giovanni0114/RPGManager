<table id="res" style="border:none" border=1>
<tr>
    <td><b>NAME</b></td>
    <td><b>Main Advanatage</b></td>
    <td>Advanatage</td>
    <td>Advanatage</td>
    
</tr>
<?php
    $db = mysqli_connect("localhost", "root", "", "rpg");

    $query = "SELECT * FROM tbbackgrounds";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_array  ($result))
    {
        echo "<tr>";
        echo "<td><b>".$row['backgroung_name']."</b></td>";
        echo "<td>".$row['main_advanatage']."</td>";
        echo "<td>".$row['advanatage1']."</td>";
        echo "<td>".$row['advanatage2']."</td>";
        echo "</tr>";
    }

?>

</table>