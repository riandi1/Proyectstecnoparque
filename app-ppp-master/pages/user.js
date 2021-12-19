import React,{useEffect,useState} from "react";
import Link from "next/link";
import TitleScreen from "../components/intern/TitleScreen";


const User = (props) => {
  const [userData, setUserData] = useState({
    '':''
  })

  useEffect(() => {
    setUserData(JSON.parse(sessionStorage.getItem('userData')))

  }, [])


  

  return (
    <div className="user-container">
        <TitleScreen title="Datos del cuidador" />
      <div className="user">

        <div className="user-content">
          <p>
            <span className="highlight"> Nombre:&nbsp; </span>
            {userData.name}
          </p>
          <p>
            <span className="highlight"> Fecha de nacimiento:&nbsp; </span>
            {userData.birth}
          </p>
          <p>
            <span className="highlight"> Correo:&nbsp; </span>
            {userData.email}
          </p>
          <p>
            <span className="highlight"> Teléfono:&nbsp; </span>
            {userData.phone}
          </p>

          <div className="buttons">
            <Link href='/profiles'>
              <a className="button-1">
                Ver infantes
              </a>
            </Link>
            <Link href="/updateUser">
              <a className="button-1">Actualizar datos</a>
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
};

export default User;
