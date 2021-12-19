import React, { useState, useEffect } from "react";
import axios from "axios";
import ProfileCard from "../components/intern/ProfileCard";
import TitleScreen from "../components/intern/TitleScreen";
import { URL } from "../components/Layout/Layout";
import Link from "next/link";

const Home = () => {
  const [profiles, setProfiles] = useState([0]);

  const setSessionData = async () => {
    if (sessionStorage.userData) {
      let data = await JSON.parse(sessionStorage.getItem("userData"));
      if (data.profiles) {
        setProfiles(data.profiles);
      } else {
        const res = await axios.get(
          URL +
            "api/users/" +
            sessionStorage.getItem("idPPP") +
            "?secret_token=" +
            sessionStorage.getItem("tokenPPP")
        );
        await sessionStorage.setItem("userData", JSON.stringify(res.data));
        setProfiles(res.data.profiles);
        return;
      }
    } else {
      const res = await axios.get(
        URL +
          "api/users/" +
          sessionStorage.getItem("idPPP") +
          "?secret_token=" +
          sessionStorage.getItem("tokenPPP")
      );
      await sessionStorage.setItem("userData", JSON.stringify(res.data));
      setProfiles(res.data.profiles);
    }
  };

  useEffect(() => {
    setSessionData();
  }, []);

  return (
    <div className="home">
      {profiles && <TitleScreen title="Mis infantes" />}
      <div className="cards-container">
        {profiles?.map(element => (
          <ProfileCard
            key={element.id_profile}
            id={element.id_profile}
            name={element.name}
            gender={element.gender}
            imgPath={element.imgPath}
            time={2}
            pee="20"
            poo="35"
          />
        ))}

        {profiles[0] && (
          <Link href="/newLittle">
            <i className="fas fa-plus-square float-button"></i>
          </Link>
        )}

        {!profiles[0] && (
          <div className="buttons">
            <Link href="/newLittle">
              <button className="button-1">Agregar un infante</button>
            </Link>
          </div>
        )}
      </div>
    </div>
  );
};

export default Home;
