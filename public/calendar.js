class Calendar {

    constructor ()
    {
        this.events = this.getEvent();
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
            events: this.events,
            eventDisplay: 'block',
            eventClick: (infos) => {
                $('#infosEvent').toggle(),
                $('#divAgenda').toggle(),
                $('#infosEventTitle').text(infos.event.title),
                $('#infosEventCreator').text(infos.event.extendedProps.creator),
                $('#infosEventDescription').text(infos.event.extendedProps.description),
                $('#infosEventLocalisation').text(infos.event.extendedProps.localisation),
                $('#infosEventId').val(infos.event.id);
                
                let memberList = this.getMembersInEvent(infos.event.id)
                for (let member of memberList)
                {
                    $('#infosEventMembers').append('<li>'+member.nom + ' ' + member.prenom+'</li>');
                }
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
        // Tableau des membres participants
        let members = [];
        // Recuperation des bouton radio checked
        $('input:checked').each(function ()
        {
            let name = $(this).val();
            members.push(name);
        }
        )
        members.push($('#eventCreator').val());
        // Debut et Fin de l'evenement au format DATETIME
        let beginning = $('#eventStart').val() + " " + $('#eventStartTime').val();
        let end = $('#eventEnd').val() + " " + $('#eventEndTime').val();
        // Envoi des données en AJAX
        $.post(
            '/models/creatEvent.php',
            {
                eventName: $('#eventName').val(),
                eventLocalisation: $('#eventLocalisation').val(),
                eventStart: beginning,
                eventEnd: end,
                eventDescription: $('#eventDescription').val(),
                eventMember: members,
                eventCreator: $('#eventCreator').val()
            }
        );
    }

    // Recuperation des evenements depuis la BDD 
    getEvent()
    {
        let memberId = $('#memberId').val();
        let result;
        $.ajaxSetup({ async: false });
        $.get(
            // 
            '/models/getEvent.php?memberId='+memberId,
            'true',
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
                            "title":event.eventName,
                            "start":event.eventStart,
                            "end": event.eventEnd,
                            "id": event.event_id,
                            "localisation": event.eventLocalisation,
                            "description": event.eventDescription,
                            "creator": event.eventCreator

                        });
                    }
                    result = eventList;
                }
            },
            'JSON'
        )
       return result;
    }

    getMembersInEvent(event_id)
    {
        let eventId = event_id;
        let memberList = [];
        $.get(
            '/models/getMembers.php?eventId=' + eventId,
            true,
            function (data) {
                for (let member of data)
                {
                    memberList.push({
                        "nom": member.nom,
                        "prenom": member.prenom,
                        "pseudo": member.pseudo,
                        "id": member.id
                    })  
                }            
            },
            'JSON'            
        )
        return memberList;
    }

    getAllMembers()
    {
        let allMembers = [];
        $.get(
            '/models/getAllMembers.php',
            false,
            function (data) {
                for (let member of data) {
                    // Pour ne pas afficher le createur dans la liste
                    if (member.id != $('#memberId').val()) {
                        allMembers.push({
                            "nom": member.nom,
                            "prenom": member.prenom,
                            "pseudo": member.pseudo,
                            "id": member.id
                        })
                    }
                }
            },
            'JSON'
        )  
        return allMembers;
    }

    deleteEvent()
    {
        $.post(
            'models/deleteEvent.php',
            {
                eventId: $('#infosEventId').val()
            }
        )
    }

    getTest()
    {
        let memberId = $('#memberId').val();
        let result;
        $.ajaxSetup({
            async: false
        });
        $.get(
                '/models/getEvent.php?memberId=' + memberId,
                'true',
            function (data) {
                console.log(data);
            }
        )
    }
}
