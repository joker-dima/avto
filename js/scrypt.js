const toggle = document.querySelector('.toggle');
const navMenu = document.querySelector('.nav__list');
toggle.onclick = function () {
    toggle.classList.toggle('active');
    navMenu.classList.toggle('active');
}