import React, { useState, useEffect } from "react";
import TitleScreen from '../components/intern/TitleScreen'
import { BleClient } from '@capacitor-community/bluetooth-le';
import { URL } from "../components/Layout/Layout";
import axios from "axios";
import swal from "@sweetalert/with-react";
import { useRouter } from "next/router";




const Connect = () => {
  const router = useRouter();

  const SERVICE = "4fafc201-1fb5-459e-8fcc-c5c9c331914b";
  const CHARACTERISTIC_UUID = "beb5483e-36e1-4688-b7f5-ea07361b26a8";
  const deviceName = 'ESP32-BLE';
  var bluetoothDeviceDetected

  let counter = 0;

  let data = {
    id_user: "",
    id_little: "",
    label: "",
    frec: [],
    amp: [],
    pha: [],
    t: [],
    frecImp: [],
    real: [],
    img: [],
    imp: [],
    date: ""
  }

  const [profiles, setProfiles] = useState([])

  const setSessionData = async () => {
    let infoSession = await JSON.parse(sessionStorage.getItem("userData"));
    setProfiles(infoSession.profiles)
  }

  useEffect(() => {
    setSessionData();
  }, [])

  const sendDataPython = async () => {
    const resPy = await axios.post(
      // "http://localhost:4000/datas",
      "https://python-ppp.herokuapp.com/datas",
      data
    );
    console.log(resPy)
    counter = 0;
    data = {
      id_user: "",
      id_little: "",
      label: "",
      frec: [],
      amp: [],
      pha: [],
      t: [],
      frecImp: [],
      real: [],
      img: [],
      imp: [],
      date: ""
    }
    router.push("/");
  }

  async function connect() {
    await BleClient.initialize();
    let options = {
      optionalServices: [SERVICE],
      filters: [
        { "name": deviceName }
      ]
    }
    console.log('Requesting any Bluetooth Device...')
    return await BleClient.requestDevice(options).then(async device => {
      bluetoothDeviceDetected = device
      await BleClient.connect(device.deviceId);
      console.log('Connected to device', device);
      swal({
        title: "Conectado correctamente",
        text: "Se ha conectado al dispositivo, puede comenzar a medir.",
        icon: "success",
        buttons: true,
        dangerMode: false,
      });
      read();

      setTimeout(async () => {
        await BleClient.stopLEScan();
        console.log('stopped scanning');
      }, 1000);

    }).catch(error => {
      console.log('Argh! ' + error)
    })
  }

  async function read() {
    data.id_user = sessionStorage.getItem("idPPP")
    data.id_little = document.getElementById("id_little").value
    data.label = document.getElementById("label").value

    await BleClient.startNotifications(
      bluetoothDeviceDetected.deviceId,
      SERVICE,
      CHARACTERISTIC_UUID,
      value => {
        console.log('Value: ', conversor(value))
      },
    ).catch(error => {
      console.log('[ERROR] Start: ' + error)
    })
  }

  function conversor(value) {
    const length = value.byteLength;
    let points = [];
    let j = 0;

    if (counter >= 1300) {
      swal({
        title: "Datos recibidos correctamente",
        text: "Se han recibido todos los datos, puede procesarlos.",
        icon: "success",
        buttons: true,
        dangerMode: false,
      });
    }

    if (counter > 1340) {
      counter = 0;
      data = {
        id_user: sessionStorage.getItem("idPPP"),
        id_little: document.getElementById("id_little").value,
        label: document.getElementById("label").value,
        frec: [],
        amp: [],
        pha: [],
        t: [],
        frecImp: [],
        real: [],
        img: [],
        imp: [],
        date: ""
      }
    }


    for (var i = 0; i < length; i++) {
      if (value.getUint8(i) === 59) {
        points[j] = i;
        j = j + 1;
      }
    }
    if (counter < 1300) {
      data.frec[counter] = (value.getUint8(points[0] - 7) - 48) * 1000000 + (value.getUint8(points[0] - 6) - 48) * 100000 + (value.getUint8(points[0] - 5) - 48) * 10000 + (value.getUint8(points[0] - 4) - 48) * 1000 + (value.getUint8(points[0] - 3) - 48) * 100 + (value.getUint8(points[0] - 2) - 48) * 10 + (value.getUint8(points[0] - 1) - 48)
      data.amp[counter] = (value.getUint8(points[1] - 4) - 48) * 1000 + (value.getUint8(points[1] - 3) - 48) * 100 + (value.getUint8(points[1] - 2) - 48) * 10 + (value.getUint8(points[1] - 1) - 48),
        data.pha[counter] = (value.getUint8(points[2] - 4) - 48) * 1000 + (value.getUint8(points[2] - 3) - 48) * 100 + (value.getUint8(points[2] - 2) - 48) * 10 + (value.getUint8(points[2] - 1) - 48),
        data.t[counter] = (value.getUint8(points[3] - 4) - 48) * 1000 + (value.getUint8(points[3] - 3) - 48) * 100 + (value.getUint8(points[3] - 2) - 48) * 10 + (value.getUint8(points[3] - 1) - 48)

    } else {
      data.frecImp[(counter - 1300)] = (value.getUint8(points[0] - 3) - 48) * 100 + (value.getUint8(points[0] - 2) - 48) * 10 + (value.getUint8(points[0] - 1) - 48)
      data.real[(counter - 1300)] = (value.getUint8(points[1] - 4) - 48) * 1000 + (value.getUint8(points[1] - 3) - 48) * 100 + (value.getUint8(points[1] - 2) - 48) * 10 + (value.getUint8(points[1] - 1) - 48)
      data.img[(counter - 1300)] = (value.getUint8(points[2] - 4) - 48) * 1000 + (value.getUint8(points[2] - 3) - 48) * 100 + (value.getUint8(points[2] - 2) - 48) * 10 + (value.getUint8(points[2] - 1) - 48)
      data.imp[(counter - 1300)] = (value.getUint8(points[3] - 4) - 48) * 1000 + (value.getUint8(points[3] - 3) - 48) * 100 + (value.getUint8(points[3] - 2) - 48) * 10 + (value.getUint8(points[3] - 1) - 48)
    }
    counter = counter + 1;
    return data;
  }

  async function stop() {
    await BleClient.stopNotifications(
      bluetoothDeviceDetected.deviceId,
      SERVICE,
      CHARACTERISTIC_UUID,
    ).catch(error => {
      console.log('[ERROR] Stop: ' + error)
    })
    await BleClient.disconnect(bluetoothDeviceDetected.deviceId);
    console.log('Disconnected from device', bluetoothDeviceDetected);
    if (counter != 0) {
      var today = new Date();
      var fecha =
        today.getUTCFullYear() +
        "-" +
        (today.getMonth() + 1) +
        "-" +
        today.getDate();
      data.date = fecha;
      // envio de datos raw a mongo
      const res = await axios.post(
        URL +
        "api/data?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
        data
      );
      sendDataPython();
    }
  }

  return (
    <div className="connect">
      <TitleScreen title="Conectar a dispositivo PooPooPlease" />
      <div className="connect-box">
        <p> 1) Seleccione el pequeño a medir</p>
        <select id="id_little">
          {profiles.map((profile, index) => {
            return (
              <option key={index} value={profile.id_profile}>
                {profile.name}
              </option>
            )
          })}
        </select>
        <div className="info-box">
          <p> 2) Seleccione el momento en el cual se realiza la medición</p>
          <select id="label">
          <option value="0">
              Grasa
            </option>
            <option value="1">
              Músculo
            </option>
            <option value="2">
              Hueso
            </option>
            {/* <option value="0">
                Antes de ir al baño
              </option>
              <option value="1">
                Después de ir al baño
              </option> */}
          </select>
        </div>
        <div className="info-box">
          <p> 3) Ahora conectate al dispositivo</p>
          <div>
            <button onClick={connect} className="connect-btn">Buscar</button>
          </div>
        </div>
        <div className="info-box">
          <p> 4) Realiza la medición desde el dispositivo desde el botón del dispositivo</p>
        </div><div className="info-box">
          <p> 5) Procesa los datos</p>
          <div>
            {/* <button onClick={read} className="connect-btn">Leer</button> */}
            <button onClick={stop} className="connect-btn">Procesar datos</button>
          </div>
        </div>
      </div>
    </div>
  )
}

export default Connect
