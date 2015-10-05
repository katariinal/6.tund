<?php  
    require_once("../config_global.php");
    $database = "if15_klinde";
    
    function getAllData(){
        $mysqli = new mysqli($GLOBALS["servername"], $GLOBALS["server_username"], $GLOBALS["server_password"], $GLOBALS["database"]);
        $stmt = $mysqli->prepare("SELECT id, user_id, number_plate, color FROM car_plates");
        $stmt->bind_result($id_from_db, $user_id_from_db, $number_plate_from_db, $color_from_db);
        $stmt->execute();
  
        // iga rea kohta mis on ab'is teeme midagi
        
        //massii, kus hoiame autosid
        $array = array(); 
        
        while($stmt->fetch()){
            //suvaline muutuja, kus hoida auto andmeid, hetkeni kuni lisame massiivi
            
            //tühi objekt, kus hoiame väärtuseid
            $car = new StdClass();
            $car->id = $id_from_db;
            $car->number_plate = $number_plate_from_db;
            
            //lisan massiivi - auto lisan massiivi
            array_push($array, $car);
            //echo "<pre>";
            //var_dump($array); 
            //echo "</pre>";
            
        }
        //saadan tagasi
        return $array;
        
        $stmt->close();
        $mysqli->close();
    }
    
 ?>