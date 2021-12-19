import React, { useState, useEffect } from "react";
import axios from "axios";
import { URL } from "../components/Layout/Layout";
import { useRouter } from "next/router";
import { storage } from "../firebaseConfig";

const newLittle = () => {
  const router = useRouter();
  const [data, setData] = useState({
    name: "",
    birth: "",
    weight: [],
    height: [],
    rh: "",
    gender: "",
    measurements: [],
    dates: [],
    vaccines: [],
    imgPath: ""
  });
  
  const handleInputChange = (e) => {
    setData({
      ...data,
      [e.target.name]: e.target.value,
    });
  };

  const handleInputChangeHeight = (e) => {
    setData({
      ...data,
      height: [e.target.value],
    });
  };

  const handleInputChangeWeight = (e) => {
    setData({
      ...data,
      weight: [e.target.value],
    });
  };

  const handleImage = (e) => {
    const image = e.target.files[0]
    handleUpload(image)
  };

  const handleUpload = async (image) => {
    const uploadTask = storage.ref(`images/${image.name}`).put(image);
    uploadTask.on(
      "state_changed",
      (snapshot) => {},
      (error) => {
        console.log(error);
      },
      async () => {
        const url = await storage.ref("images").child(image.name).getDownloadURL()
        setData({...data, imgPath : url})
      }
    );
  }

  const sendProfile = async (e) => {
    e.preventDefault();
    var today = new Date();
    var fecha =
      today.getUTCFullYear() +
      "-" +
      (today.getMonth() + 1) +
      "-" +
      today.getDate();
    data.dates.push(fecha);
 
    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "/profile?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      data
    );
    await sessionStorage.setItem("userData", JSON.stringify(res.data));
    router.push("/"); //redireccionar a la vista de little
  };

  return (
    <div className="form-new-little form">
      <h2>Registrar nuevo infante</h2>
      <div className="new-little">
        <label>Seleccione foto de perfil</label>
        <input type="file" name="imagPath" id="image" onChange={handleImage} className="input-form"/>
        <label>Nombre</label>
        <input
          type="text"
          className="input-form"
          placeholder="Nombre completo"
          name="name"
          onChange={handleInputChange}
          required
        />
        <label className="birth-label">Fecha de nacimiento</label>
        <input
          type="date"
          className="input-form"
          name="birth"
          onChange={handleInputChange}
          required
        />
        <label>Peso (en gramos)</label>
        <input
          type="number"
          className="input-form"
          placeholder="Peso (en gramos)"
          name="weight"
          onChange={handleInputChangeWeight}
          required
        />
        <label>Estatura (en cm)</label>
        <input
          type="number"
          className="input-form"
          placeholder="Estatura (en cm)"
          name="height"
          onChange={handleInputChangeHeight}
          required
        />
        <label>Tipo de sangre</label>
        <input
          type="text"
          className="input-form"
          placeholder="RH"
          name="rh"
          onChange={handleInputChange}
          required
        />
        <div className="gender-container">
          <p className="highlight">Genero:</p>
          <input
            className="input-radio"
            type="radio"
            id="male"
            name="gender"
            value="Niño"
            onChange={handleInputChange}
            required
          />
          <label htmlFor="male">Niño</label>
          <input
            className="input-radio"
            type="radio"
            id="female"
            name="gender"
            value="Niña"
            onChange={handleInputChange}
            required
          />
          <label htmlFor="female">Niña</label>
        </div>
        <button onClick={sendProfile} className="button-1">
          Guardar perfil
        </button>
      </div>
    </div>
  );
};

export default newLittle;
