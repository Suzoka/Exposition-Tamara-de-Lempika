import { useEffect, useState } from 'react';

export const Statistique = ({donnee}) => {

    const [stat, setStat] = useState(null);
    const [loadStat, setLoadStat] = useState(false);

    useEffect(() => {
        const trie = async () => {
            console.log(donnee);

            const nbFormAdulte = donnee.reduce((total, i) => i.formule === "adulte" ? total + i.quantite : total, 0);
            const nbFormJeune = donnee.reduce((total, i) => i.formule === "jeune" ? total + i.quantite : total, 0);
            const nbFormHandicap = donnee.reduce((total, i) => i.formule === "handicap" ? total + i.quantite : total, 0);
            const nbBillet = donnee.reduce((total, i) => total + i.quantite, 0);
            const nbReservation = donnee.length;

            console.log("Adulte : ",nbFormAdulte, "| Jeune : ",nbFormJeune, "| Handicap : ", nbFormHandicap);

            setStat({
                "nbAdulte": nbFormAdulte,
                "nbJeune": nbFormJeune,
                "nbHandicap": nbFormHandicap,
                "nbBillet": nbBillet,
                "nbReservation": nbReservation
            });

            console.log(stat);

            setLoadStat(true);
        }

        trie();
    }, [donnee]);

    return (
        <div>
            {loadStat ? console.log(stat) : <p>Chargement des statistiques...</p>}
            {loadStat && <p>Adulte : {stat.nbAdulte} | Jeune : {stat.nbJeune} | Handicap : {stat.nbHandicap}</p>}
            {loadStat && <p>Nombre de billet : {stat.nbBillet} | Nombre de reservation : {stat.nbReservation}</p>}
        </div>
    );
}