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

  const [reservationData, setReservation] = useState(null);
  const [loadReservation, setLoadReservation] = useState(false);

  useEffect(() => {
    const fetchReservation = async () => {
      const res = await fetch('https://api.sinyart.fr/reservations"', {
        method: 'GET',
        headers: {
          'Authorization': user.token
        }
      });
      const data = await res.json();
      console.log(data);
      setReservation(data);
      setLoadReservation(true);
      console.log('reservation', reservationData);
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

        < Section id="stat" nom="Statistiques" type="stat" />
        < Section id="resa" nom="Réservations" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher une reservation..."  />
        < Section id="user" nom="Utilisateurs" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher un utilisateur..." />
        < Section id="arch" nom="Archives" donnee={loadReservation ? (reservationData) : (reservation)} type="table" contentSearch="Rechercher une reservation archivé..."  />
      </main>
      < Footer />
    </div>
  );
}
