const datepicker = new Datepicker(document.querySelector('div#date'), {
    inline: true,
    language: 'fr',
    minDate: new Date()
});

let hiddenInput = document.createElement('input');
hiddenInput.type = 'hidden';
hiddenInput.name = 'datePicker';
document.querySelector('form').appendChild(hiddenInput);

datepicker.element.addEventListener('changeDate', function () {
    hiddenInput.value = datepicker.getDate('yyyy-mm-dd');
});

// document.querySelector('form').addEventListener('submit', function(event) {
//     if (hiddenInput.value == '') {
//         event.preventDefault();
//         alert('Veuillez sélectionner une date.');
//     }
// });


document.querySelectorAll("div.heure label").forEach(label => {
    label.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' || event.keyCode === 13) {
            let radioButton = document.querySelector('#' + this.getAttribute('for'));
            radioButton.checked = true;
        }
    });
});

document.querySelectorAll("button.confirmer").forEach(button => {
    button.addEventListener('click', function(event) {
        document.querySelector('#' + event.target.parentElement.parentElement.getAttribute('id')).style.display = 'none';
        document.querySelector('#step' + (parseInt(event.target.parentElement.parentElement.getAttribute('id').replace("step",""))+1)).style.display = 'block';
    });
});

document.querySelectorAll("button.retour").forEach(button => {
    button.addEventListener('click', function(event) {
        document.querySelector('#' + event.target.parentElement.parentElement.getAttribute('id')).style.display = 'none';
        document.querySelector('#step' + (parseInt(event.target.parentElement.parentElement.getAttribute('id').replace("step",""))-1)).style.display = 'block';
    });
});