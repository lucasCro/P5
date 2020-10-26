class Calendar {

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

    // Creation du calendrier
    makeCalendar ()
    {
        this.calendar.render();
    }

    // Creation d un evenement
    creatEvent ()
    {
        // Definition des variables
        let name = $('eventName');
        let localisation = $('eventLocalisation');
        let start = $('eventStart');
        let end = $('eventEnd');
        let description = $('eventDescription');
        let members = $('input:checked');

        // Creation de l'objet event au format JSON
        $.ajax({
            url: 'evenements.json',
            type: 'POST'
        })
    }
}