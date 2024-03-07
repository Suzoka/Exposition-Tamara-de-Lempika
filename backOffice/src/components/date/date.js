import './date.css';

export const Date = ({ children, variant }) => {

    const className = `date__container 
    ${
        variant === 'day' ? 'date__container--day'
        : variant === 'hour' ? 'date__container--hour' 
        : ''
    }`;

    return (
        <button className={className}>
            {children}
        </button>
    );

};