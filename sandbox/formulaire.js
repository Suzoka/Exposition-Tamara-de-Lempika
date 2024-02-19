const datepicker = new Datepicker(document.querySelector('div#date'), {
    inline: true
});

let hiddenInput = document.createElement('input');
hiddenInput.type = 'hidden';
hiddenInput.name = 'datePicker';
document.querySelector('form').appendChild(hiddenInput);
hiddenInput.value = datepicker.getDate('yyyy-mm-dd');

datepicker.element.addEventListener('changeDate', function() {
    hiddenInput.value = datepicker.getDate('yyyy-mm-dd');
});