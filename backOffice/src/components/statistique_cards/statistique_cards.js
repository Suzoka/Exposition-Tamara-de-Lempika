import { Label } from '@/components/label/label';
import './statistique_cards.css';
import { Graph_Camembert } from '../graph_cammembert/graph_cammembert';
import { Graph_Bar } from '../graph_bar/graph_bar';

export const StatistiqueCards = ({ donnee, type, titre, total }) => {

    // const variant = type === "cammembert" ? classes['statCards__container--cammembert'] : type === "barJOUR" ? classes['statCards__container--bar'] : '';

    return (
        <div className='statCards__container'>
            <h3 className='statCards__Title'>{titre}</h3>
            {
                type === "cammembert" ? (
                    <div className='statCards__content--cammembert'>
                        <div className='statCards__Graph'>
                            < Graph_Camembert data={Object.entries(donnee).map(([key, value]) => ({ key, value }))} />
                        </div>
                        <div className='statCards__Legend'>
                            {
                                Object.entries(donnee).map(([key, value], index) => {
                                    return (
                                        <div key={index}className='legend__element'>
                                            < Label variant={key} >{key}</Label>
                                            <p>{value}</p>      
                                        </div>            
                                    )
                                })
                            }
                        </div>
                    </div>

                ) : type === "barJOUR" ? (
                    <>
                        < Graph_Bar data={Object.entries(donnee).map(([key, value]) => ({ key, value }))} nbBillet={total} />
                    </>
                ) : ''

            }
        </div>
    )
}