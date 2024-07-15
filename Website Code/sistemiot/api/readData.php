<?php
include "../config/connectDatabase.php";

$sql_readData = "SELECT * FROM data where id = 3";

$resultSqlReadData = mysqli_query($conn, $sql_readData);

while($result = mysqli_fetch_assoc($resultSqlReadData)){
    echo $result['serial_number'];
}
?>