import { Label } from '@/components/label/label';
import './statistique_cards.css';

export const StatistiqueCards = ({ donnee, type, titre }) => {

    // const variant = type === "cammembert" ? classes['statCards__container--cammembert'] : type === "barJOUR" ? classes['statCards__container--bar'] : '';

    return (
        <div className='statCards__container'>
            <h3 className='statCards__Title'>{titre}</h3>
            {
                type === "cammembert" ? (
                    <div className='statCards__content--cammembert'>
                        <div className='statCards__Graph'>
                            {
                                Object.entries(donnee).map(([key, value], index) => {
                                    return (
                                        <div>
                                            < Label variant={key} >{index}</Label><p>{value}</p>
                                        </div>
                                    )
                                })
                            }
                        </div>
                        <div className='statCards__Legend'>
                            {
                                Object.entries(donnee).map(([key, value]) => {
                                    return (
                                        < Label variant={key} >{key}</Label>
                                    )
                                })
                            }
                        </div>
                    </div>

                ) : type === "barJOUR" ? (
                    <div>
                        <div className='statCards__Graph'>
                            <p>Lundi : {donnee.Lundi}</p>
                            <p>Mardi : {donnee.Mardi}</p>
                            <p>Mercredi : {donnee.Mercredi}</p>
                            <p>Jeudi : {donnee.Jeudi}</p>
                            <p>Vendredi : {donnee.Vendredi}</p>
                            <p>Samedi : {donnee.Samedi}</p>
                            <p>Dimanche : {donnee.Dimanche}</p>
                        </div>
                    </div>
                ) : ''

            }
        </div>
    )
}