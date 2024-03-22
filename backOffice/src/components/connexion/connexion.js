import { useRef } from "react";

import classes from './connexion.module.css';

export const Connexion = ({ setFlag }) => {

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
            <div>
                <h1>Connexion</h1>
                <form onSubmit={fctConnexion}>
                    <label htmlFor="login">Login</label>
                    <input type="text" name="login" ref={login} required />
                    <label htmlFor="password">Mot de passe</label>
                    <input type="password" name="password" ref={password} required />
                    <button>Connexion</button>
                </form>
            </div>
            <div className={classes["connexion__logo"]}>
                <img src="./asset/logoSiny.svg" alt="logo" className={classes['connexion__logo--img']} />
                <p className={classes['connexion__logo--txt']}>Back office TDL</p>
            </div>
        </section>
    )

}