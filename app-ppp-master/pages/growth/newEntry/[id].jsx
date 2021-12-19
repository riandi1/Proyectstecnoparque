import React, { useEffect, useState } from "react";
import { useRouter } from "next/router";
import axios from "axios";
import { URL } from "../../../components/Layout/Layout";

const newEntry = () => {
  const router = useRouter();
  const indexProfile = router.query.index;

  const [userData, setUserData] = useState(null);
  const [growmentData, setGrowmentData] = useState([]);

  const handleInputChange = (e) => {
    setGrowmentData({
      ...growmentData,
      [e.target.name]: e.target.value,
    });
  };

  const sendGrowmentData = async e => {
    e.preventDefault();
    const profile = userData.profiles[indexProfile]
    
    profile.height.push(growmentData.height);
    profile.weight.push(growmentData.weight);

    var today = new Date();
    var fecha = today.getUTCFullYear() + "-" + (today.getMonth()+1) + "-" + today.getDate();
    profile.dates.push(fecha);
    
    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      userData
    );
    await sessionStorage.setItem("userData", JSON.stringify(res.data));
    router.push(`/growth/${profile.id_profile}`);
  };

  const setSessionData = async () => {
    let data = await JSON.parse(sessionStorage.getItem("userData"));
    setUserData(data);
    if (data.profiles[indexProfile]?.gender === "Niño"){
      document.getElementById("app-container").style.background = '#DAFFFF';
    }
    if (data.profiles[indexProfile]?.gender === "Niña"){
      document.getElementById("app-container").style.background = '#FFE6E6' ;
    }
  };

  useEffect(() => {
    setSessionData();
  }, [router.query]);

  return (
    <div className="form form-update">
      <h2>Nuevos datos de crecimiento</h2>
      <div className="growment-info">
        <h4>Talla</h4>
        <input
          type="number"
          className="input-form"
          placeholder="Talla en centímetros"
          name="height"
          onChange={handleInputChange}
          required
        />
        <h4>Peso</h4>
        <input
          type="number"
          className="input-form"
          placeholder="Peso en gramos"
          name="weight"
          onChange={handleInputChange}
          required
        />
      </div>
      <button onClick={sendGrowmentData} className="button-1">
        Guardar datos
      </button>
    </div>
  );
};

export default newEntry;
