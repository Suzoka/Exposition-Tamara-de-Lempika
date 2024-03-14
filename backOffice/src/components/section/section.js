import { SearchBar } from "../search_bar/search_bar";
import { Table } from "../table/table";
import classes from './section.module.css';

export const Section = ({nom, donnee, type, contentSearch, id}) => {
    return (
        <section id={id} className={classes['section__container']}>
            <h2>{nom}</h2>
            {type === "table" && <SearchBar content={contentSearch}/>}
            {type === "table" && <Table donnee={donnee} />}
        </section>
    );
}