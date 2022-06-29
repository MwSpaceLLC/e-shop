// Import the functions you need from the SDKs you need
import {initializeApp} from "firebase/app";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

import {getAuth, createUserWithEmailAndPassword} from "firebase/auth";

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyDmurgVOwF5VSmqRnanWnORhj_4tc-kSDE",
    authDomain: "vatmaster-f4d8d.firebaseapp.com",
    projectId: "vatmaster-f4d8d",
    storageBucket: "vatmaster-f4d8d.appspot.com",
    messagingSenderId: "587665741537",
    appId: "1:587665741537:web:853c3b5ea1b9c420d509a0",
    measurementId: "G-2S437D8TNG"
};

// Initialize Firebase
export const firebaseApp = initializeApp(firebaseConfig);

// Export modules Firebase
export const firebaseGetAuth = getAuth;
export const firebaseCreateUserWithEmailAndPassword = createUserWithEmailAndPassword;