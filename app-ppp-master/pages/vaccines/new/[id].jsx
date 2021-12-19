import React, { useEffect, useState } from "react";
import { useRouter } from "next/router";
import axios from "axios";
import { URL } from "../../../components/Layout/Layout";

const newVaccine = () => {
  const router = useRouter();
  const [userData, setUserData] = useState(null);
  const [vaccine, setVaccine] = useState({
    "name": "",
    "dosis": [{
      "number":"",
      "date": ""
    }]
  });
  const indexProfile = router.query.index;
  

  const handleInputChangeName = e => {
    setVaccine({
      ...vaccine,
      name: e.target.value
    });
  };

  const handleInputChangeDosis= e => {
    setVaccine({
      ...vaccine,
      dosis:[{
        number: 1,
        date: e.target.value
      }]

    });
  };

  const sendVaccine = async e => {
    e.preventDefault();
    const profile = userData.profiles[indexProfile]
    if (!profile.vaccines) {
      profile.vaccines = [vaccine];
    } else {
      profile.vaccines.push(vaccine);
    }
    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      userData
    );
    await sessionStorage.setItem("userData", JSON.stringify(res.data));
    router.push(`/vaccines/${profile.id_profile}`);
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
    <div className='form form-update newVaccine-form'>
      <h2>Nueva Vacuna</h2>
      <div>
      <h3>Primera dosis</h3>
        <label>Nombre:</label>
        <input
          type="text"
          className="input-form"
          placeholder="Nombre de la vacuna"
          name="name"
          onChange={handleInputChangeName}
          required
        />
        <label>Fecha de aplicación:</label>
        <input
          type="date"
          className="input-form"
          placeholder="Nombre de la vacuna"
          name="date"
          onChange={handleInputChangeDosis}
          required
        />
      </div>
      <button onClick={sendVaccine} className="button-1">
        Guardar vacuna
      </button>
    </div>
  );
};

export default newVaccine;
