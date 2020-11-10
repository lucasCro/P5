$(document).ready(function () {

// PROFIL
    // Bouton deverouillage champs Mot de passe:
    $('#btnLockClose').on('click', function () {
        $('#imgBtnClose').toggle();
        $('#imgBtnOpen').toggle();
        // Deverouille le champs mot de passe
        if ($('#imgBtnOpen').css('display') != 'none')
        {
            $('#passwordInput').removeAttr('readonly');
        }
        else
        {
            $('#passwordInput').attr('readonly', 'true');
        }
        $('#div_btnChangePassword').toggle();
    })
    
// INTERACTION PAGE AGENDA
    
    // INITIALISATION AGENDA
    let calendar = new Calendar();
    calendar.makeCalendar();
    
    // CREATION EVENEMENT :
    // Bouton Ajout evenement (sur la page agenda, pour faire apparaitre le formulaire)
    $('#btnAddEvent').on('click', function () {
        $('#divCreateEvent').css('display', 'flex');
        let calendar = new Calendar();
        let allMembers = calendar.getAllMembers();
        for (let member of allMembers) {
            $('#div_memberInEvent').append('<div class="row mb-1"><label for="eventMember' + member.id + '" class="form-check-label col-4">' + member.nom + ' ' + member.prenom + '</label><input type="checkbox" class="form-check-input col-4" id="eventMember' + member.id + '" name="' + member.id + '" value="' + member.id + '"></div>')
        }
        $('#divAgenda').css('display', 'none');
    })
    
    // Bouton confirmation de la creation evenement ("Envoyer" dans le formulaire de creation)
    $('#btnCreatEvent').on('click', function () {
        let calendar = new Calendar();
        calendar.creatEvent();
        $('#divCreateEvent').css('display', 'none');
        let updateCalendar = new Calendar();
        updateCalendar.makeCalendar();
        $('#divAgenda').css('display', 'flex');
    });

    // Boutons "retour" pour quitter le formulaire de creation d evenement et le formulaire d informations sur un evenement
    $('.backToCalendar').on('click', function () {
        $('#divAgenda').css('display', 'flex');
        $('#infosEventMembers').empty();
        $('#div_memberInEvent').empty();
        $('#infosEvent').css('display', 'none');
        $('#divCreateEvent').css('display', 'none');
    })

    // SUPPRESSION EVENEMENT
    // Bouton Confirmation suppression evenement
    $('.deleteEvent').on('click', function () {
        let calendar = new Calendar();
        calendar.deleteEvent();
        $('#infosEvent').css('display', 'none');
        let updateCalendar = new Calendar();
        updateCalendar.makeCalendar();
        $('#divAgenda').css('display', 'flex');    
    })

    // Bouton supprimer, ouvre la div pour confirmer ou non la suppression
    $('#btnDeleteEvents').on('click', function () {
        $('#confirmation').toggle();
    })

    // Bouton retour dans la div de confirmation de suppression d evenement, pour masquer la div et revenir au formulaire d information de l'evenement
    $('#back').on('click', function () {
        $('#confirmation').css('display', 'none');
    })

    // Bouton pour effectué des tests (partie prod', a supprimer)
    $('#btnTest').on('click', function () {
        let calendar = new Calendar();
        calendar.getAllMembers();
    })

});
