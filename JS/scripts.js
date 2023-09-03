function start() {
    document.getElementById("startNEW-container").style.display = "none";
    document.getElementById("startTXT-container").style.display = "block"
}



function info() {
    document.getElementById("startTXT-container").style.display = "none";
    document.getElementById("aboutCODE-container").style.display = "block"
}

function closeFinalizado(){
    document.getElementById("finalizado").style.opacity="0"
    document.getElementById("finalizado").style.pointerEvents = "none"
}