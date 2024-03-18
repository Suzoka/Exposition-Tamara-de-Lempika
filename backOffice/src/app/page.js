'use client';

import { useEffect, useState } from 'react';

import { Header } from '@/components/header/header';
import { Section } from '@/components/section/section';
import { Footer } from '@/components/footer/footer';
import { reservation } from '@/components/reservation';

console.log('---------');

const user = {
  'token': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InN1em9rYSIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTcxMDc1Nzk0NiwiZXhwIjoxNzEwODQ0MzQ2fQ.-0tfWAE-6v7sIDYWP1VANVDa0BZYmX2i9VxqKNfjSKE'
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

  const deleteResa = (id) => {
    console.log('Suppresion de la réservation n°', id);
  }

  const modifyResa = (id) => {
    console.log('Modification de la réservation n°', id);
  }

  const viewResa = (id) => {
    console.log('Visualisation de la réservation n°', id);
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
          console.log(data)

          setReservation(data);
          setLoadReservation(true);
          console.log('reservation', reservationData);

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
          console.log(data)

          setArchived(data);
          setLoadArchived(true);
          console.log('archives', archivedData);

        })
        .catch((error) => {
          console.error('Error:', error);
        });
    };

    fetchReservation();
    fetchArchived();

    if (loadReservation && loadArchived) {
      setLoadEnd(true);
    }
  }, []);

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
        < Section id="resa" nom="Réservations" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher une reservation..." DelModViewResa={DelModViewResa} />
        < Section id="user" nom="Utilisateurs" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher un utilisateur..." DelModViewResa={DelModViewResa} />
        < Section id="arch" nom="Archives" donnee={loadArchived ? (archivedData) : (reservation)} type="table" contentSearch="Rechercher une reservation archivé..." DelModViewResa={DelModViewResa} />
      </main>
      < Footer />
    </div>
  );
}
