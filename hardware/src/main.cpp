#include <HTTPClient.h>
#include <WiFi.h>

const char *ssid = "";
const char *password = "";

void setup()
{
    Serial.begin(115200);
    WiFi.begin(ssid, password);

    while (WiFi.status() != WL_CONNECTED)
    {
        delay(1000);
        Serial.println("Menghubungkan ke WiFi...");
    }

    Serial.println("Terhubung ke WiFi!");
    Serial.println(WiFi.localIP());

    HTTPClient http;
    http.begin("http://127.0.0.1:8000/log-suara");
    http.addHeader("Content-Type", "application/json");
    http.POST("{\"suara\": \"A\"}");
    http.end();
}