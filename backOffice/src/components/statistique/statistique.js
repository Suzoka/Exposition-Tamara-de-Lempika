import { useEffect, useState } from 'react';
import { StatistiqueCards } from '../statistique_cards/statistique_cards';

import classes from './statistique.module.css';

export const Statistique = ({ donnee }) => {

    const [stat, setStat] = useState(null);
    const [loadStat, setLoadStat] = useState(false);

    useEffect(() => {
        const trie = async () => {
            // console.log(donnee);

            const nbFormAdulte = donnee.reduce((total, i) => i.formule === "adulte" ? total + i.quantite : total, 0);
            const nbFormJeune = donnee.reduce((total, i) => i.formule === "jeune" ? total + i.quantite : total, 0);
            const nbFormHandicap = donnee.reduce((total, i) => i.formule === "handicap" ? total + i.quantite : total, 0);
            const nbBillet = donnee.reduce((total, i) => total + i.quantite, 0);
            const nbReservation = donnee.length;

            // console.log("Adulte : ", nbFormAdulte, "| Jeune : ", nbFormJeune, "| Handicap : ", nbFormHandicap);

            const days = ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'];

            const reservationsByDay = donnee.reduce((total, i) => {
                const [day, month, year] = i.date.split("/");
                const isoDateStr = `${year}-${month}-${day}`;
                const date = new Date(isoDateStr);
                const dayOfWeek = date.getDay();

                if (!total[days[dayOfWeek]]) {
                    total[days[dayOfWeek]] = 0;
                }

                total[days[dayOfWeek]] += i.quantite;

                return total;
            }, {});

            // console.log(reservationsByDay);

            setStat({
                "formule": {
                    "adulte": nbFormAdulte,
                    "jeune": nbFormJeune,
                    "handicap": nbFormHandicap
                },
                "nbBillet": nbBillet,
                "nbReservation": nbReservation,
                "reservationsByDay": reservationsByDay
            });

            // console.log(stat);

            setLoadStat(true);
        }

        trie();
    }, [donnee]);

    return (
        <div>
            {loadStat ? <p>Nombre de billet : {stat.nbBillet} | Nombre de reservation : {stat.nbReservation}</p> : <p>Chargement des statistiques...</p>}
            {loadStat ? console.log(stat) : ''}
            {loadStat ? (
                <div className={classes['statistique__container']}>
                    < StatistiqueCards donnee={stat.formule} type="cammembert" titre="Répartition des réservations par formule" />
                    < StatistiqueCards donnee={stat.reservationsByDay} type="barJOUR" titre="Réservation par jour" />
                </div>
            ) : ''}
        </div>
    );
}