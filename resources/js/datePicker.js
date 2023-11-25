import Datepicker from 'flowbite-datepicker/Datepicker';

const startDate = document.getElementById('startDate');
const endDate = document.getElementById('endDate');

new Datepicker(startDate, {
    autohide: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    minDate : new Date(),
    
}); 

new Datepicker(endDate, {
    autohide: true,
    format: "yyyy-mm-dd",
    todayHighlight: true,
    minDate : new Date(),
});