import { useRef } from 'react';

import './modification_pop.css';
import { Button } from '../button/button.js';

export const ModificationPop = ({ open, setOpen, data, setModificationFlag }) => {

    const date = new Date(data.date);
    let formDay = `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, '0')}-${date.getDate().toString().padStart(2, '0')}`;
    let Heure = `${date.getHours().toString().padStart(2, '0')}:${date.getMinutes().toString().padStart(2, '0')}`;

    const formPrenom = useRef(null);
    const formNom = useRef(null);
    const formDate = useRef(null);
    const formHeure = useRef(null);
    const formMail = useRef(null);
    const formFormule = useRef(null);
    const formQuantite = useRef(null);

    const fetchmodification = (e) => {
        e.preventDefault();

        console.log('Modification de la réservation');
        console.log(formPrenom.current.value, typeof formPrenom.current.value);
        console.log(formNom.current.value, typeof formNom.current.value);
        console.log(formDate.current.value, typeof formDate.current.value);
        console.log(formHeure.current.value, typeof formHeure.current.value);
        console.log(formMail.current.value, typeof formMail.current.value);
        console.log(formFormule.current.value, typeof formFormule.current.value);
        console.log(formQuantite.current.value, typeof formQuantite.current.value);
        console.log("----- Ici on envoie la requête de modification -----");

        const fetchDate = formDate.current.value + ' ' + formHeure.current.value + ':00';

        fetch(`https://api.sinyart.fr/reservations/${data.id_ticket}`, {
            method: 'PUT',
            headers: {
                'Authorization': sessionStorage.getItem('token'),
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                'prenom': formPrenom.current.value,
                'nom': formNom.current.value,
                'date': fetchDate,
                'mail': formMail.current.value,
                'reservationType': parseInt(formFormule.current.value),
                'quantite': parseInt(formQuantite.current.value)
                // Ajoutez ici d'autres champs que vous souhaitez modifier
            })
        })
            .then(response => response.json())
            .then(data => {
                console.log(data)
                console.log('Modification effectuée');
                setOpen(false);
                setModificationFlag();
            })
            .catch((error) => {
                console.error('Error:', error);
            });

        
    };

    console.log(data);

    return (
        <div className={open ? 'modification__container modification__container--open' : 'modification__container modification__container--close'}>
            <h2>Modification de la réservation #{data.id_ticket}</h2>
            < Button classe='modification__close' format='icon' icon='back' action={() => setOpen(false)} title='annuler' />
            <form className="modification__form" onSubmit={fetchmodification}>
                <input className='modification__input modification__input--prenom' type="text" ref={formPrenom} name="prenom" defaultValue={data.prenom} placeholder="Prénom" required />
                <input className='modification__input modification__input--nom' type="text" ref={formNom} name="nom" defaultValue={data.nom} placeholder="Nom" required />
                <input className='modification__input modification__input--date' type="date" ref={formDate} name="date" defaultValue={formDay} min="2024-03-28" max="2024-04-28" required />
                <input className='modification__input modification__input--heure' type="time" ref={formHeure} name="heure" defaultValue={Heure} min="10:00" max="17:30" required />
                <input className='modification__input modification__input--mail' type="text" ref={formMail} name="mail" defaultValue={data.mail} placeholder="exemple@mail.com" required />
                <select className='modification__select' ref={formFormule} name="formule" required>
                    {
                        data.nom_formule_fr === "adulte" ? <option value="1" selected>Adulte</option> : <option value="1">Adulte</option>
                    }
                    {
                        data.nom_formule_fr === "jeune" ? <option value="2" selected>Jeune</option> : <option value="2">Jeune</option>
                    }
                    {
                        data.nom_formule_fr === "handicap" ? <option value="3" selected>Handicap</option> : <option value="3">Handicap</option>
                    }          
                </select>
                <label className='modification__label' htmlFor="quantite">x</label>
                <input className='modification__input modification__input--quantite' type="number" ref={formQuantite} name="quantite" defaultValue={data.quantite} min="1" required />
                < Button classe='modification__submit' type='submit' title='Valider'>Valider</Button>
            </form>
        </div>
    );
}



// <td>
//     {/* ID de la réséervation */}
//     {formattedId}
// </td>
// <td className={classesTable_object['table__cellule--user']}>
//     {/* Utilisateur */}
//     <img src={liste.img} className={classesTable_object['user__icon']} alt="" />
//     {
//         modificationObjectFlag ? <input type="text" name="prenom" defaultValue={liste.prenom} placeholder="Prénom" required /> : liste.prenom
//     } {
//         modificationObjectFlag ? <input type="text" name="nom" defaultValue={liste.nom} placeholder="Nom" required /> : liste.nom
//     }
// </td>
// <td>
//     {/* Date de la réservation */}
//     {
//         modificationObjectFlag ? <input type="date" name="date" defaultValue={formDay} min="2024-03-28" max="2024-04-28" required /> : < DatePills variant="day">{Jour}</DatePills>
//     }
// </td>
// <td>
//     {/* Créneau réservé */}
//     {
//         modificationObjectFlag ? <input type="time" name="heure" defaultValue={Heure} min="10:00" max="17:30" required /> : < DatePills variant="hour">{Heure}</DatePills>
//     }
// </td>
// <td>
//     {/* Formule choisie */}
//     < Label variant={liste.nom_formule_fr}>{liste.nom_formule_fr}</Label>
// </td>
// <td>
//     {/* Mail */}
//     {
//         modificationObjectFlag ? <input type="url" name="mail" defaultValue={liste.mail} placeholder="exemple@mail.com" pattern="*@*.*" required /> : liste.mail
//     }
// </td>
// <td>
//     {/* Prix */}
//     {liste.prix}€
// </td>
// <td>
//     {/* Quantité */}
//     x {
//         modificationObjectFlag ? <input type="number" name="quantite" defaultValue={liste.quantite} min="1" required /> : liste.quantite
//     }
// </td>

// {/* Action */}
// {variant === 'modification' && (
//     <td className={classesTable_object['table__cellule--action']}>
//         < Button variant="primary" title="Modifier" action={() => modifyObject()}>Modifier</Button>

//         < Button format="icon" title="Suprimer" icon="trash" action={() => DelModViewResa['deleteResa'](liste.id_ticket, "reservation")}>
//             <span className='icon_alt'>Supprimer</span>
//         </Button>

//         < Button format="icon" title="Voir" icon="eye" action={() => DelModViewResa['viewResa'](liste.id_ticket, "reservation")}>
//             <span className='icon_alt'>Voir</span>
//         </Button>
//     </td>
// )}