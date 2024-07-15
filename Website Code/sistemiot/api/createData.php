<?php
include "../config/connectDatabase.php";

$sql_createData = "INSERT INTO data (serial_number,sensor_actuator,name,value,mqtt_topic) VALUES ('123452','sensor','Turbidity','622','sistemiot/turbidity')";
$resultCreateData = mysqli_query($conn, $sql_createData);

if($resultCreateData){
    echo "Data successfull added";
}else{
    echo "Data not successfull added";
}
?>