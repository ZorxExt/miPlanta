function start() {
  document.getElementsByClassName("start_1")[0].style.transform =
    "translateX(-1000px)";
  setTimeout(function () {
    document.getElementsByClassName("codigo-vinculacion")[0].style.transform =
      "translateX(0)";
  }, 1000);
}

function info() {
  document.getElementsByClassName("codigo-vinculacion")[0].style.transform =
    "translateX(-1500px)";
  setTimeout(function () {
    document.getElementsByClassName("codigo-vinculacion-about")[0].style.transform =
      "translateX(0)";
  }, 1000);
}
