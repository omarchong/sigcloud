const body = document.querySelector("body"),
    sidebar = body.querySelector("nav"),
    toggle = body.querySelector(".toggle"),
    modeSwitch = body.querySelector(".toggle-switch");

toggle.addEventListener("mouseover", () => {
    sidebar.classList.toggle("close");
});
toggle.addEventListener("mouseout", () => {
    sidebar.classList.toggle("close");
});

$(document).ready(function main() {
    // Mostramos y ocultamos submenus
    $(".submenu").click(function () {
        $(this).children(".children").slideToggle();
    });
})

/* document.querySelector(".submenu", abrir);
function abrir(){
    console.log('click');
} */

    $(".subtitle .action").click(function (event) {
        var subtitle = $(this).parents(".subtitle");
        var submenues = $(subtitle).find(".submenues");

        $(".submenues").not($(submenues)).slideUp("slow").addClass("opacity");
        $(".open").not($(subtitle)).removeClass("open");

        $(subtitle).toggleClass("open");
        $(submenues).slideToggle("slow").toggleClass("opacity");

        return true;
    });

