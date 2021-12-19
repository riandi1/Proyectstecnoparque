import React, { useState, useEffect } from "react";
import Link from "next/link";
import axios from "axios";
import { URL } from "../components/Layout/Layout";
import { useRouter } from 'next/router'


const Login = _ => {
  const router = useRouter()
  const [isLoading, setIsLoading] = useState(false);
  const [error, setError] = useState(false);
  const [data, setData] = useState({
    email: "",
    password: ""
  });

  useEffect(() => {
    if (sessionStorage.getItem('sessionPPP')) {
      router.push("/");
    }
    setData({
      email: document.getElementById('user').value,
      password: document.getElementById('password').value
    })
  }, []);


  const handleInputChange = event => {
    setData({
      ...data,
      [event.target.name]: event.target.value
    });
  };

  const signIn = async e => {
    setIsLoading(true);
    e.preventDefault();

    async function login() {
      const session = await axios.post(URL + "api/login", data);
      if (session.data.message) {
        setError(true);
        setIsLoading(false);
      } else {
        setError(false);
        const idSession = session.data;
        await sessionStorage.setItem("idPPP", idSession.id);
        await sessionStorage.setItem("sessionPPP", idSession.session);
        await sessionStorage.setItem("tokenPPP", idSession.token);
        router.push("/");
        setIsLoading(false);
      }
    }
    login();
  };

  return (
    <form onSubmit={signIn} className="form-login form">
      <h1>PooPooPlease</h1>
      <h2>Iniciar sesión</h2>
      {isLoading && <img className="img-loading" src="https://upload.wikimedia.org/wikipedia/commons/6/66/Loadingsome.gif" alt="loading" />}
      {!isLoading && (
        <div className="login">
          <input
            id="user"
            className="input-form"
            type="email"
            name="email"
            onChange={handleInputChange}
            placeholder="Correo"
            autoFocus
            required
          />
          <input
            id="password"
            className="input-form"
            type="password"
            name="password"
            onChange={handleInputChange}
            placeholder="Contraseña"
            required
          />
          {error && (
            <p className="login-error">
              Error al intentar iniciar sesión, valide los datos y vuelva a
              intentarlo.
            </p>
          )}
          <button id="btn-login" type="submit" className="button-1">
            Iniciar sesión
          </button>
          <Link href="/newUser">
            <a id="btn-register" className="button-1">
              Registrar cuidador
            </a>
          </Link>
        </div>
      )}
    </form>
  );
};

export default Login;
