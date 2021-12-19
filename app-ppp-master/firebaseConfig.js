import firebase from "firebase/app";
// import "firebase/firestore";
import "firebase/storage";


  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyAB_sKjU38r_025DW3z2StMlW1huGVN5kY",
    authDomain: "aplicacion-ppp.firebaseapp.com",
    projectId: "aplicacion-ppp",
    storageBucket: "aplicacion-ppp.appspot.com",
    messagingSenderId: "71185565988",
    appId: "1:71185565988:web:8458cf825505c296474bb1"
  };
  // Initialize Firebase
  if (!firebase.apps.length){
    firebase.initializeApp(firebaseConfig);
  }
  else {
    firebase.app();
  }

  var storage = firebase.storage();

  export { firebase, storage }


