#define NODE_addr  15
    #include <SoftwareSerial.h>
    #define PC  Serial
    //#define nodeWifi  PC

    #define RX_pin  A1
    #define TX_pin  A0
    SoftwareSerial nodeWifi(RX_pin, TX_pin);

    #include "uCRC16Lib.h"

    #define LED           13

    #include <OneWire.h>

    #define ds18B20pin    11
    #define tMeasDS       1000
    #define tSampleDS     2000

    OneWire  ds(ds18B20pin);
    boolean meas;
    boolean newData;
    byte present = 0;
    byte data[12];
    float celsius;
    unsigned long t_DS;

    byte resetCekDS(int n) {
      present = 1;
      for(int i=0; i<n; i++)  {
        if(present) present = ds.reset();
        else break;
      }
      return present;
    }

    #define pHpin A5            //pH meter pin
    #define pHoffset 0.00             //deviation compensate

    #define tSamplePH     20
    #define pHbufLen      40        // total sample

    int pHbuf[pHbufLen];            // penyimpanan data pH
    int pHbufIdx=0;

    unsigned long t_pH;
    float pHValue,voltage;

    float get_average(int* arr, int number){
      int i;
      double avg;
      long amount=0;
      if(number<=0) return 0;

      for(i=0;i<number;i++){
        amount += arr[i];
      }
      avg = amount/number;
      return avg;
    }

    String rxBuf;
    String txBuf;
    unsigned long t;
    unsigned long t_update;
    boolean updating;

    #define sendInterval  10000
    #define maxTry        5

    #define t_wait        1000

    unsigned long t_send;
    int trySend;
    boolean trying;

    void varInit(){
      t = millis();
      t_pH = t;
      t_DS = t;
      meas = false;
      newData = false;
      trySend = 0;
      trying = false;
    }

    void HWinit(){
      pinMode(LED,OUTPUT);
      nodeWifi.begin(4800);
      PC.begin(9600);

      pinMode(pHpin,INPUT);
    }

    uint16_t getCRC(String &inStr){
      if(inStr.length()==0) return 0xFFFF;
      char tmpChar[256];
      inStr.toCharArray(tmpChar,inStr.length());
      uint16_t ceksum = uCRC16Lib::calculate(tmpChar, inStr.length());
      return ceksum;
    }

    void setup(void)  {
      HWinit();
      varInit();
    }

    void loop(void)
    {
      t = millis();
      if((t-t_pH) > tSamplePH)  {
        t_pH = t;
        pHbuf[pHbufIdx++] = analogRead(pHpin);
        if(pHbufIdx==pHbufLen)      pHbufIdx=0;
      }

      t = millis();
      if(meas) {
        if((t - t_DS) > tMeasDS) {
          if(resetCekDS(5)) {
            ds.skip();
            ds.write(0xBE);         // Read Scratchpad

            for (int i = 0; i < 9; i++) {           // we need 9 bytes
              data[i] = ds.read();
            }

            if(data[8]==OneWire::crc8(data, 8)) {
              // Convert the data to actual temperature
              int16_t raw = (data[1] << 8) | data[0];
              byte cfg = (data[4] & 0x60);
              // at lower res, the low bits are undefined, so lets zero them
              if (cfg == 0x00) raw = raw & ~7;  // 9 bit resolution, 93.75 ms
              else if (cfg == 0x20) raw = raw & ~3; // 10 bit res, 187.5 ms
              else if (cfg == 0x40) raw = raw & ~1; // 11 bit res, 375 ms
              //// default is 12 bit resolution, 750 ms conversion time
              celsius = (float)raw / 16.0;

              newData = true;
            }
          }
          else  t_DS = t + 500 - tSampleDS;
          meas = false;
        }
      }
      else  {
        if((t - t_DS) > tSampleDS) {
          digitalWrite(LED,HIGH);
          if(resetCekDS(5)) {
            ds.skip();
            ds.write(0x44, 1);        // start conversion, with parasite power on at the end
            t_DS = t;
            meas = true;
          }
          else  t_DS = t + 500 - tSampleDS;
          digitalWrite(LED,LOW);
        }
      }

      if(newData) {
        t = millis();
        if((t-t_update) > sendInterval) {
          t_update = t;
          newData = false;

          voltage = get_average(pHbuf, pHbufLen)*5.0/1024;
          pHValue = 3.5*voltage+pHoffset;

          txBuf = "[";
          txBuf += String(NODE_addr,DEC);
          txBuf += ",";
          txBuf += String((int)(pHValue*100),DEC);
          txBuf += ",";
          txBuf += String((int)(celsius*100),DEC);
          txBuf += "]";
          uint16_t crc = getCRC(txBuf);
          txBuf += String(crc,DEC);
          txBuf += "\r";

          PC.print("SendData -> ");
          PC.println(txBuf);

          nodeWifi.print(txBuf);
          delay(10);
        }
      }
    }