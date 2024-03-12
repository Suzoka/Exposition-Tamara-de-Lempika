import './label.css';

export const Label = ({ children, variant }) => {
    
    const className = `label__container ${
        variant === 'Adulte' ? 'label__container--blue' 
        : variant === 'Jeune' ? 'label__container--green' 
        : variant === 'Handicap' ? 'label__container--yellow' 
        : ''
    }`;

    return (
        <p className={className}>
            {children}
        </p>
    );
};