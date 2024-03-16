import Image from 'next/image';
import Trash  from '../../../public/asset/icon/Trash-2.svg';
import Eye  from '../../../public/asset/icon/Eye.svg';

import { Button } from "@/components/button/button";
import { Date } from "@/components/date/date";
import { Label } from "@/components/label/label";

import classes from './table_object.module.css';


export const Table_object = ({ liste, variant }) => {

    let formattedId = '# ' + liste.id.toString().padStart(5, '0');

    return (
        <tr className={classes['table__ligne']}>
            <td> 
                {/* ID de la réséervation */}
                {formattedId}
            </td>
            <td className={classes['table__cellule--user']}>
                {/* Utilisateur */}
                <img src={liste.img} className={classes['user__icon']} alt=""/>
                {liste.prenom} {liste.nom}
            </td>
            <td>
                {/* Date de la réservation */}
                < Date variant="day">{liste.date}</Date>
            </td>
            <td>
                {/* Créneau réservé */}
                < Date variant="hour">{liste.creneau}</Date>
            </td>
            <td>
                {/* Formule choisie */}
                < Label variant={liste.formule}>{liste.formule}</Label>
            </td>
            <td>
                {/* Mail */}
                {liste.mail}
            </td>
            <td>
                {/* Prix */}
                {liste.prix}€
            </td>
            <td>
                {/* Quantité */}
                x {liste.quantite}
            </td>
            <td className={classes['table__cellule--action']}>
                {/* Action */}
                < Button variant="primary">Modifier</Button>

                < Button format="icon" icon="trash">
                    <span className='icon_alt'>Supprimer</span>
                </Button>

                < Button format="icon" icon="eye">
                    <span className='icon_alt'>Voir</span>
                </Button>
            </td>
        </tr>
    )

}