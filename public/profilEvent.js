$(document).ready(function () {

    // PROFIL
    // Bouton deverouillage champs Mot de passe:
    $('#btnLockClose').on('click', function () {
        $('#imgBtnClose').toggle();
        $('#imgBtnOpen').toggle();
        // Deverouille le champs mot de passe
        if ($('#imgBtnOpen').css('display') != 'none') {
            $('#passwordInput').removeAttr('readonly');
        } else {
            $('#passwordInput').attr('readonly', 'true');
        }
        $('#div_btnChangePassword').toggle();
    });

});