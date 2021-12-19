import React, { useEffect, useState } from "react";
import axios from "axios";
import TitleScreen from "../../components/intern/TitleScreen";
import { URL } from "../../components/Layout/Layout";
import Link from "next/link";
import { useRouter } from "next/router";

const Little = () => {
  const router = useRouter();
  const [littleData, setLittleData] = useState({});

  const getInfo = async (id) => {
    const res = await axios.get(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP")
    );
    const profiles = res.data.profiles;
    profiles.forEach((element) => {
      if (element.id_profile === id) {
        setLittleData(element);
        if (element.gender === "Niño"){
          document.getElementById("app-container").style.background = '#DAFFFF';
        }
        if (element.gender === "Niña"){
          document.getElementById("app-container").style.background = '#FFE6E6' ;
        }
        return;
      }
    });
  };


  useEffect(() => {
    const id = router.query.id;
    getInfo(id);
  }, [router.query]);

  const deleteProfile = async () => {
    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "/delete-profile/" +
        littleData.id_profile +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP")
    );
    await sessionStorage.setItem("userData", JSON.stringify(res.data));
    router.push("/");
  };

  return (
    <div className="little-container">
      <TitleScreen title={littleData?.name} />
      <div className="little">
        <div className="little-content">
          <div className="little-img">
            <img
              src={
                littleData.imgPath ? `${littleData.imgPath}`:
                littleData?.gender === "Niño"
                  ? "/uploads/boy.png"
                  : littleData?.gender === "Niña"
                  ? "/uploads/girl.png"
                  : "https://upload.wikimedia.org/wikipedia/commons/6/66/Loadingsome.gif"
              }
              alt="imagen de usuario"
              className="img-card"
            />
          </div>
          <p>
            <span className="highlight"> Fecha de nacimiento: </span>
            {littleData?.birth}
          </p>
          {littleData.name && (
            <>
              <p>
                <span className="highlight"> Peso: </span>
                {littleData?.weight[littleData?.weight?.length - 1]}
                <span></span>
                <span> gramos</span>
              </p>
              <p>
                <span className="highlight"> Estatura: </span>
                {littleData?.height[littleData?.height?.length - 1]}
                <span></span>
                <span> centímetros</span>
              </p>
            </>
          )}
          <p>
            <span className="highlight"> RH: </span>
            {littleData?.rh}
            <span></span>
          </p>
          <p>
            <span className="highlight"> Género: </span>
            {littleData?.gender}
          </p>
          <div className="buttons">
            <Link href={`/vaccines/${littleData?.id_profile}`}>
              <button className="button-1">Control de vacunas</button>
            </Link>
            <Link href={`/growth/${littleData?.id_profile}`}>
              <button className="button-1">Tabla de crecimiento</button>
            </Link>
            <Link href={`/updateProfile/${router.query.id}`}>
              <a className="link-nav">
                <i className="fas fa-edit"></i>
              </a>
            </Link>
            <button className="button-delete" onClick={deleteProfile}>
              Eliminar infante
            </button>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Little;
