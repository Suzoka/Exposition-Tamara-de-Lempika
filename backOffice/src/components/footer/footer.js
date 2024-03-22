import classes from './footer.module.css';

export const Footer = ({deconnexion}) => {
    return (
        <footer className={classes['footer__container']}>
            <a href="https://sinyart.fr">Site de l'agence Siny'art</a>
            <a href="https://tamara.sinyart.fr">L'exposition Tamara de Lempicka</a>
            <a href="" onClick={deconnexion}>Déconnexion</a>
        </footer>
    )
}