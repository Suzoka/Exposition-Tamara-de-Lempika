'use client';
import { Button } from '../button/button';
import './pop_up.css';
import { useState, useEffect } from 'react';


export const Pop_up = ({ data, close, closeAction }) => {

    const [date, setDate] = useState(new Date());
    const [qr_code, setQr_code] = useState("");
    const [code, setCode] = useState("");


    useEffect(() => {
        const sources = ["./asset/ego_morgan.svg", "./asset/mon_ego.svg", "./asset/message_secret.svg", "./asset/shooting_star.svg"];
        setQr_code(sources[Math.floor(Math.random() * sources.length)]);

        let codeRep = "";
        const cara = ["A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
        for (let i = 0; i < 16; i++) {
            codeRep += cara[Math.floor(Math.random() * cara.length)];
        }

        setCode(codeRep);
        setDate(new Date(data.date));
    }, [data.id_ticket]);

    return (
        <div className={close ? 'pop_up__container--close' : 'pop_up__container--open'}>
            <div className='pop_up__content'>
                <h2>Reservation #{data.id_ticket}</h2>
                <p className="bold">{data.prenom} <span className="uppercase">{data.nom}</span></p>
                <p>{data.mail}</p>
                <p>{date.getDate().toString().padStart(2, '0')}/{(date.getMonth() + 1).toString().padStart(2, '0')}/{date.getFullYear()}</p>
                <p>{date.getHours().toString().padStart(2, '0')}:{date.getMinutes().toString().padStart(2, '0')}</p>
                <p>Quantité : {data.quantite}</p>
                <p>Prix : {data.prix === 0 ? "Gratuit" : data.prix+'€'}</p>
                <p className="firstletter">{data.nom_formule}</p>
            </div>
            <div className='pop_up__codeBox'>
                <img className="pop_up__QR" src={qr_code} alt='' />
                <p className="pop_up__code">{code}</p>
            </div>
            < Button classe='pop_up__button' format='icon' icon='cross' action={closeAction} title='Fermer' />
        </div>
    )
}