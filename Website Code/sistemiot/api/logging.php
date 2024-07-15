<?php
include "../config/connectDatabase.php";

$webhookRensponse = json_decode(file_get_contents('php://input'),true);
$topic = $webhookRensponse['topic'];
$payload = $webhookRensponse['payload'];

$topicExplode = explode("/",$topic);
$serial_number = $topicExplode[1];
$jenis_modul = $topicExplode[2];

if($serial_number != "statusdevice"){
    $tipe_modul = $topicExplode[3];
    $sql = "INSERT INTO data (serial_number, sensor_actuator, name, value, mqtt_topic) VALUES ('$serial_number', '$jenis_modul', '$tipe_modul',' $payload', '$topic')";
    $result = mysqli_query($conn, $sql);
}
?>