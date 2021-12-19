import React, { useState,useEffect } from "react";
import axios from "axios";
import { URL } from "../components/Layout/Layout";
import { useRouter } from "next/router";

const UpdateUser = () => {
  const router = useRouter()
  const [data, setData] = useState('');

  useEffect(() => {
    setData(JSON.parse(sessionStorage.getItem('userData')));
  }, [])

  const handleInputChange = (event) => {
    setData({
      ...data,
      [event.target.name]: event.target.value,
    });
  };

  const sendDataUpdate = async (event) => {
    event.preventDefault();
    const res = await axios.put(
      URL+"api/users/" +
      sessionStorage.getItem("idPPP") +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      data
    );
   await sessionStorage.setItem('userData',JSON.stringify(res.data))
    router.push("/user");
  };

  return (
    <form onSubmit={sendDataUpdate} className="form-update form">
      <h2>Actualizar cuidador</h2>
      <div className="update">
        <label>Nombre</label>
        <input
          id="name"
          className="input-form"
          type="name"
          name="name"
          onChange={handleInputChange}
          value={data.name}
          required
        />
        <label>Teléfono</label>
        <input
          id="phone"
          className="input-form"
          type="phone"
          name="phone"
          onChange={handleInputChange}
          value={data.phone}
          required
        />
        <label>Fecha de nacimiento</label>
        <input
          id="birth"
          className="input-form"
          type="date"
          name="birth"
          onChange={handleInputChange}
          value={data.birth}
          required
        />
        <label>Email</label>
        <input
          id="email"
          className="input-form"
          type="email"
          name="email"
          onChange={handleInputChange}
          value={data.email}
          required
        />
        <button id="btn-login" type="submit" className="button-1">
          Actualizar cuidador
        </button>
      </div>
    </form>
  );
};

export default UpdateUser;
