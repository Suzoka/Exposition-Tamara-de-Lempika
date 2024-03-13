import classes from './header.module.css';

export const Header = () => {
    return (
        <header className={classes['header__container']}>

            <a href="/" className={classes['header__title']}>
                <img src="./asset/logoSiny.svg" alt="logo" className={classes['header__logo']} />
                <p>Back office TDL</p>
            </a>
            <nav>
                <ul>
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        <a href="/admin">Admin</a>
                    </li>
                </ul>
            </nav>
        </header>
    );
};