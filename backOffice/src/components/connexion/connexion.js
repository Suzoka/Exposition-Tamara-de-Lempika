import { useRef, useState } from "react";

import classes from './connexion.module.css';

export const Connexion = ({ setFlag }) => {

    const [erreur, setErreur] = useState(false);

    const login = useRef(null);
    const password = useRef(null);

    const fctConnexion = (e) => {
        e.preventDefault();
        console.log('Connexion');

        const loginAPI = async () => {

            await fetch("https://api.sinyart.fr/adminLogin", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    'login': login.current.value,
                    'password': password.current.value
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.auth === "true") {
                        console.log("connexion réussie");
                        sessionStorage.setItem('token', 'Bearer ' + data.token);
                        setFlag(true);
                    } else {
                        console.log('Authentication failed');
                        setErreur(true);
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                });
        }

        if (login.current.value !== '' && password.current.value !== '') {
            loginAPI();
        }

    }

    return (
        <section className={classes["connexion__container"]}>

            <div className={classes["connexion__cards"]}>

                <h1 className={classes["connexion__title"]}>Connexion</h1>
                <form onSubmit={fctConnexion} className={classes["connexion__form"]}>
                    <label htmlFor="login" className={classes["connexion__label"]}>Login</label>
                    <input type="text" name="login" ref={login} className={classes["connexion__input"]} required />
                    <label htmlFor="password" className={classes["connexion__label"]}>Mot de passe</label>
                    <input type="password" name="password" ref={password} className={classes["connexion__input"]} required />
                    <button type="submit"className={classes["connexion__submit"]}>Connexion</button>
                </form>

                {erreur ? <p className={classes["connexion__erreur"]}>Login ou mot de passe incorrect</p> : ''}

            </div>

            <div className={classes["connexion__logo"]}>
                <img src="./asset/logoSiny.svg" alt="logo" className={classes['connexion__logo--img']} />
                <p className={classes['connexion__logo--txt']}>Back office TDL</p>
            </div>

        </section>
    )

}