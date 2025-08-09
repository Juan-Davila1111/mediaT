// cuando la pagina cargue por completo ejecuta el codigo que quita el loading
window.onload = function () {
    let cargando = document.querySelector(".centrado-cargando").classList.add("overflow");
    body = document.querySelector("body")
    body.classList.remove("overflow");

    html = document.querySelector("html").classList.remove("overflow");
    html = document.querySelector("html").classList.add("scrolNone");
};
// variable del icono
let btnAnimado = document.querySelector(".btnAnimado");
let nav = document.querySelector(".nav");

btnAnimado.addEventListener("click", () => {
    btnAnimado.classList.toggle("activo");
    // preguntamos si la clase esta en el boton
    if (btnAnimado.classList.contains("activo")) {
        nav.classList.add("activo");
    } else {
        nav.classList.remove("activo");
    }
})
scroll();
function scroll() {
    // cuando los px del eje y superen 200px se le add una clase al nav
    let menu = document.querySelector(".menu")

    window.addEventListener("scroll", () => {
        if (scrollY >= 85) {
            menu.classList.add("activo");
        } else {
            menu.classList.remove("activo");
        }
    })
}

// animación de scroll para las imagenes
const imgs = document.querySelectorAll(".img1")
imgs.forEach((img) => {

    const cargarAnimacion = (entradas, observador) => {
        entradas.forEach((entrada) => {
            if (entrada.isIntersecting) {
                entrada.target.classList.add("visible")
            }
        })
    }
    const observador = new IntersectionObserver(cargarAnimacion, {
        root: null,
        rootMargin: "0px 0px 0px 0px",
        threshold: 1.0
    });
    observador.observe(img);

});

window.addEventListener('scroll', revealOnScroll);
window.addEventListener('load', revealOnScroll);

function revealOnScroll() {
    const contenedorTestimonios = document.querySelectorAll(".animacion");

    contenedorTestimonios.forEach(function (tes) {
        if (isElementInViewport(tes)) {
            tes.classList.add('visible');
        }
    });
}

function isElementInViewport(el) {
    let rect = el.getBoundingClientRect();
    let windowHeight = (window.innerHeight || document.documentElement.clientHeight);
    let windowWidth = (window.innerWidth || document.documentElement.clientWidth);


    let elementHeight = rect.bottom - rect.top;
    let elementWidth = rect.right - rect.left;

    let verticalVisible = Math.min(rect.bottom, windowHeight) - Math.max(rect.top, 0);
    let horizontalVisible = Math.min(rect.right, windowWidth) - Math.max(rect.left, 0);

    let visibleArea = (verticalVisible * horizontalVisible);
    let elementArea = (elementHeight * elementWidth);

    return (visibleArea / elementArea) >= 0.3;
};

// Opciones perfil
const contenedorPerfil = document.querySelector(".perfil"),
    opcionesPerfil = document.querySelector(".opcionesPer");

contenedorPerfil.addEventListener("click", (e) => {
    opcionesPerfil.classList.toggle("visible");
});

// Cerrar sesion
const cerrarSesion = document.querySelector(".cerrarSesion"),
cerrarLink = document.querySelector(".cerrarLink")
Iconox = document.querySelector(".xCerrar"),
si = document.querySelector(".siCerrar"),
no = document.querySelector(".noCerrar");

cerrarLink.addEventListener("click",(e)=>{
    e.preventDefault();

    html = document.querySelector("html").classList.add("overflow")
    html = document.querySelector("html").classList.remove("scrolNone");

    cerrarSesion.classList.add("activo");

    Iconox.addEventListener("click",()=>{
        cerrarSesion.classList.remove("activo");
        html = document.querySelector("html").classList.remove("overflow")
        html = document.querySelector("html").classList.add("scrolNone");
    });

    si.addEventListener("click",()=>{
        cerrarSesion.classList.remove("activo");
        html = document.querySelector("html").classList.remove("overflow")
        html = document.querySelector("html").classList.add("scrolNone");
        let url = cerrarLink.getAttribute("href");
        window.location.href = url;
    });

    no.addEventListener("click",()=>{
        cerrarSesion.classList.remove("activo");
        html = document.querySelector("html").classList.remove("overflow")
        html = document.querySelector("html").classList.add("scrolNone");
    });

 

});





