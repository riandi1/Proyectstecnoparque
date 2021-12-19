import React, { useEffect, useState } from "react";
import Link from "next/link";
import TitleScreen from "../../components/intern/TitleScreen";
import GrowmentCard from "../../components/intern/GrowmentCard.jsx";
import GraphCard from "../../components/intern/GraphCard.jsx";
import { useRouter } from "next/router";

const growth = (props) => {
  const router = useRouter();
  const id = router.query.id;
  const [profile, setProfile] = useState([]);
  const [indexProfile, setIndexProfile] = useState([]);

  const setSessionData = async (id) => {
    let profiles = await JSON.parse(sessionStorage.getItem("userData"))
      .profiles;
    let index = profiles.findIndex((profile) => profile.id_profile == id);
    setProfile(profiles[index]);
    setIndexProfile(index);
    if (profiles[index]?.gender === "Niño") {
      document.getElementById("app-container").style.background = "#DAFFFF";
    }
    if (profiles[index]?.gender === "Niña") {
      document.getElementById("app-container").style.background = "#FFE6E6";
    }
  };

  useEffect(() => {
    setSessionData(id);
  }, [router.query]);

  return (
    <div className="growth">
      <TitleScreen title={`Crecimiento de ${profile?.name}`} />
      <div className="growment-cards-container">
        <h2>Gráficas</h2>
        {profile?.dates && <GraphCard profile={profile} id={id} />}
        <h2>Historial</h2>
        <div className="items">
          {profile?.weight?.map((element, indexArr) => (
            <GrowmentCard
              key={indexArr}
              indexData={indexArr}
              profile={profile}
              id={id}
              setData={() => setSessionData(id)}
            />
          ))}
        </div>
      </div>
      <Link
        href={{
          pathname: `/growth/newEntry/${id}`,
          query: { index: indexProfile },
        }}
      >
        <i className="fas fa-plus-square float-button"></i>
      </Link>
    </div>
  );
};
export default growth;
