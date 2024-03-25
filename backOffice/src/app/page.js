'use client';

import { useEffect, useState } from 'react';

import { Header } from '@/components/header/header';
import { Section } from '@/components/section/section';
import { Footer } from '@/components/footer/footer';
import { reservation } from '@/components/reservation';
import { Pop_up } from '@/components/pop_up/pop_up';
import { Connexion } from '@/components/connexion/connexion';
import { ModificationPop } from '@/components/modfication_pop/modification_pop';

console.log('---------');

export default function Home() {

  const [modificationFlag, setModificationFlag] = useState(0);
  const [connexionFlag, setConnexionFlag] = useState();

  useEffect(() => {
    if (sessionStorage.getItem('token')) {
      console.log('Connexion réussie');
      setConnexionFlag(true);
    }
  }, []);

  const deconnexion = () => {
    console.log('Déconnexion');
    sessionStorage.removeItem('token');
    setConnexionFlag(false);
  }

  const [popupClosed, setPopupClosed] = useState(true);
  const [popupDonnee, setPopupDonnee] = useState(null);
  const [popupType, setPopupType] = useState('');
  const [modificationPopupOpen, setmodificationPopupOpen] = useState(false);
  const [modificationData, setModificationData] = useState([]);
  const [modificationPopupType, setModificationPopupType] = useState('');

  const closePopUp = () => {
    setPopupClosed(true);
  }

  const deleteResa = (id, type) => {

    if (type === 'reservation') {
      console.log('Suppresion de la réservation n°', id);

      fetch(`https://api.sinyart.fr/reservations/${id}`, {
        method: 'DELETE',
        headers: {
          'Authorization': sessionStorage.getItem('token')
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

      fetch(`https://api.sinyart.fr/users/${id}`, {
        method: 'DELETE',
        headers: {
          'Authorization': sessionStorage.getItem('token')
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
    }
  }

  const modifyResa = (id, type) => {

    setmodificationPopupOpen(false);

    if (type === 'reservation') {

      console.log('Modification de la réservation n°', id);
      const reservation = reservationData.find(resa => resa.id_ticket == id);
      console.log('Données réservation', reservation);
      setModificationPopupType('reservation');
      setModificationData(reservation);

    } else if (type === 'user') {
      
      console.log('Modification de l\'utilisateur n°', id);
      const utilisateur = userList.find(user => user.id_user == id);
      console.log('Données utilisateur', utilisateur);
      setModificationPopupType('user');
      setModificationData(utilisateur);
    }

    setmodificationPopupOpen(true);
  }

  const viewResa = (id, type) => {
    if (type === 'reservation') {

      console.log('Visualisation de la réservation n°', id);
      const reservation = reservationData.find(resa => resa.id_ticket == id);
      console.log('Données réservation', reservation);
      setPopupType('reservation');
      setPopupDonnee(reservation);
      setPopupClosed(false);

    } else if (type === 'user') {
      console.log('Visualisation de l\'utilisateur n°', id);
      const utilisateur = userList.find(user => user.id_user == id);
      console.log('Données utilisateur', utilisateur);
      setPopupType('user');
      setPopupDonnee(utilisateur);
      setPopupClosed(false);
    }
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

      console.log('--- Chargement des données réservations...');

      await fetch('https://api.sinyart.fr/reservations', {
        method: 'GET',
        headers: {
          'Authorization': sessionStorage.getItem('token')
        }
      }).then(response => response.json())
        .then(data => {
          // console.log(data)

          setReservation(data);
          setLoadReservation(true);
          // console.log('reservation', reservationData);
          console.log('--- Données réservations chargées')

        }).catch((error) => {
          console.error('Error:', error);
        });

    };

    const fetchArchived = async () => {

      console.log('--- Chargement des données archives...');

      await fetch("https://api.sinyart.fr/archives", {
        method: 'GET',
        headers: {
          'Authorization': sessionStorage.getItem('token')
        }
      })
        .then(response => response.json())
        .then(data => {
          // console.log(data)

          setArchived(data);
          setLoadArchived(true);
          // console.log('archives', archivedData);
          console.log('--- Données archives chargées')


        })
        .catch((error) => {
          console.error('Error:', error);
        });
    };

    const fetchUser = async () => {

      console.log('--- Chargement des données utilisateurs...');

      await fetch("https://api.sinyart.fr/users", {
        method: 'GET',
        headers: {
          'Authorization': sessionStorage.getItem('token')
        }
      })
        .then(response => response.json())
        .then(data => {
          // console.log('données utilisateurs', data);
          setUserList(data);
          setLoadUserList(true);
          console.log('--- Données utilisateurs chargées')
        })
        .catch((error) => {
          console.error('Error:', error);
        });
    };

    if (connexionFlag) {
      fetchReservation();
      fetchArchived();
      fetchUser();
    }
  }, [connexionFlag, modificationFlag]);

  useEffect(() => {
    if (loadReservation && loadArchived && loadUserList) {
      setLoadEnd(true);
      console.log('--- Chargement terminé');
    }
  }, [loadReservation, loadArchived, loadUserList]);

  // console.log('reservationData', reservationData);

  return (
    <>
      {connexionFlag ? (
        <>
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

            {modificationPopupOpen && (
              < ModificationPop open={modificationPopupOpen} setOpen={setmodificationPopupOpen} data={modificationData} setModificationFlag={() => setModificationFlag(modificationFlag + 1)} type={modificationPopupType}/>
            )}

            < Pop_up data={popupDonnee != null ? popupDonnee : ''} close={popupClosed} closeAction={closePopUp} type={popupType} />
          </main>
          < Footer deconnexion={deconnexion} />
        </>
      ) : (
        <>
          < Connexion setFlag={(text) => setConnexionFlag(text)} />
        </>
      )}
    </>
  );
}
