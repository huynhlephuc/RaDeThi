var modal = document.querySelector("#modal");
var modal2 = document.querySelector("#modal2");
let overlay = document.querySelector(".overlay");
let closed__modal = document.getElementById("closed__modal");
let closed__modal2 = document.getElementById("closed__modal2");
document.getElementById("create_question").addEventListener("click", () => {
    modal.classList.toggle("active");
    overlay.classList.toggle("active");
});
closed__modal.addEventListener("click", () => {
    modal.classList.remove("active");
    overlay.classList.remove("active");
});
document.querySelector(".overlay").addEventListener("click", () => {
    modal.classList.remove("active");
    overlay.classList.remove("active");
});
document.getElementById("update_question").addEventListener("click", () => {
    modal2.classList.toggle("active");
    overlay.classList.toggle("active");
});
closed__modal2.addEventListener("click", () => {
    modal2.classList.remove("active");
    overlay.classList.remove("active");
});
document.querySelector(".overlay").addEventListener("click", () => {
    modal2.classList.remove("active");
    overlay.classList.remove("active");
});
