import { useEffect, useState } from 'react';
import { StatistiqueCards } from '../statistique_cards/statistique_cards';

import classes from './statistique.module.css';

export const Statistique = ({ donnee }) => {

    const [stat, setStat] = useState(null);
    const [loadStat, setLoadStat] = useState(false);

    useEffect(() => {
        const trie = async () => {

            await fetch("https://api.sinyart.fr/stats", {
                method: 'GET'
            })
                .then(response => response.json())
                .then(data => {
                    // console.log(data)
                    //Actions à faire avec la réponse de l'API dans la variable data
                    setStat(data);
                    setLoadStat(true);
                })
                .catch((error) => {
                    console.error('Error:', error);
                });

        }

        trie();
    }, [donnee]);

    return (
        <div>
            {loadStat ? (
                <div className={classes['stats__nbContainer']}>
                    <div className={classes['stats__nbObject']}>
                        <img src="./asset/ticket.png" alt="" className={classes['stats__emote']} />
                        <p><span className='bold'>{stat.nbReservation}</span> Billets</p>
                    </div>
                    <div className={classes['stats__nbObject']}>
                        <img src="./asset/spiral-calendar.png" alt="" className={classes['stats__emote']} />
                        <p><span className='bold'>{stat.nbBillet}</span> Réservations</p>
                    </div>
                </div>
            ) : <p>Chargement des statistiques...</p>}
            {/* {loadStat ? console.log(stat) : ''} */}
            {loadStat ? (
                <div className={classes['statistique__container']}>
                    < StatistiqueCards donnee={stat.formule} type="cammembert" titre="Répartition des formules" />
                    < StatistiqueCards donnee={stat.reservationsByDay} total={stat.nbBillet} type="barJOUR" titre="Réservation par jour de la semaine" />
                </div>
            ) : ''}
        </div>
    );
}