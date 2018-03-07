void cek()
{ 
  gas = analogRead(sensorgas);
  api = digitalRead(flame);
  if ((gas > ambang) || (api == 0))
     {    
       regulator.write(0);
       digitalWrite (buzzer, HIGH);
       pos=1;
     }
  Serial.print("Gas: ");
  Serial.println(gas);
  Serial.print("Api: ");
  Serial.println(api);
  Serial.print("Posisi Regulator: ");
  Serial.println(pos);
  Serial.print("Berat Tabung Gas:");
  berat = scale.get_units(),10;
  if (berat < 0)
     {
       berat = 0.00;
     }
  ounces = berat * 0.035274;
  Serial.print(berat);
  Serial.println(" grams");  
  delay(100);
  koneksi();
}

