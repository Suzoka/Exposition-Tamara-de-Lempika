import './button.css';

export const Button = ({ children, icon, format, action, title, classe, type }) => {

    const className = `button__container ${
        format === 'icon' ? 'button__container--icon' 
        : ''
    } ${
        icon === 'trash' ? 'button__icon--trash' 
        : icon === 'eye' ? 'button__icon--eye' 
        : icon === 'cross' ? 'button__icon--cross'
        : icon === 'back' ? 'button__icon--back'
        : ''
    } ${
        classe && classe
    }`;

    return (
        action ? 
        <button type={type ? type : ''} title={title} onClick={() => action()} className={className}>
            {children}
        </button>
        : <button type={type ? type : ''} title={title} className={className}>
            {children}
        </button>
    );

}