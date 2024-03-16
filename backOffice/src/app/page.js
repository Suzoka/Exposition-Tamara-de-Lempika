'use client';

import { useEffect, useState } from 'react';

import { Header } from '@/components/header/header';
import { Section } from '@/components/section/section';
import { Footer } from '@/components/footer/footer';
import { reservation } from '@/components/reservation';

console.log('---------');

const user = {
  'token': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJsb2dpbiI6InN1em9rYSIsInJvbGUiOiJhZG1pbiIsImlhdCI6MTcxMDUyMDQ2MSwiZXhwIjoxNzEwNjA2ODYxfQ.WwY1yrGn4mqRYYUUv7XvletxUgYeVq9nfazgFysxNLM'
};

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
    fetchReservation();
  }, []);

  return (
    <div>
      < Header />
      <main id='main'>
        <h1>Bienvenue sur votre Back office.</h1>
        <p>Ici vous pouvez consulter et gérer les réservations et les utilisateurs, ainsi que visualiser les statistiques de votre exposition <span className='bold'>Tamara de Lempicka, les années folles</span>.</p>
        
        {loadReservation ? (
          <p>Données chargées</p>
        ) : (
          <p>Chargement des données...</p>
        )}

        < Section id="stat" nom="Statistiques" type="stat" donnee={loadReservation ? (reservationData) : (reservation)} />
        < Section id="resa" nom="Réservations" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher une reservation..." DelModViewResa={DelModViewResa} />
        < Section id="user" nom="Utilisateurs" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher un utilisateur..." DelModViewResa={DelModViewResa} />
        < Section id="arch" nom="Archives" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher une reservation archivé..." DelModViewResa={DelModViewResa} />
      </main>
      < Footer />
    </div>
  );
}
