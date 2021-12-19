import React, { useState, useEffect } from "react";
import Header from "../Header/Header";
import Navigation from "../Navigation/Navigation";
import { useRouter } from "next/router";
import Head from "next/head"

export const URL = "https://poopooplease-api.herokuapp.com/"; // for production purposes
// export const URL = 'http://localhost:5000/'  // for development purposes

const Layout = ({ children }) => {
  const { pathname } = useRouter();

  const [login, setLogin] = useState(false);

  const [session, setSession] = useState({
    id: "",
    session: false,
    token: ""
  });

  useEffect(() => {
    if (pathname == "/login" || sessionStorage.getItem("sessionPPP") ) {
      setLogin(true);
    }
  });

  useEffect(() => {
      document.getElementById("app-container").style.background = '#F4F4F8';
    setSession({
      id: sessionStorage.getItem("idPPP") || "",
      session: sessionStorage.getItem("sessionPPP") || false,
      token: sessionStorage.getItem("tokenPPP") || ""
    });
  }, [children]);

  return (
    <div id="root">
      <Head>
        <title>PooPooPlease</title>
      </Head>
      <Header session={session} />
      <div className="app-container" id="app-container">
        {login && children}
        {session.session && <Navigation session={session} />}
      </div>
    </div>
  );
};

export default Layout;
