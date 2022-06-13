const body = document.querySelector('body'),
    sidebar = body.querySelector('nav'),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch");


toggle.addEventListener("mouseover", () => {
    sidebar.classList.toggle("close");
})
toggle.addEventListener("mouseout", () => {
    sidebar.classList.toggle("close");
})

$(document).ready(main);
function main() {
    // Mostramos y ocultamos submenus 
    $('.submenu').click(function () {
        $(this).children('.children').slideToggle();
    });
} 
