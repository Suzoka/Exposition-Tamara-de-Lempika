import './button.css';

export const Button = ({ children, icon, format, action, title, classe }) => {

    const className = `button__container ${
        format === 'icon' ? 'button__container--icon' 
        : ''
    } ${
        icon === 'trash' ? 'button__icon--trash' 
        : icon === 'eye' ? 'button__icon--eye' 
        : icon === 'cross' ? 'button__icon--cross'
        : ''
    } ${
        classe && classe
    }`;

    return (
        <button title={title} onClick={() => action()} className={className}>
            {children}
        </button>
    );

}