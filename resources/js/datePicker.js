import Datepicker from 'flowbite-datepicker/Datepicker';
const startDate = document.getElementById('startDate');
new Datepicker(startDate, {
    autohide: true,
    format: "yyyy-mm-dd",
}); 
const endDate = document.getElementById('endDate');
new Datepicker(endDate, {
    autohide: true,
    format: "yyyy-mm-dd",
});