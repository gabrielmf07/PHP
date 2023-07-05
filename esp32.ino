#include <WiFi.h>
#include <PubSubClient.h>

//// DEFINE VARIABLES 
  // Configuración de la red Wi-Fi
  const char* ssid = "ositoperu";
  const char* password = "GIfM9L2fdf";

  // Configuración del servidor MQTT
  const char* mqtt_server = "3.12.64.151";
  const int mqtt_port = 1883;

  // Configuración del tópico MQTT
  const char* subscribe_topic = "control/led";
  const char* publish_topic = "estado/led";

  // Configuración del pin del LEDX
  const int ledPin = 13;

  // Cliente Wi-Fi y cliente MQTT
  WiFiClient wifiClient;
  PubSubClient client(wifiClient);

  cont string msg 

//// DEFINE FUNCIONES 
  // Función de callback para recibir mensajes MQTT
  void callback(char* topic, byte* payload, unsigned int length) {
    Serial.print("Mensaje recibido - Tópico: ");
    Serial.print(topic);
    Serial.print(", Mensaje: ");
    String message = "";
    for (int i = 0; i < length; i++) {
      message += (char)payload[i];
    }

    Serial.println(message);

    // Encender o apagar el LED en función del mensaje recibido
    if (message == "encender") {
      digitalWrite(ledPin, HIGH);
    } else if (message == "apagar") {
      digitalWrite(ledPin, LOW);
    }
  }

//// DEFINE SETUP
  void setup() {
    // Inicialización del pin del LED como salida
    pinMode(ledPin, OUTPUT);
    
    // Iniciar comunicación serial
    Serial.begin(115200);

    // Conexión a la red Wi-Fi
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
      delay(1000);
      Serial.println("Conectando a Wi-Fi...");
    }
    Serial.println("Conexión Wi-Fi establecida");
    
    // Configuración del servidor MQTT y función de callback
    client.setServer(mqtt_server, mqtt_port);
    client.setCallback(callback);

    // Conexión al servidor MQTT
    while (!client.connected()) {
      if (client.connect("esp32-client")) {
        Serial.println("Conexión MQTT establecida");
        client.subscribe(subscribe_topic);
      } else {
        Serial.print("Error en la conexión MQTT - Código de estado: ");
        Serial.println(client.state());
        delay(2000);
      }
    }
  }

//// DEFINE EL LOOP
  void loop() {
    // Verificar la conexión MQTT y mantenerla activa
    if (!client.connected()) {
      if (client.connect("esp32-client")) {
        Serial.println("Conexión MQTT restablecida");
        client.subscribe(subscribe_topic);
      } else {
        Serial.print("Error en la conexión MQTT - Código de estado: ");
        Serial.println(client.state());
        delay(2000);
        return;
      }
    }
    client.loop();
    
    // Publicar el estado actual del LED en el tópico MQTT
    String ledState = digitalRead(ledPin) == HIGH ? "encendido" : "apagado";
    client.publish(publish_topic, ledState.c_str());

    // Realizar otras operaciones o lógica adicional aquí
    
    delay(1000);
  }
