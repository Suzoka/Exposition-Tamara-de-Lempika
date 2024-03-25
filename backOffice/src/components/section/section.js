import { SearchBar } from "../search_bar/search_bar";
import { Statistique } from "../statistique/statistique";
import { Table } from "../table/table";
import classes from './section.module.css';

export const Section = ({nom, donnee, type, contentSearch, id, DelModViewResa, modification, utilisateur}) => {
    return (
        <section id={id} className={classes['section__container']}>
            <h2>{nom}</h2>
            {type === "table" && < SearchBar content={contentSearch}/>}
            {type === "table" && < Table donnee={donnee} DelModViewResa={DelModViewResa} variant={modification ? 'modification' : utilisateur ? 'user' : ''} />}
            {type === "stat" && < Statistique donnee={donnee} />}
        </section>
    );
}