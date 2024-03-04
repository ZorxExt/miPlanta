function start() {
  document.getElementById("startNEW-container").style.display = "none";
  document.getElementById("startTXT-container").style.display = "block";
}

function info() {
  document.getElementById("startTXT-container").style.display = "none";
  document.getElementById("aboutCODE-container").style.display = "block";
}

function closeFinalizado() {
  document.getElementById("finalizado").style.opacity = "0";
  document.getElementById("finalizado").style.pointerEvents = "none";
}
function cerrarWarning(){
  document.getElementsByClassName("warning")[0].style.opacity = "0"
  document.getElementsByClassName("warning")[0].style.pointerEvents = "none"
  
}

function FileOnChange(p, previewElem, dataElem) {
  var file = p.files[0];
  imgSrc = URL.createObjectURL(file);
  previewElem.src = imgSrc;

  let imgRead = new FileReader();
  imgRead.onload = function (e) {
    var allData = e.target.result;
    var imgData = allData.split("base64,")[1];
    dataElem.value = imgData;
  };


  imgRead.readAsDataURL(file);
}

const form = document.getElementById("contact-form");

const cargando = document.getElementById("container-carga");
const finalizado = document.getElementById("finalizado");

const register = document.getElementById("register")


form.addEventListener("submit", function (e) {

  e.preventDefault();
  const data = new URLSearchParams(new FormData(form));
  const action = e.target.action;
  cargando.style.display = "grid";
  register.style.backgroundColor = "white";
  form.style.pointerEvents = "none";
  document.getElementById("register-text").textContent = "";
  fetch(action, {
    mode: "no-cors",
    method: "POST",
    body: data
  }).then(() => {
    finalizado.style.opacity = 1;
    finalizado.style.pointerEvents = "auto";
    form.style.pointerEvents = "auto";
    cargando.style.display = "none";
    register.style.backgroundColor = "rgb(6, 190, 89)"
    document.getElementById("register-text").textContent = "Enviar";
  });
});
