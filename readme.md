# IoT System with MQTT and PHP Mysql

## Description
This porject using ESP32 as uC to get data from any sensor and send the data to MQTT broker (mosquitto). <br>
MQTT Broker transmit the data to MySql Server via Node-Red and store that data as data history <br>
The Server also hosting web server (Apache2) to monitoring and controling the IoT System

## Hardware Device
* Computer Server
* ESP32 Dev kit board 
* Potensiometer
* Sensor DHT22
* LED Notification
* Relay Optocoupler
* Servo Motor

## Wiring Diagram
| ESP32     | DHT22    | Potentiometer    | Servo Motor    | LED Notif    | Relay    |
| --------|---------|---------|---------|---------|---------|
| 5V  | +   | Left   | +   |    | +   |
| GND  | - | Right | - | - | - |
|26|||5V|||
|32||Mid||||
|13|||S|||
|12||||+||
|33|||||Out|


## Flow System
![ALT TEXT](Flow%20sistem.jpg)
****************************************************
Created July 2024 By Andi Saputra IG : @andi21262