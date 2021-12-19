import React from "react";

const Header = props => {
   const closeSession = () => {
     console.log(props)
    sessionStorage.removeItem('idPPP')
    sessionStorage.removeItem('sessionPPP')
    sessionStorage.removeItem('tokenPPP')
    sessionStorage.removeItem('userData')
   }

  return (
    <nav className="header">
      <div className="header-logo">
        <a href="/">
          <img id="img" src='/uploads/logo.png' alt="logo" className="img_user" />
        </a>
      </div>
      {props.session.session && (
        <div className="header-content">
          <img id="img" src='/uploads/sinfoto.png' alt="user" className="img_user" />
          <a href="/login" onClick={closeSession}>Cerrar sesión</a>
        </div>
      )}
    </nav>
  );
};

export default Header;
