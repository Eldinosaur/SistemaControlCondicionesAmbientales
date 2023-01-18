#include <ESP8266WiFi.h>
const char* ssid = "KARINA LOPEZ";    //SSID de la red a conectarse
const char* password = "1802918498";  //password de la red
const char* host = "192.168.100.7";   //ip del servidor a mandar la info
const int port = 80;                  //puerto del servidor
const int watchdog = 5000;            //frecuencia del watchdog - tiempo de espera cuando no responde el server
unsigned long previousMillis = millis();


#include "DHT.h"       //incluye la libreria del sensor
#define DHTTYPE DHT11  //define el sensor

#define dht_dpin 0  //definimos en el puerto que se conecta
DHT dht(dht_dpin, DHTTYPE);


void setup(void) {
  Serial.begin(9600);  //inicializamos la consola serial

  WiFi.begin(ssid, password);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.println("SSID: ");
  Serial.println(WiFi.SSID());
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());

  dht.begin();  //inicializamos la libreria

  Serial.println("Humedad y Temperatura\n\n");
  delay(700);
}

void loop() {
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  int inv = 1;
  Serial.print("Humedad = ");
  Serial.print(h);
  Serial.print("%   ");
  Serial.print("Temperatura = ");
  Serial.print(t);
  Serial.println("C  ");


  unsigned long currentMillis = millis();


  if ( currentMillis - previousMillis > watchdog ) {
    previousMillis = currentMillis;
    WiFiClient client;

    if (!client.connect(host, port)) {
      Serial.println("Fallo al conectar");
      return;
    }

    //armamos la url con los parametros del proyecto
    String url = "/proyecto/sistema/servicios/registrosTH.php?temp=";
    url += t;
    url += "&hum=";
    url += h;
    url += "&inv=";
    url += inv;


    //  Enviamos peticion al servidor
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" + 
               "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 5000) {
        Serial.println(" >>> Client Timeout! <<<");
        client.stop();
        return;
      }
    }

    //leemos la respuesta del servidor
    while (client.available()) {
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
  }



  delay(10000);
}
