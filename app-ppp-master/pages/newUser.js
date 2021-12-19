import React, { useState } from "react";
import axios from "axios";
import { URL } from "../components/Layout/Layout";
import { useRouter } from 'next/router'


const NewUser = _ => {
  const router = useRouter()

  const [data, setData] = useState({
    name: "",
    birth: "",
    phone: "",
    email: "",
    password: ""
  });

  const handleInputChange = e => {
    setData({
      ...data,
      [e.target.name]: e.target.value
    });
  };

  const sendData = async () => {
    const res = await axios.post(URL + "api/users/new_user", data);
    const idSession = {
      id: res.data.id,
      token: res.data.token,
      session: res.data.session
    };
    await sessionStorage.setItem("idPPP", idSession.id);
    await sessionStorage.setItem("sessionPPP", idSession.session);
    await sessionStorage.setItem("tokenPPP", idSession.token);
    router.push("/");
  };

  return (
    <div className="form-register form">
      <h2>Registro de cuidador</h2>
      <div className="register">
        <input
          id="name"
          className="input-form"
          type="text"
          name="name"
          onChange={handleInputChange}
          placeholder="Nombre completo"
          required
          autocomplete="new-name"
        />
        <input
          id="phone"
          className="input-form"
          type="text"
          name="phone"
          onChange={handleInputChange}
          placeholder="Teléfono"
          required
          autocomplete="new-phone"
        />
        <label>Fecha de nacimiento</label>
        <input
          id="birth"
          className="input-form"
          type="date"
          name="birth"
          onChange={handleInputChange}
          required
          autocomplete="new-date"
        />
        <input
          id="email"
          className="input-form"
          type="email"
          name="email"
          onChange={handleInputChange}
          placeholder="Correo"
          required
          autocomplete="new-email"
        />
        <input
          id="password"
          className="input-form"
          type="password"
          name="password"
          onChange={handleInputChange}
          placeholder="Contraseña"
          required
          autocomplete="new-password"
        />
        <button onClick={sendData} id="btn-login"  className="button-1">
          Crear cuidador
        </button>
      </div>
    </div>
  );
};

export default NewUser;
