/*
        VESTIBO ALPHA === Popup Switch (Javascript) === LAMPI
        Última revisão: 15/01/2014 (Matheus Baroni)
*/
function open_close_popup() {
    var popup = document.getElementById('popup');
    if (popup.style.display == 'none') {
        popup.style.display = 'block';
    }
    if (!popup.style.display || popup.style.display == 'block') {
        popup.style.display = 'none';
    }
}
/*
        ===============================================================================
        =====        VESTIBO ALPHA === Popup Switch (Javascript) === LAMPI        =====
        ===============================================================================
*/