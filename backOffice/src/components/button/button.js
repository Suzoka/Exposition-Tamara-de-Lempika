import './button.css';

export const Button = ({ children, icon, format }) => {

    const className = `button__container ${
        format === 'icon' ? 'button__container--icon' 
        : ''
    } ${
        icon === 'trash' ? 'button__icon--trash' 
        : icon === 'eye' ? 'button__icon--eye' 
        : ''
    }`;

    return (
        <button className={className}>
            {children}
        </button>
    );

}