import classes from './header.module.css';

export const Header = () => {
    return (
        <header className={classes['header__container']}>
            <a href="#main" className={classes['header__title']}>
                <img src="./asset/logoSiny.svg" alt="logo" className={classes['header__logo']} />
                <p className={classes['headerTitle__text']}>Back office TDL</p>
            </a>
            <nav className={classes['header__menu']}>
                <a href="#stat" className={classes['header__link'] + ' ' + classes['header__link--stat']}>Statistiques</a>
                <a href="#resa" className={classes['header__link'] + ' ' + classes['header__link--cart']}>Réservations</a>
                <a href="#user" className={classes['header__link'] + ' ' + classes['header__link--user']}>Utilisateurs</a>
                <a href="#arch" className={classes['header__link'] + ' ' + classes['header__link--arch']} title='Archive'></a>
            </nav>
        </header>
    );
};