document.addEventListener('DOMContentLoaded', function () {
    let calendar = new Calendar();
    calendar.makeCalendar();
});

$('#btnCreatEvent').on('click', function () {
    let calendar = new Calendar();
    calendar.creatEvent();
});