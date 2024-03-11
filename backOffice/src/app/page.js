import Image from 'next/image';
import Trash  from '../../public/asset/icon/Trash-2.svg';
import Eye  from '../../public/asset/icon/Eye.svg';

import { Button } from "@/components/button/button";
import { Date } from "@/components/date/date";
import { Label } from "@/components/label/label";
import { Table } from '@/components/table/table';

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
  }
]

export default function Home() {
  return (
    <main> 
      <h1>Home</h1>
      <h2>Reservation</h2>
      < Table donnee={reservation}/>
    </main>
  );
}
