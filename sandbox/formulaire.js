const datepicker = new Datepicker(document.querySelector('div#date'), {
    inline: true,
    language: 'fr',
    minDate: new Date()
});

let hiddenInput = document.createElement('input');
hiddenInput.type = 'hidden';
hiddenInput.name = 'datePicker';
hiddenInput.required = true;
document.querySelector('form').appendChild(hiddenInput);

datepicker.element.addEventListener('changeDate', function () {
    hiddenInput.value = datepicker.getDate('yyyy-mm-dd');
});

document.querySelector('form').addEventListener('submit', function(event) {
    if (hiddenInput.value == '') {
        event.preventDefault();
        alert('Veuillez sélectionner une date.');
    }
});