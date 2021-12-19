import React, { useEffect, useState } from "react";
import axios from "axios";
import { URL } from "../../components/Layout/Layout";
import Link from "next/link";

const VacineCard = props => {
  const [userData, setUserData] = useState(null);

  const deleteVaccine = async () => {
    userData.profiles[props.indexProfile].vaccines.splice(
      props.indexVaccine,
      1
    );
    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      userData
    );
    sessionStorage.setItem("userData", JSON.stringify(res.data));
    props.setData();
  };

  const getData = async () => {
    setUserData(await JSON.parse(sessionStorage.getItem("userData")));
  };

  useEffect(() => {
    getData();
  }, [props.profile]);

  return (
    <div className="vaccine-card">
      <div className="vaccine-info">
        <p>
          <span className="highlight">Nombre de la vacuna:</span> {props.name}
        </p>
        <p>
          <span className="highlight">Dosis:</span> {props.dosis.length}
        </p>
        <p>
          <span className="highlight">Aplicada el:</span> {props.dosis[props.dosis.length - 1].date}
        </p>
      </div>
      <Link
        href={{
          pathname: `/vaccines/dosis/${props.id}`,
          query: {
            indexProfile: props.indexProfile,
            indexVaccine: props.indexVaccine
          }
        }}
      >
        <i className="fas fa-plus"></i>
      </Link>
      <i className="fas fa-times" onClick={deleteVaccine}></i>
    </div>
  );
};

export default VacineCard;
