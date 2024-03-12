import { Table_object } from "../table_object/table_object";
import classes from './table.module.css';

export const Table = ({donnee}) => {

    return (
        <section className={classes['table__container']}>
            <table>
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
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        donnee.map((item, index) => {
                            return <Table_object key={index} liste={item} />
                        })
                    }
                </tbody>
            </table>
        </section>
    );

}