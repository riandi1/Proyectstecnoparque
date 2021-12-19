import React, { useEffect, useState } from "react";
import Link from "next/link";
import TitleScreen from "../../components/intern/TitleScreen";
import VaccineCard from "../../components/intern/VaccineCard.jsx";
import {useRouter} from 'next/router'

const vaccine = props => {
  const router = useRouter()
  const id = router.query.id
  const [profile, setProfile] = useState([]);
  const [indexProfile, setIndexProfile] = useState([]);

  const setSessionData = async (id) => {
    let profiles = await JSON.parse(sessionStorage.getItem("userData"))
      .profiles;
    let index = profiles.findIndex(profile => profile.id_profile == id);
    setProfile(profiles[index]);
    setIndexProfile(index);
    if (profiles[index]?.gender === "Niño"){
      document.getElementById("app-container").style.background = '#DAFFFF';
    }
    if (profiles[index]?.gender === "Niña"){
      document.getElementById("app-container").style.background = '#FFE6E6' ;
    }
  };

  useEffect(() => {
    setSessionData(id);
  }, [router.query]);

  return (
    <div className="vaccines">
      <TitleScreen title={`Vacunas de ${profile?.name}`} />
      <div className="vaccines-cards-container">
        {profile?.vaccines?.map((element, indexArr) => (
          <VaccineCard
            key={indexArr}
            indexVaccine={indexArr}
            indexProfile={indexProfile}
            profile={element}
            name={element?.name}
            date={element?.date}
            dosis={element?.dosis}
            id={id}
            setData={() => setSessionData(id)}
          />
        ))}
      </div>
      <Link
          href={{
            pathname: `/vaccines/new/${id}`,
            query: { index: indexProfile }
          }}
        >
          <i className="fas fa-plus-square float-button"></i>
        </Link>
    </div>
  );
};

export default vaccine;
