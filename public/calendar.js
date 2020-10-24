class Calendar {
    // this.event = [];

    constructor ()
    {
        this.calendarEl = document.getElementById('calendar');
        this.calendar = new FullCalendar.Calendar(this.calendarEl, {
            locale: 'fr',
            themeSystem: 'bootstrap',
            initialView: 'dayGridMonth',
            schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,listMonth'
            },
            buttonText: {
                today: 'Aujourd\'hui',
                month: 'Mois',
                week: 'Semaine',
                day: 'Jour',
                list: 'Liste'
            }
        });
    }

    makeCalendar ()
    {
        this.calendar.render();
    }

    // creatEvent (name, location, begin, end, description)
    // {
    // this.event.push({
    //     title: name,
    //     start = date,
    //     end = end
    //     })
    // }
}