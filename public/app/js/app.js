const menu = document.querySelector("#menu-bar");
const nav = document.querySelector(".menu");

menu.onclick = () => {
    menu.classList.toggle('fa-xmark');
    nav.classList.toggle('active');
}