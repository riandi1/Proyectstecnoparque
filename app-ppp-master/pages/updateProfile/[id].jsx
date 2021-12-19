import React, { useEffect, useState } from "react";
import axios from "axios";
import { URL } from "../../components/Layout/Layout";
import { useRouter } from "next/router";
import { storage } from "../../firebaseConfig";


const UpdateProfile = (props) => {
  const router = useRouter();
  const idLittle = router.query.id;

  const [data, setData] = useState({
    name: "",
    birth: "",
    weight: [],
    height: [],
    rh: "",
    gender: "",
    measurements: [],
    dates: [],
    vaccines: [],
    imgPath: ""
  });


  useEffect(() => {
    async function receiveData() {
      const res = await axios.get(
        URL +
          "api/users/" +
          sessionStorage.getItem("idPPP") +
          "?secret_token=" +
          sessionStorage.getItem("tokenPPP")
      );
      res.data.profiles.forEach((element) => {
        if (element.id_profile === idLittle) {
          setData(element);
          if (element?.gender === "Niño") {
            document.getElementById("app-container").style.background = "#DAFFFF";
          }
          if (element?.gender === "Niña") {
            document.getElementById("app-container").style.background = "#FFE6E6";
          }
        }
      });
    }
    receiveData();
  }, []);

  const handleInputChange = (event) => {
    setData({
      ...data,
      [event.target.name]: event.target.value,
    });
  };

  const handleImage = (e) => {
    const image = e.target.files[0]
    handleUpload(image)
  };

  const handleUpload = async (image) => {
    const uploadTask = storage.ref(`images/${image.name}`).put(image);
    uploadTask.on(
      "state_changed",
      (snapshot) => {},
      (error) => {
        console.log(error);
      },
      async () => {
        const url = await storage.ref("images").child(image.name).getDownloadURL()
        setData({...data, imgPath : url})
      }
      );
  }
  const sendDataUpdate = async (event) => {
    event.preventDefault();
    const res = await axios.put(
      URL +
        "api/users/" +
        sessionStorage.getItem("idPPP") +
        "/update-profile/" +
        idLittle +
        "?secret_token=" +
        sessionStorage.getItem("tokenPPP"),
      data
    );
    await sessionStorage.setItem("userData", JSON.stringify(res.data));
    console.log(data)
    router.push("/little/" + idLittle);
  };

  return (
    <form onSubmit={sendDataUpdate} className="form-update form">
      <h2>Actualizar infante</h2>
      <div className="update">
      <label>Seleccione nueva foto de perfil</label>
        <input type="file" name="imagPath" id="image" onChange={handleImage} className="input-form"/>
        <label>Nombre</label>
        <input
          id="name"
          className="input-form"
          type="text"
          name="name"
          onChange={handleInputChange}
          value={data.name}
        />
        <label>Fecha de nacimiento</label>
        <input
          id="birth"
          className="input-form"
          type="date"
          name="birth"
          onChange={handleInputChange}
          value={data.birth}
        />
        <button id="btn-login" type="submit" className="button-1">
          Actualizar infante
        </button>
      </div>
    </form>
  );
};

export default UpdateProfile;
