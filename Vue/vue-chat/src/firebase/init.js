// Your web app's Firebase configuration\
import firebase from 'firebase';

var firebaseConfig = {
  apiKey: "AIzaSyAQPF2kzODWJE8h1LW6CLZMSXF8cK4ryEM",
  authDomain: "vuejs-firebase-01-c2981.firebaseapp.com",
  databaseURL: "https://vuejs-firebase-01-c2981.firebaseio.com",
  projectId: "vuejs-firebase-01-c2981",
  storageBucket: "vuejs-firebase-01-c2981.appspot.com",
  messagingSenderId: "702907266083",
  appId: "1:702907266083:web:89dfd3619a832d39c02d96",
  measurementId: "G-28T6GGEPQY"
};
// Initialize Firebase
const firebaseApp = firebase.initializeApp(firebaseConfig);
firebaseApp.firestore().settings({ timestampsInSnapshots: true });
export default firebaseApp.firestore();

// firebase.analytics();
