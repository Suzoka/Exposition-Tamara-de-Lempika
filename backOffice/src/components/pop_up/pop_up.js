import './pop_up.css'

export const Pop_up = ({ data, close, closeAction }) => {
    return (
        <div className={close ? 'pop_up__container--close' : 'pop_up__container--open'}>
                <h2>Reservation n°{data.id_ticket}</h2>
                <button onClick={closeAction}>X</button>
            <div className='pop_up__content'>
                <p>{data.prenom} {data.nom}</p>
                <p>{data.mail}</p>
                <p>{data.date}</p>
                <p>{data.quantite}</p>
                <p>{data.prix}€</p>
                <p>{data.nom_formule}</p>
            </div>
        </div>
    )
}