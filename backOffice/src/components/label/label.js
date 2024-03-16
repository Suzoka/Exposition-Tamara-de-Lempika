import './label.css';

export const Label = ({ children, variant }) => {
    
    const className = `label__container ${
        variant === 'adulte' ? 'label__container--blue' 
        : variant === 'jeune' ? 'label__container--green' 
        : variant === 'handicap' ? 'label__container--yellow' 
        : ''
    }`;

    return (
        <p className={className}>
            {children}
        </p>
    );
};