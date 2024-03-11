import './button.css';

export const Button = ({ children, variant, format }) => {

    const className = `button__container 
    ${
        variant === 'primary' ? 'button__container--primary' 
        : variant === 'secondary' ? 'button__container--secondary' 
        : ''
    }
    ${
        format === 'icon' ? 'button__container--icon' 
        : ''
    }`;

    return (
        <button className={className}>
            {children}
        </button>
    );

}