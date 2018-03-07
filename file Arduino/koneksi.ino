void koneksi()
{
  if (!client.connect(host, httpPort)) 
  {    
    digitalWrite(led3, LOW);
    digitalWrite(led1, HIGH);
    Serial.println("Gagal Terhubung");
    reconnect++;
    if(reconnect>=5)
    {  
      reconnect=0;
    }
  }
  else
  {
    Serial.print("connecting to ");
    Serial.println(host);
    
    // Use WiFiClient class to create TCP connections
    WiFiClient client;
    const int httpPort = 80;
    if (!client.connect(host, httpPort)) {
      Serial.println("connection failed");
      return;
    }
      // We now create a URI for the request
    String url = "/update.php?/";
    url += "&gas=";
    url += gas;
    url += "&api=";
    url += api;
    url += "&posisi=";
    url += pos;
    url += "&berat=";
    url += berat;
    
    Serial.print("Requesting URL: ");
    Serial.println(url);

    // This will send the request to the server
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" + 
                 "Connection: close\r\n\r\n");
    unsigned long timeout = millis();
    while (client.available() == 0) {
      if (millis() - timeout > 5000) {
        Serial.println(">>> Client Timeout !");
        client.stop();
        return;
      }
    }
    
    // Read all the lines of the reply from server and print them to Serial
    while(client.available()){
      String line = client.readStringUntil('\r');
      Serial.print(line);
    }
    
    digitalWrite(led1, LOW);     
    digitalWrite(led3, HIGH);
    
    delay(2000);
  }
}

