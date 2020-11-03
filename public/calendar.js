class Calendar {

    constructor ()
    {
        this.events = [];
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
            },
            events: this.events
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
        let members = [];
        $('input:checked').each(function ()
        {
            let name = $(this).val();
            members.push(name);
        }
        )

        let beginning = $('#eventStart').val() + " " + $('#eventStartTime').val();
        let end = $('#eventEnd').val() + " " + $('#eventEndTime').val();
        // Creation de l'objet event au format JSON
        $.post(
            '/models/creatEvent.php',
            {
                eventName: $('#eventName').val(),
                eventLocalisation: $('#eventLocalisation').val(),
                eventStart: beginning,
                eventEnd: end,
                eventDescription: $('#eventDescription').val(),
                eventMember: members
            }
        )
    }

    // Recuperation des evenements depuis la BDD 
    getEvent()
    {
        $.get(
            '/models/getEvent.php',
            'false',
            function (data)
            {
                // si aucun evenement dans la BDD
                if (data == null) {
                    this.events = [];
                }
                // sinon
                else {
                    // Creation d un tableau ephemere pour stocker les données qui nous interesse (uniquement le titre, debut et fin d un evenement)
                    let eventList = [];
                    // Boucle pour parcourir data(un tableau JSON) et ajouter a notre tableau ephemere les données en question
                    for (let event of data)
                    {
                        eventList.push({
                            "title": event.eventName,
                            "start": event.eventStart,
                            "end": event.eventEnd
                        });
                        console.log(event.EventName);
                    }
                    this.events = eventList;
                    // Pour tester le resultat:
                    console.log(data);
                    console.log(this.events);
                }
            },
            'JSON'
        )
    }
}
