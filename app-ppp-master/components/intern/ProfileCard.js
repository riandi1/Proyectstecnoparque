import React from "react";
import Link from "next/link";

const ProfileCard = props => {
  return (
    <div>
      <Link
        className="link-nav"
        href={{
          pathname: `/little/${props.id}`
        }}
        asPath={`/little/${props.id}`}
      >
        <a className="card" key={props.id} style={props.gender === "Niño" ?
          { background: '#DAFFFF' } :
          props.gender === "Niña" ? { background: '#FFE6E6 ' } : {}}>
          <div className="img-card-box">
            <img
              src={
                props.imgPath ? `${props.imgPath}`:
                props.gender === "Niño"
                  ? "/uploads/boy.png"
                  : props.gender === "Niña"
                    ? "/uploads/girl.png"
                    : "https://upload.wikimedia.org/wikipedia/commons/6/66/Loadingsome.gif"
              }
              alt="imagen de usuario"
              className="img-card"
            />
          </div>
          <div className="info-card">
            <div className="info-card-text">
              <p className="highlight">{props.name}</p>
              <p>Medido hace {props.time} horas</p>
            </div>
            <div className="info-card-buttons">
              <div className="probability">
                <div>
                  <i className="fas fa-water"></i>
                  <p>{props.pee}%</p>
                </div>
                <div>
                  <i className="fas fa-toilet-paper"></i>
                  <p>{props.poo}%</p>
                </div>
              </div>
              <button className="button-measure-card">
                <i className="fas fa-ruler"></i>
              </button>
            </div>
          </div>
        </a>
      </Link>
    </div>
  );
};

export default ProfileCard;
