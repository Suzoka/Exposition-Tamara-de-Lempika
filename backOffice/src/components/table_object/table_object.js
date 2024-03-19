import Image from 'next/image';
import Trash from '../../../public/asset/icon/Trash-2.svg';
import Eye from '../../../public/asset/icon/Eye.svg';

import { Button } from "@/components/button/button";
import { DatePills } from "@/components/datePills/datePills";
import { Label } from "@/components/label/label";

import classes from './table_object.module.css';


export const Table_object = ({ liste, variant, DelModViewResa }) => {

    let formattedId = '# ' + (liste.id_ticket ? liste.id_ticket : liste.id_user);
    const date = new Date(liste.date);
    let Jour = `${date.getDate()}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
    let Heure = `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;

    return (
        <tr className={classes['table__ligne']}>
            {variant === 'modification' || variant === '' ? (
                <>
                    <td>
                        {/* ID de la réséervation */}
                        {formattedId}
                    </td>
                    <td className={classes['table__cellule--user']}>
                        {/* Utilisateur */}
                        <img src={liste.img} className={classes['user__icon']} alt="" />
                        {liste.prenom} {liste.nom}
                    </td>
                    <td>
                        {/* Date de la réservation */}
                        < DatePills variant="day">{Jour}</DatePills>
                    </td>
                    <td>
                        {/* Créneau réservé */}
                        < DatePills variant="hour">{Heure}</DatePills>
                    </td>
                    <td>
                        {/* Formule choisie */}
                        < Label variant={liste.nom_formule}>{liste.nom_formule}</Label>
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

                    {/* Action */}
                    {variant === 'modification' && (
                        <td className={classes['table__cellule--action']}>
                            < Button variant="primary" title="Modifier" idElement={liste.id_ticket} action={DelModViewResa['modifyResa']}>Modifier</Button>

                            < Button format="icon" title="Suprimer" icon="trash" idElement={liste.id_ticket} action={DelModViewResa['deleteResa']}>
                                <span className='icon_alt'>Supprimer</span>
                            </Button>

                            < Button format="icon" title="Voir" icon="eye" idElement={liste.id_ticket} action={DelModViewResa['viewResa']}>
                                <span className='icon_alt'>Voir</span>
                            </Button>
                        </td>
                    )}
                </>
            ) : variant === 'user' ? (
                <>
                    <td>
                        {/* ID de l'utilisateur */}
                        {formattedId}
                    </td>
                    <td className={classes['table__cellule--user']}>
                        {/* Utilisateur */}
                        <img src={liste.img} className={classes['user__icon']} alt="" />
                        {liste.prenom} {liste.nom}
                    </td>
                    <td>
                        {/* Login */}
                        {liste.username}
                    </td>
                    <td>
                        {/* Mail */}
                        {liste.mail}
                    </td>
                    <td>
                        {/* Rôle */}
                        {liste.role === 1 ? 'Admin' : liste.role === 0 ? 'Client' : ''}
                    </td>

                    {/* Action */}
                    <td className={classes['table__cellule--action']}>
                        < Button variant="primary" title="Modifier" idElement={liste.id_ticket} action={DelModViewResa['modifyResa']}>Modifier</Button>

                        < Button format="icon" title="Suprimer" icon="trash" idElement={liste.id_ticket} action={DelModViewResa['deleteResa']}>
                            <span className='icon_alt'>Supprimer</span>
                        </Button>

                        < Button format="icon" title="Voir" icon="eye" idElement={liste.id_ticket} action={DelModViewResa['viewResa']}>
                            <span className='icon_alt'>Voir</span>
                        </Button>
                    </td>
                </>
            ) : ''
            }
        </tr>
    )

}