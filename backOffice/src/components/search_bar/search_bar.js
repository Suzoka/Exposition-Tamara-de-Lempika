import classes from './search_bar.module.css';

export const SearchBar = ({content}) => {
    return (
        <form className={classes['searchbar__container']}>
            {/* <input type="submit" value="loupe" /> */}
            <input type="text" name="recherche" placeholder={content} className={classes['searchbar__input']}/>
        </form>
    );
};