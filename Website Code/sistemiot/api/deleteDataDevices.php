<?php
include "../config/connectDatabase.php";

if(isset($_GET['deleteAct'])){
    $serial_number = $_GET['serial_number'];
    $sql_deleteData = "DELETE FROM devices WHERE serial_number = $serial_number";
    $resultdeleteData = mysqli_query($conn, $sql_deleteData);
}


if($resultdeleteData){
    header("sistemiot.test/?pages=devices");
}else{
    echo "Data not successfull deleted";
}
?>