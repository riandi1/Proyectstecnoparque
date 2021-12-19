import React, { useState, useEffect } from "react";
import Link from "next/link";

const Profiles = () => {
  const [profiles, setProfiles] = useState([]);
  useEffect(() => {
    setProfiles(JSON.parse(sessionStorage.getItem("userData")).profiles);
  }, []);

  return (
    <div className="profiles">
      <h2>Mis infantes:</h2>
      <div className="profiles-content">
        <div className="profiles-list-container">
          {profiles.map(name => {
            const firstName = name.name.split(" ");
            return (
              <div key={name.id_profile} className="profile-item">
                <Link
                  className="link-nav"
                  href={{
                    pathname: `/little/${name.id_profile}`
                  }}
                >
                  <a>
                    <img
                      src={
                        name.imgPath ? `${name.imgPath}`:
                        name.gender === "Niño"
                          ? "/uploads/boy.png"
                          : name.gender === "Niña"
                            ? "/uploads/girl.png"
                            : "https://upload.wikimedia.org/wikipedia/commons/6/66/Loadingsome.gif"
                      }
                      alt="User foto"
                    />
                    <p>{firstName[0]}</p>
                  </a>
                </Link>
              </div>
            );
          })}
        </div>
        <div className="buttons">
          <Link href='/newLittle'>
            <button className="button-1">Agregar un infante</button>
          </Link>
        </div>
      </div>
    </div>
  );
};

export default Profiles;
