<?php  
    require_once("../config_global.php");
    $database = "if15_klinde";
    

    
    function getAllData(){
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
        $stmt->execute();
        //iga rea kohta, mis on andmebaasis, teeme midagi 
        while($stmt->fetch()){
            //saime andmed kätte
            echo($number_plate_from_db);
            
            //? kuidas saada massiivi
            
        }
        $stmt->close();
        $mysqli->close();
    }
    
 ?>