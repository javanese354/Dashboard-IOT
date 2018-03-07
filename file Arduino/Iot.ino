#include <Servo.h>
#include "HX711.h"
#include <ESP8266WiFi.h>
#include <Servo.h> 
#include <pgmspace.h>
#include <Wire.h> 

WiFiClient client;

HX711 scale(D5,D6);
   
char ssid[] = "Anonymous"; //nama wifi
char password[] = "orangerti"; //password wifi

const char* host = "flammable.space";      //koneksi web server
const int httpPort = 80;

String url;
int reconnect=0;

int sensorgas = A0;
int buzzer = D0;
int flame = D1;
int rst = D4;
int led1 = D3;
int led2 = D7;
int led3 = D8;

int ambang = 400;
int api;
int gas;
int pos;

float calibration_factor = -96;
float berat;
float ounces;

Servo regulator;

void setup() 
{  
  pinMode(led1, OUTPUT);
  pinMode(led2, OUTPUT);
  pinMode(led3, OUTPUT);
  Serial.begin(9600);
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid,password);  
  
  if (WiFi.status() != WL_CONNECTED) {
  delay(500);
  Serial.println();
  Serial.println();
  Serial.print("Menghubungkan ke: ");
  Serial.println(ssid);
  Serial.println("Sedang Menghubungkan");  
  }
  
  Serial.println("Terhubung");
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  Serial.print("compiled: ");
  Serial.print(__DATE__);
  Serial.println(__TIME__);
    
  pinMode (rst, INPUT);
  pinMode(buzzer, OUTPUT);
  
  pinMode(sensorgas, INPUT);
  pinMode(flame, INPUT);

  pos=1;
  
  regulator.attach(D2);
  regulator.write(0);
  
  Serial.println("HX711 weighing");
  scale.set_scale(calibration_factor);
  scale.tare();
  //Serial.println("Berat Tabung Gas:");  
}

void loop() 
{   
  digitalWrite(buzzer, LOW);     
  Serial.println("regulator lepas");
  digitalWrite(led2, LOW);
  cek();
  if (digitalRead (rst) == HIGH)
  {    
    digitalWrite(buzzer, HIGH);
    delay(250);          
    regulator.write(180);
    pos=0;
    while(pos==0)
      {  
        digitalWrite(buzzer, LOW);
        Serial.println("regulator terpasang");
        digitalWrite(led2, HIGH);
        cek();
        if (digitalRead (rst) == HIGH)
        {          
          digitalWrite(buzzer, HIGH);
          delay(250);
          regulator.write(0);
          pos = 1;
        }
      }
  }
}

