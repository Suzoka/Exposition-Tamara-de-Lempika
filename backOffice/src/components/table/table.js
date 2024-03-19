import { Table_object } from "../table_object/table_object";
import classes from './table.module.css';

export const Table = ({donnee, DelModViewResa, variant}) => {

    return (
        <section className={classes['table__container']}>
            <table className={classes['table__object']}>
                <thead>
                    <tr className={classes['table__head']}>
                        <th>Id</th>
                        <th>Utilisateur</th>
                        <th>Date</th>
                        <th>Créneau</th>
                        <th>Formule</th>
                        <th>Mail</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        { variant==='modification' ? (
                            <th>Action</th>
                        ) : ''}
                    </tr>
                </thead>
                <tbody>
                    {
                        donnee.map((item, index) => {
                            return <Table_object key={index} liste={item} DelModViewResa={DelModViewResa} variant={variant==='modification' ? 'modification' : ''} />
                        })
                    }
                </tbody>
            </table>
        </section>
    );

}