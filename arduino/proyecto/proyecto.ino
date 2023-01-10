
#include "DHT.h"       //incluye la libreria del sensor
#define DHTTYPE DHT11  //define el sensor

#define dht_dpin 0  //definimos en el puerto que se conecta
DHT dht(dht_dpin, DHTTYPE);

void setup(void) {
  dht.begin();         //inicializamos la libreria
  Serial.begin(9600);  //inicializamos la consola serial
  Serial.println("Humedad y Temperatura\n\n");
  delay(700);
}

void loop() {
  float h = dht.readHumidity();
  float t = dht.readTemperature();
  Serial.print("Humedad = ");
  Serial.print(h);
  Serial.print("%   ");
  Serial.print("Temperatura = ");
  Serial.print(t);
  Serial.println("C  ");
  delay(8000);
}
