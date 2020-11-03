document.addEventListener('DOMContentLoaded', function () {
    let calendar = new Calendar();
    calendar.makeCalendar();
});

$(document).ready(function () {

    $('#btnCreatEvent').on('click', function () {
        let calendar = new Calendar();
        calendar.creatEvent();
    });
    $('#btnGetEvent').on('click', function () {
        let calendar = new Calendar();
        calendar.getEvent();
    });

});
