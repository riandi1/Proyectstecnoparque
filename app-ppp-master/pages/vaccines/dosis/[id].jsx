import React, { useEffect, useState } from "react";
import { useRouter } from "next/router";
import axios from "axios";
import { URL } from "../../../components/Layout/Layout";

const newDosis = () => {
  const router = useRouter();
  const indexProfile = router.query.indexProfile
  const indexVaccine = router.query.indexVaccine
  const id = router.query.id
  const [userData, setUserData] = useState(null);
  const [vaccine, setVaccine] = useState({
    dosis: []
  });  

  const sendDosis = async () => {
    const date = document.getElementsByName('date')
    let vaccineTemp = userData.profiles[indexProfile].vaccines[indexVaccine];
    const newDosis = {
      number: vaccineTemp.dosis.length + 1,
      date: date[0].value
    };
    vaccineTemp.dosis.push(newDosis);

    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      userData
    );
    await sessionStorage.setItem("userData", JSON.stringify(res.data));
    router.push(`/vaccines/${id}`);
  };

  const setSessionData = async () => {
    let data = await JSON.parse(sessionStorage.getItem("userData"));
    setUserData(data);
    setVaccine(data?.profiles[indexProfile]?.vaccines[indexVaccine]);
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
    <div className="form form-update newVaccine-form">
      <h2>Nueva Dosis</h2>
      <div>
        <p>A continuación se ingresará una nueva dosis de la vacuna: </p>
        <h3>{vaccine?.name}</h3>
        <p> Correspondiente a la dosis número: {vaccine?.dosis?.length + 1} </p>
        <h3>Fecha de aplicación</h3>
        <input
          type="date"
          className="input-form"
          placeholder="Nombre de la vacuna"
          name="date"
          required
        />
      </div>
      <button onClick={sendDosis} className="button-1">
        Guardar dosis
      </button>
    </div>
  );
};

export default newDosis;
