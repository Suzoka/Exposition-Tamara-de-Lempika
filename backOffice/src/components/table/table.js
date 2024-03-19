import { Table_object } from "../table_object/table_object";
import classes from './table.module.css';

export const Table = ({ donnee, DelModViewResa, variant }) => {

    return (
        <section className={classes['table__container']}>
            <table className={classes['table__object']}>
                <thead>
                    {variant === 'modification' || variant === '' ? (
                        <tr className={classes['table__head']}>
                            <th className={classes['table__head--Id']}>Id</th>
                            <th className={classes['table__head--User']}>Utilisateur</th>
                            <th className={classes['table__head--Date']}>Date</th>
                            <th className={classes['table__head--Creneau']}>Créneau</th>
                            <th className={classes['table__head--Formule']}>Formule</th>
                            <th className={classes['table__head--Mail']}>Mail</th>
                            <th className={classes['table__head--Prix']}>Prix</th>
                            <th className={classes['table__head--Quantite']}>Quantité</th>
                            {variant === 'modification' ? (
                                <th className={classes['table__head--Action']}>Action</th>
                            ) : ''}
                        </tr>
                    ) : variant==='user' ? (
                        <tr className={classes['table__head']}>
                            <th className={classes['table__head--Id']}>Id</th>
                            <th className={classes['table__head--User']}>Utilisateur</th>
                            <th className={classes['table__head--Date']}>Login</th>
                            <th className={classes['table__head--Mail']}>Mail</th>
                            <th className={classes['table__head--Formule']}>Rôle</th>
                            <th className={classes['table__head--Action']}>Action</th>
                        </tr>
                    ) : ''}

                </thead>
                <tbody>
                    {
                        donnee.map((item, index) => {
                            return <Table_object key={index} liste={item} DelModViewResa={DelModViewResa} variant={variant} />
                        })
                    }
                </tbody>
            </table>
        </section>
    );

}