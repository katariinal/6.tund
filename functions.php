<?php  
    require_once("../config_global.php");
    $database = "if15_klinde";
    
    function getAllData(){
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
        $stmt->execute();
        //iga rea kohta, mis on andmebaasis, teeme midagi 
        $row_nr = 0;
        // iga rea kohta mis on ab'is teeme midagi
        
        echo "<table border=1>";
        echo "<tr><th>rea nr</th><th>auto nr märk</th></tr>";
        while($stmt->fetch()){
            //saime andmed kätte
            //echo $row_nr." ".$number_plate_from_db." <br>";
            
            echo "<tr>";
            echo "<td>".$row_nr."</td>";
            echo "<td>".$number_plate_from_db."</td>";
            echo "</tr>";
            
            $row_nr++;
        }
        echo "</table>";
        
        /*while($stmt->fetch()){
            //saime andmed kätte
            echo($number_plate_from_db);
            
            //? kuidas saada massiivi
            
        }*/
        $stmt->close();
        $mysqli->close();
    }
    
 ?>