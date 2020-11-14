class Calendar {

    constructor ()
    {
        
    }

    // Creation du calendrier
    makeCalendar ()
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
                // Affichage/masquage de l'agenda et du formulaire d'information sur l evenement
                $('#infosEvent').toggle();
                $('#divAgenda').toggle();
                // Recuperation du nom et prenom de l organisateur de l'evenement
                let memberInEvent = this.getMembersInEvent(infos.event.id);
                let creator;
                for (let member of memberInEvent) {
                    if (member.id == infos.event.extendedProps.creator) {
                        creator = member.nom + ' ' + member.prenom;
                    }
                }
                // Remplissage des informations du formulaire
                $('#infosEventTitle').text(infos.event.title);
                $('#infosEventCreator').text(creator);
                $('#infosEventDescription').text(infos.event.extendedProps.description);
                $('#infosEventLocalisation').text(infos.event.extendedProps.localisation);
                $('#infosEventId').val(infos.event.id);
                // Recuperation des participants
                let memberList = this.getMembersInEvent(infos.event.id);
                for (let member of memberList) {
                    $('#infosEventMembers').append('<li>' + member.nom + ' ' + member.prenom + '</li>');
                }
                // Recuperation de la participation a l evenement
                let participationAnswer = this.getParticipation(infos.event.id, $('#memberId ').val());
                let answer;
                if (participationAnswer == "yes") {
                    answer = "Je participe !"
                }
                else if (participationAnswer == "no") {
                    answer = "Je ne participe pas"
                }
                else if (participationAnswer == "maybe") {
                    answer = "Je ne sais pas"
                } else {
                    answer = "Vous n'avez pas encore répondu"
                }
                $('#participation-answer').text(answer);
            }
        });
        this.calendar.render();
    }

    // Creation d un evenement
    creatEvent()
    {
        // Tableau des membres participants
        let members = [];
        // Recuperation des boutons radio checked (correspondant aux membres participants)
        $('input:checked').each(function () {
            let name = $(this).val();
            members.push(name);
        });
        members.push($('#eventCreator').val());
        // Debut et Fin de l'evenement au format DATETIME
        let beginning = $('#eventStart').val() + " " + $('#eventStartTime').val();
        let end = $('#eventEnd').val() + " " + $('#eventEndTime').val();
        // Envoi des données en AJAX
        $.ajaxSetup({async: false});
        $.post(
            '/models/jsRequest/creatEvent.php',
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
        $('#eventName').val(null);
        $('#eventLocalisation').val(null);
        $('#eventStart').val(null);
        $('#eventStartTime').val(null);
        $('#eventEnd').val(null);
        $('#eventEndTime').val(null);
        $('#eventDescription').val(null);
        $('#eventCreator').val(null);
    }

    // Recuperation des evenements depuis la BDD 
    getEvent()
    {
        let memberId = $('#memberId').val();
        let result;
        $.ajaxSetup({ async: false });
        $.get(
            // 
            '/models/jsRequest/getEvent.php?memberId=' + memberId,
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
            '/models/jsRequest/getMembers.php?eventId=' + eventId,
            true,
            function (data) {
                for (let member of data)
                {
                    memberList.push({
                        "nom": member.nom,
                        "prenom": member.prenom,
                        "pseudo": member.pseudo,
                        "id": member.member_id
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
            '/models/jsRequest/getAllMembers.php',
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
            'models/jsRequest/deleteEvent.php',
            {
                eventId: $('#infosEventId').val()
            }
        )
    }

    setParticipation(participation)
    {
        $.post(
            '/models/jsRequest/setParticipation.php',
            {
                participation: participation,
                eventId: $('#infosEventId').val(),
                memberId: $('#memberId').val()
            }
        )
    }

    getParticipation(eventId, memberId) {
        let answer;
        $.get(
            '/models/jsRequest/getParticipation.php?eventId=' + eventId + '&memberId=' + memberId,
            true,
            function (data) {
                for (let tab of data) {
                    answer = tab.participation;
                console.log(answer);
                }  
            },
            'JSON'
        )
        return answer
    }
}
