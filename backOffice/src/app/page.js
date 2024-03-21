'use client';

import { useEffect, useState } from 'react';

import { Header } from '@/components/header/header';
import { Section } from '@/components/section/section';
import { Footer } from '@/components/footer/footer';
import { reservation } from '@/components/reservation';
import { Pop_up } from '@/components/pop_up/pop_up';

console.log('---------');

const user = {
  'token': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InN1em9rYSIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTcxMTAyODYzNCwiZXhwIjoxNzExMTE1MDM0fQ.HoYSWn7CfrxC5PvB-qkGXYOhf48bxDYtpwEV630H3eg'
};

// fetch("https://api.sinyart.fr/adminLogin", {
//   method: 'POST',
//   headers: {
//     'Content-Type': 'application/json'
//   },
//   body: JSON.stringify({
//     'login': 'suzoka',
//     'password': 'azerty'
//   })
// })
// .then(response => response.json())
// .then(data => {
//   if (data.auth === "true") {
//     console.log(data.token);
//   } else {
//     console.log('Authentication failed');
//   }
// })
// .catch((error) => {
//   console.error('Error:', error);
// });

export default function Home() {

  const [modificationFlag, setModificationFlag] = useState(0);

  const [popupClosed, setPopupClosed] = useState(true);
  const [popupDonnee, setPopupDonnee] = useState(null);

  const closePopUp = () => {
    setPopupClosed(true);
  }

  const deleteResa = (id, type) => {

    if (type === 'reservation') {
      console.log('Suppresion de la réservation n°', id);

      fetch(`https://api.sinyart.fr/reservations/${id}`, {
        method: 'DELETE',
        headers: {
          'Authorization': user.token
        }
      })
        .then(response => response.json())
        .then(data => {
          console.log(data)
          //data contient le message de confirmation
        })
        .catch((error) => {
          console.error('Error:', error);
        });
      setModificationFlag(modificationFlag + 1);

    } else if (type === 'user') {
      console.log('Suppresion de l\'utilisateur n°', id);
    }
  }

  const modifyResa = (id, type) => {
    console.log('Modification de la réservation n°', id);
  }

  const viewResa = (id, type) => {
    console.log('Visualisation de la réservation n°', id);
    const reservation = reservationData.find(resa => resa.id_ticket == id);
    console.log('Données réservation', reservation);
    setPopupDonnee(reservation);
    setPopupClosed(false);
  }

  const DelModViewResa = {
    'deleteResa': deleteResa,
    'modifyResa': modifyResa,
    'viewResa': viewResa
  }

  const [reservationData, setReservation] = useState(null);
  const [loadReservation, setLoadReservation] = useState(false);
  const [archivedData, setArchived] = useState(null);
  const [loadArchived, setLoadArchived] = useState(false);
  const [userList, setUserList] = useState(null);
  const [loadUserList, setLoadUserList] = useState(false);
  const [loadEnd, setLoadEnd] = useState(false);

  useEffect(() => {
    const fetchReservation = async () => {
      await fetch('https://api.sinyart.fr/reservations', {
        method: 'GET',
        headers: {
          'Authorization': user.token
        }
      }).then(response => response.json())
        .then(data => {
          // console.log(data)

          setReservation(data);
          setLoadReservation(true);
          // console.log('reservation', reservationData);
          console.log('Données réservations chargées')

        }).catch((error) => {
          console.error('Error:', error);
        });

    };

    const fetchArchived = async () => {
      fetch("https://api.sinyart.fr/archives", {
        method: 'GET',
        headers: {
          'Authorization': user.token
        }
      })
        .then(response => response.json())
        .then(data => {
          // console.log(data)

          setArchived(data);
          setLoadArchived(true);
          // console.log('archives', archivedData);
          console.log('Données archives chargées')


        })
        .catch((error) => {
          console.error('Error:', error);
        });
    };

    const fetchUser = async () => {
      fetch("https://api.sinyart.fr/users", {
        method: 'GET',
        headers: {
          'Authorization': user.token
        }
      })
        .then(response => response.json())
        .then(data => {
          console.log('données utilisateurs', data);
          setUserList(data);
          setLoadUserList(true);
          console.log('Données utilisateurs chargées')
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    };

    fetchReservation();
    fetchArchived();
    fetchUser();
  }, [modificationFlag]);

  useEffect(() => {
    if (loadReservation && loadArchived && loadUserList) {
      setLoadEnd(true);
    }
  }, [loadReservation, loadArchived, loadUserList]);

  // console.log('reservationData', reservationData);

  return (
    <div>
      < Header />
      <main id='main'>
        <h1>Bienvenue sur votre Back office.</h1>
        <p>Ici vous pouvez consulter et gérer les réservations et les utilisateurs, ainsi que visualiser les statistiques de votre exposition <span className='bold'>Tamara de Lempicka, les années folles</span>.</p>

        {loadEnd ? (
          <p>Données chargées</p>
        ) : (
          <p>Chargement des données...</p>
        )}

        < Section id="stat" nom="Statistiques" type="stat" donnee={loadReservation ? (reservationData) : (reservation)} />
        < Section id="resa" nom="Réservations" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher une reservation..." DelModViewResa={DelModViewResa} modification />
        < Section id="user" utilisateur nom="Utilisateurs" donnee={loadUserList ? (userList) : (reservation)} type="table" contentSearch="Rechercher un utilisateur..." DelModViewResa={DelModViewResa} />
        < Section id="arch" nom="Archives" donnee={loadArchived ? (archivedData) : (reservation)} type="table" contentSearch="Rechercher une reservation archivé..." DelModViewResa='' />
        < Pop_up data={popupDonnee != null ? popupDonnee : ''} close={popupClosed} closeAction={closePopUp} />
      </main>
      < Footer />
    </div>
  );
}
