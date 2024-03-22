import { useState } from "react";

import { Button } from "@/components/button/button";
import { DatePills } from "@/components/datePills/datePills";
import { Label } from "@/components/label/label";

import classesTable from './table.module.css';
import classesTable_object from './table_object.module.css';

export const Table = ({ donnee, DelModViewResa, variant }) => {

    return (
        <section className={classesTable['table__container']}>
            <table className={classesTable['table__object']}>
                <thead>
                    {variant === 'modification' || variant === '' ? (
                        <tr className={classesTable['table__head']}>
                            <th className={classesTable['table__head--Id']}>Id</th>
                            <th className={classesTable['table__head--User']}>Utilisateur</th>
                            <th className={classesTable['table__head--Date']}>Date</th>
                            <th className={classesTable['table__head--Creneau']}>Créneau</th>
                            <th className={classesTable['table__head--Formule']}>Formule</th>
                            <th className={classesTable['table__head--Mail']}>Mail</th>
                            <th className={classesTable['table__head--Prix']}>Prix</th>
                            <th className={classesTable['table__head--Quantite']}>Quantité</th>
                            {variant === 'modification' ? (
                                <th className={classesTable['table__head--Action']}>Action</th>
                            ) : ''}
                        </tr>
                    ) : variant === 'user' ? (
                        <tr className={classesTable['table__head']}>
                            <th className={classesTable['table__head--Id']}>Id</th>
                            <th className={classesTable['table__head--User']}>Utilisateur</th>
                            <th className={classesTable['table__head--Date']}>Login</th>
                            <th className={classesTable['table__head--Mail']}>Mail</th>
                            <th className={classesTable['table__head--Formule']}>Rôle</th>
                            <th className={classesTable['table__head--Action']}>Action</th>
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

const Table_object = ({ liste, variant, DelModViewResa }) => {

    const [modificationObjectFlag, setModificationObjectFlag] = useState(false);

    const modifyObject = () => {
        if (modificationObjectFlag) {
            setModificationObjectFlag(false);
            console.log('Valider');
        } else {
            console.log('Modifier');
            setModificationObjectFlag(true);
        }
    }

    let formattedId = '# ' + (liste.id_ticket ? liste.id_ticket : liste.id_user);
    const date = new Date(liste.date);
    let Jour = `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}/${date.getFullYear()}`;
    let formDay = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
    let Heure = `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;

    return (
        <tr className={classesTable_object['table__ligne']}>
            {variant === 'modification' || variant === '' ? (
                <>
                    <td>
                        {/* ID de la réséervation */}
                        {formattedId}
                    </td>
                    <td className={classesTable_object['table__cellule--user']}>
                        {/* Utilisateur */}
                        <img src={liste.img} className={classesTable_object['user__icon']} alt="" />
                        {
                            modificationObjectFlag ? <input type="text" name="prenom" defaultValue={liste.prenom} placeholder="Prénom" required /> : liste.prenom
                        } {
                            modificationObjectFlag ? <input type="text" name="nom" defaultValue={liste.nom} placeholder="Nom" required /> : liste.nom
                        }
                    </td>
                    <td>
                        {/* Date de la réservation */}
                        {
                            modificationObjectFlag ? <input type="date" name="date" defaultValue={formDay} min="2024-03-28" max="2024-04-28" required /> : < DatePills variant="day">{Jour}</DatePills>
                        }
                    </td>
                    <td>
                        {/* Créneau réservé */}
                        {
                            modificationObjectFlag ? <input type="time" name="heure" defaultValue={Heure} min="10:00" max="17:30" required /> : < DatePills variant="hour">{Heure}</DatePills>
                        }
                    </td>
                    <td>
                        {/* Formule choisie */}
                        < Label variant={liste.nom_formule_fr}>{liste.nom_formule_fr}</Label>
                    </td>
                    <td>
                        {/* Mail */}
                        {
                            modificationObjectFlag ? <input type="url" name="mail" defaultValue={liste.mail} placeholder="exemple@mail.com" pattern="*@*.*" required /> : liste.mail
                        }
                    </td>
                    <td>
                        {/* Prix */}
                        {liste.prix}€
                    </td>
                    <td>
                        {/* Quantité */}
                        x {
                            modificationObjectFlag ? <input type="number" name="quantite" defaultValue={liste.quantite} min="1" required /> : liste.quantite
                        }
                    </td>

                    {/* Action */}
                    {variant === 'modification' && (
                        <td className={classesTable_object['table__cellule--action']}>
                            < Button variant="primary" title="Modifier" action={() => modifyObject()}>Modifier</Button>

                            < Button format="icon" title="Suprimer" icon="trash" action={() => DelModViewResa['deleteResa'](liste.id_ticket, "reservation")}>
                                <span className='icon_alt'>Supprimer</span>
                            </Button>

                            < Button format="icon" title="Voir" icon="eye" action={() => DelModViewResa['viewResa'](liste.id_ticket, "reservation")}>
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
                    <td className={classesTable_object['table__cellule--user']}>
                        {/* Utilisateur */}
                        <img src={liste.img} className={classesTable_object['user__icon']} alt="" />
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
                    <td className={classesTable_object['table__cellule--action']}>
                        < Button variant="primary" title="Modifier" action={() => DelModViewResa['modifyResa'](liste.id_user, "user")}>Modifier</Button>

                        < Button format="icon" title="Suprimer" icon="trash" action={() => DelModViewResa['deleteResa'](liste.id_user, "user")}>
                            <span className='icon_alt'>Supprimer</span>
                        </Button>

                        < Button format="icon" title="Voir" icon="eye" action={() => DelModViewResa['viewResa'](liste.id_user, "user")}>
                            <span className='icon_alt'>Voir</span>
                        </Button>
                    </td>
                </>
            ) : ''
            }
        </tr>
    )

}

// DelModViewResa['modifyResa'](liste.id_ticket, "reservation")