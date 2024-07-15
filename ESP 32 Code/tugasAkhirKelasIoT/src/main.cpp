/***************************************************
Sistem IoT Project
https://github.com/zqarkop/Sistem-IoT-with-MQTT-and-PHP-Mysql
 ***************************************************
 Hardware Device
  ESP32 Dev kit board
  Potensiometer
  DHT22
  LED
  Servo Motor

WEBSITE USER and Embedded Device(ESP32) <--> MQTT Broker <--> MySql Server

 This porject using ESP32 as uC to get data from any sensor and send the data to MQTT broker (shiftr.io)
 MQTT Broker transmit the data to MySql Server via API JSON and MySql server store that data as data history
 The Server also hosting web server (Apache) to monitoring and controling the IoT System

 Created July 2024 By Andi Saputra IG : @andi21262
 ****************************************************/

#include <Arduino.h>
#include <WiFi.h>
#include <MQTT.h>
#include <ESP32Servo.h>
#include <Adafruit_Sensor.h>
#include <DHT_U.h>
#include "DHT.h"

#define DHTPIN 26
#define DHTTYPE DHT22
DHT dht(DHTPIN, DHTTYPE);
WiFiClient net;
MQTTClient client;
Servo myServo;

const char ssid[] = "Your WiFi SSID";
const char pass[] = "Your Password SSID";
const char serial_number_esp32[] = "Your Serial Number ESP32";
const char servernameBroker[] = "YourServerBroker.com";
const char usernameBroker[] = "YourUserNameServerBroker";
const char passwordBroker[] = "YourPasswordServerBroker";

// YOUR TOPIC MQTT
const String mainTopic = "sistemiot/";
const String tTopic = "/sensor/temperature";
const String tempTopic = mainTopic + serial_number_esp32 + tTopic;
const String hTopic = "/sensor/humidity";
const String humTopic = mainTopic + serial_number_esp32 + hTopic;
const String pTopic = "/sensor/potentio";
const String potTopic = mainTopic + serial_number_esp32 + pTopic;
const String lTopic = "websiteSN/actuator/Lamp";
const String lampTopic = mainTopic + lTopic;
const String seTopic = "websiteSN/actuator/servo";
const String servoTopic = mainTopic + seTopic;
const String sTopic = "statusdevice/";
const String statusTopic = mainTopic + sTopic + serial_number_esp32;

const int ledIndikator = 12;
const int pinServo = 13;
const int lamp = 33;
const int potPin = 32;
int value = 0;
int pot = 0;
float h = 0;
float t = 0;
unsigned long currentMillis, startMillis;

void connectWiFi(){
  Serial.print("Connecting to WiFi");
  while(WiFi.status() != WL_CONNECTED){
    Serial.print(".");
    delay(100);
  }
  Serial.println("Connected to Wifi");
}

void connectBroker(){
  Serial.println("Connecting to broker");
  while (!client.connect(serial_number_esp32, usernameBroker, passwordBroker)) {
    Serial.print(".");
    delay(1000);
  }
  Serial.println("Connected to broker");
  digitalWrite(ledIndikator, 1);
  client.publish(statusTopic, "Online", true, 1);
  client.subscribe(mainTopic + "#");
}

void action(String &topic, String &payload){
  if(topic == lampTopic){
    if(payload == "on"){
      digitalWrite(lamp, HIGH);
    }else{
      digitalWrite(lamp, LOW);
    }
  }
  if(topic == servoTopic){
    myServo.write(payload.toInt());
  }
}

void publishData(){
  client.publish(tempTopic, String(t), true, 1);
  client.publish(humTopic, String(h), true, 1);
  client.publish(potTopic, String(pot), true, 1);
}

void connect(){
  connectWiFi();
  connectBroker();
}

void setup() {
  pinMode(ledIndikator, OUTPUT);
  pinMode(lamp, OUTPUT);
  pinMode(potPin, INPUT);
  dht.begin();
  myServo.attach(pinServo);
  Serial.begin(9600);
  WiFi.begin(ssid,pass);
  client.begin(servernameBroker, net);
  client.setWill(statusTopic.c_str(), "Offline", true, 1);
  connectWiFi();
  connectBroker();
  client.onMessage(action);
}

void loop() {
  currentMillis = millis();
  value = analogRead(potPin);
  pot = map(value,0,4098,0,100);
  h = dht.readHumidity();
  t = dht.readTemperature();
  client.loop();
  
  if (!client.connected()) { //function for reconnect wifi and broker if disconnected
    connect();
    client.publish(statusTopic, "Online", true, 1);
  }
  if (currentMillis - startMillis >= 5000){ //publish data every 5 seconds
    publishData();
    startMillis = currentMillis;
  }
}