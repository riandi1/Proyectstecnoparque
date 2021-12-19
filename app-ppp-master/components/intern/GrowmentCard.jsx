import React, { useEffect, useState } from "react";

const GrowmentCard = (props) => {

  return (
    <div className="vaccine-card">
      <div className="vaccine-info">
        <p>
          <span className="highlight">Talla:</span>{" "}
          {props.profile.height[props.indexData]} centímetros
        </p>
        <p>
          <span className="highlight">Peso:</span>{" "}
          {props.profile.weight[props.indexData]} gramos
        </p>
        <p>
          <span>Ingresado el: </span>{" "}
          {props.profile.dates[props.indexData]} 
        </p>
      </div>
    </div>
  );
};

export default GrowmentCard;
