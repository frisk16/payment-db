const addDateForm = document.getElementById('date');

flatpickr(addDateForm, {
    locale: 'ja',
    dateFormat: 'Y/m/d',
    minDate: '2022/01/01',
    defaultDate: new Date(),
});


const editDateForm = document.getElementById('editDate');

flatpickr(editDateForm, {
    locale: 'ja',
    dateFormat: 'Y/m/d',
    minDate: '2022/01/01',
});
