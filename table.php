<?php 
    require_once("functions.php");
    
    //kuulan, kas kasutaja tahab kustutada
    if(isset($_GET["delete"])){
        //saadan kustutatava auto id
        deleteCarData($_GET["delete"]);
    }
    
    //kõik autod objektide kujul massiivis
    $car_array = getAllData();
?>

<h1>Tabel</h1>
<table border=1>
<tr>
    <th>id</th>
    <th>Kasutaja id</th>
    <th>Auto numbri märk</th>
    <th>Värv</th>
    <th>Kustuta</th>
    <th>Muuda</th>
</tr>
<?php
    //autod ükshaaval läbi käia
    for($i = 0; $i < count($car_array); $i++){
        
        //kasutaja tahab rida muuta
        if(isset($_GET["edit"]) && $_GET["edit"] == $car_array[$i]->id){
            echo "<tr>";
            echo "<td>".$car_array[$i]->id."</td>";
            echo "<td>".$car_array[$i]->user_id."</td>";
            echo "<td><input name='number_plate' value='".$car_array[$i]->number_plate."'></td>";
            echo "<td><input name='color' value='".$car_array[$i]->color."'></td>";            
            echo "<td><a href='?table.php=".$car_array[$i]->id."'>Katkesta</a></td>";
            echo "<td><a href='?update=".$car_array[$i]->id."'>Salvesta</a></td>";

            echo "</tr>";
        }else{
            //lihtne vaade
            echo "<tr>";
            echo "<td>".$car_array[$i]->id."</td>";
            echo "<td>".$car_array[$i]->user_id."</td>";
            echo "<td>".$car_array[$i]->number_plate."</td>";
            echo "<td>".$car_array[$i]->color."</td>";
            echo "<td><a href='?delete=".$car_array[$i]->id."'>X</a></td>";
            echo "<td><a href='?edit=".$car_array[$i]->id."'>Muuda</a></td>";
            echo "</tr>";
            
        }
        
        
    }
    
?>
</table>