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
    creatEvent()
    {
        // Creation de l'objet event au format JSON
        $.post(
            'test.php',
            {
                eventName: $('#eventName').val(),
                eventLocalisation: $('#eventLocalisation').val(),
                eventStart: $('#eventStart').val(),
                eventEnd: $('#eventEnd').val(),
                eventDescription: $('#eventDescription').val(),
                eventMember: $('input:checked').val()
            },
            function (data)
            {
                $('#alertMessage').html("<p>"+data+"</p>");
            },
            'text'
        )
    }
}