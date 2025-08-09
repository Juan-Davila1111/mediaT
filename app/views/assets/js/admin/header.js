// cuando la pagina cargue por completo ejecuta el codigo que quita el loading
window.onload = function () {
    let cargando = document.querySelector(".centrado-cargando").classList.add("overflow");
    body = document.querySelector("body")
    body.classList.remove("overflow");
    let top = document.querySelector(".right").classList.remove("none");


    html = document.querySelector("html").classList.remove("overflow")
    html = document.querySelector("html").classList.add("scrolNone");
};
//

const sideMenu = document.querySelector('aside');
const menuBtn = document.querySelector('#menu_bar');
const closeBtn = document.querySelector('#close_btn');

const themeToggler = document.querySelector('.theme-toggler');



menuBtn.addEventListener('click', () => {
    sideMenu.style.display = "block"
})
closeBtn.addEventListener('click', () => {
    sideMenu.style.display = "none"
})

themeToggler.addEventListener('click', () => {
    document.body.classList.toggle('dark-theme-variables')
    themeToggler.querySelector('span:nth-child(1').classList.toggle('active');
    themeToggler.querySelector('span:nth-child(2').classList.toggle('active');

    // Guardar la informacion el localStorage
    if (document.body.classList.contains("dark-theme-variables")) {
        localStorage.setItem('dark-mode', 'true');
    } else {
        localStorage.setItem('dark-mode', 'false');
    }

});
// Obtenet el modo actual
if (localStorage.getItem('dark-mode') === 'true') {
    document.body.classList.add('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1').classList.remove('active');
    themeToggler.querySelector('span:nth-child(2').classList.add('active');

} else {
    document.body.classList.remove('dark-theme-variables');
    themeToggler.querySelector('span:nth-child(1').classList.add('active');
    themeToggler.querySelector('span:nth-child(2').classList.remove('active');
};
a = document.querySelector(".cerrarSe");
alertaAceptar = document.querySelector(".alertaAceptar"),
siEnv = document.querySelector(".siEnv"),
noEnv = document.querySelector(".noEnv");

a.addEventListener("click",(e)=>{
    e.preventDefault();

    alertaAceptar.classList.add("activo");

    siEnv.addEventListener("click", () => {
        alertaAceptar.classList.remove("activo");
        let url = a.getAttribute("href");
        window.location.href = url;
    });


    noEnv.addEventListener("click", () => {
        alertaAceptar.classList.remove("activo");
    });
   
})



