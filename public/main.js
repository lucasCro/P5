$(document).ready(function () {

// PROFIL
    // Bouton deverouillage champs Mot de passe:
    $('#btnLockClose').on('click', function () {
        $('#imgBtnClose').toggle();
        $('#imgBtnOpen').toggle();
        // Deverouille le champs mot de passe
        if ($('#imgBtnOpen').css('display') != 'none') {
            $('#passwordInput').removeAttr('readonly');
        }
        else {
            $('#passwordInput').attr('readonly', 'true');
        }
        $('#div_btnChangePassword').toggle();
    });
    
// INTERACTION PAGE AGENDA
    
    // INITIALISATION AGENDA
    let calendar = new Calendar();
    calendar.makeCalendar();
    
    // CREATION EVENEMENT :
    // Bouton Ajout evenement: affiche le formulaire de création d'un evenement
    $('#btnAddEvent').on('click', function () {
        $('#divCreateEvent').css('display', 'flex');
        // Va chercher dans la BDD les membres du site pour créé une liste de checkbox a coché
        let allMembers = calendar.getAllMembers();
        for (let member of allMembers) {
            $('#div_memberInEvent').append('<div class="row mb-1"><label for="eventMember' + member.id + '" class="form-check-label col-8">' + member.nom + ' ' + member.prenom + '</label><input type="checkbox" class="form-check-input col-3" id="eventMember' + member.id + '" name="' + member.id + '" value="' + member.id + '"></div>')
        }
        $('#divAgenda').css('display', 'none');
    });
    
    // Bouton envoyé (dans le formulaire de création d'evenement): créée un evenement dans la BDD et actualise l'agenda
    $('#btnCreatEvent').on('click', function () {
        calendar.creatEvent();
        $('#div_memberInEvent').empty();
        $('#divCreateEvent').css('display', 'none');
        $('#divAgenda').css('display', 'flex');
        calendar.makeCalendar();      
    });

    // Boutons "retour" pour quitter le formulaire de creation d evenement et le formulaire d informations sur un evenement
    $('.backToCalendar').on('click', function () {
        $('#divAgenda').css('display', 'flex');
        $('#infosEventMembers').empty();
        $('#div_memberInEvent').empty();
        $('#infosEvent').css('display', 'none');
        $('#divCreateEvent').css('display', 'none');
    });

    // SUPPRESSION EVENEMENT
    // Bouton Confirmation suppression evenement
    $('.deleteEvent').on('click', function () {
        calendar.deleteEvent();
        $('#infosEvent').css('display', 'none');
        $('#divAgenda').css('display', 'flex');
        calendar.makeCalendar();      
    });

    // Bouton supprimer, ouvre la div pour confirmer ou non la suppression
    $('#btnDeleteEvents').on('click', function () {
        $('#confirmation').toggle();
    });

    // Bouton retour dans la div de confirmation de suppression d evenement, pour masquer la div et revenir au formulaire d information de l'evenement
    $('#back').on('click', function () {
        $('#confirmation').css('display', 'none');
    });

    // PARTICIPATION EVENEMENT
    // Bouton participation a l'evenement
    $('.btn-participation').on('click', function () {
        let participation = $(this).val();
        calendar.setParticipation(participation);
        alert('Votre choix a bien été pris en compte !');
        $('#participation-answer').text($(this).val());

    });

});
