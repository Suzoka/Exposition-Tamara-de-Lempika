import Image from 'next/image';
import Trash from '../../public/asset/icon/Trash-2.svg';
import Eye from '../../public/asset/icon/Eye.svg';

import { Button } from "@/components/button/button";
import { Date } from "@/components/date/date";
import { Label } from "@/components/label/label";
import { Table } from '@/components/table/table';
import { SearchBar } from '@/components/search_bar/search_bar';
import { Header } from '@/components/header/header';
import { Section } from '@/components/section/section';

const reservation = [
  {
    id: 1,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Lorem Leseul",
    date: "07/03/2024",
    creneau: "10:30",
    formule: "Adulte",
    mail: "lorem.leseul@gmail.com",
    prix: "15",
    quantite: 2
  },
  {
    id: 2,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Jaqueline Leseul",
    date: "07/03/2024",
    creneau: "10:30",
    formule: "Jeune",
    mail: "jaqueline@gmail.com",
    prix: "10",
    quantite: 1
  },
  {
    id: 3,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Jean Leseul",
    date: "07/03/2024",
    creneau: "10:30",
    formule: "Handicap",
    mail: "leseul7750@gmail.com",
    prix: "5",
    quantite: 1
  },
  {
    id: 4,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Alice Leseul",
    date: "08/03/2024",
    creneau: "11:30",
    formule: "Jeune",
    mail: "alice@gmail.com",
    prix: "20",
    quantite: 3
  },
  {
    id: 5,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Bob Leseul",
    date: "09/03/2024",
    creneau: "12:30",
    formule: "Adulte",
    mail: "bob@gmail.com",
    prix: "25",
    quantite: 2
  },
  {
    id: 6,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Charlie Leseul",
    date: "10/03/2024",
    creneau: "13:30",
    formule: "Handicap",
    mail: "charlie@gmail.com",
    prix: "30",
    quantite: 1
  },
  {
    id: 7,
    img: "https://media.tenor.com/heNpt7nplrkAAAAM/davegrohl-dave.gif",
    utilisateur: "Dave Grohl",
    date: "11/03/2024",
    creneau: "14:30",
    formule: "Handicap",
    mail: "dave@gmail.com",
    prix: "35",
    quantite: 2
  },
  {
    id: 8,
    img: "https://awarewomenartists.com/wp-content/uploads/2017/05/portrait_tamara-de-lempicka_aware_women-artists_artistes-femmes-1076x1500.jpg",
    utilisateur: "Eve Leseul",
    date: "12/03/2024",
    creneau: "15:30",
    formule: "Adulte",
    mail: "eve@gmail.com",
    prix: "40",
    quantite: 3
  }
]

export default function Home() {
  return (
    <div>
      < Header />
      <main id='main'>
        <h1>Bienvenue sur votre Back office.</h1>
        <p>Ici vous pouvez consulter et gérer les réservations et les utilisateurs, ainsi que visualiser les statistiques de votre exposition <span className='bold'>Tamara de Lempicka, les années folles</span>.</p>
        
        < Section id="stat" nom="Statistiques" type="stat" />
        < Section id="resa" nom="Réservations" donnee={reservation} type="table" contentSearch="Rechercher une reservation..."  />
        < Section id="user" nom="Utilisateurs" donnee={reservation} type="table" contentSearch="Rechercher un utilisateur..." />
      </main>
    </div>
  );
}
