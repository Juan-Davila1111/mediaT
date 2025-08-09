//Docuemento html carga por comeplto le agrega la clase, que hace aparecer la animación de estritura
document.addEventListener('DOMContentLoaded', function () {
    let h1 = document.querySelector(".h1").classList.add("aparecer");
});

const cartaPadre = document.querySelector(".carta-padre");
const flechasI = document.querySelectorAll(".carta-padre i");
const puntosContenedor = document.querySelector(".puntos");

const anchoDePrimeraTarjeta = cartaPadre.querySelector(".carta").offsetWidth;
const numTarjetas = cartaPadre.querySelectorAll(".carta").length;

// Calcular el número de puntos
const numPuntos = Math.max(0, numTarjetas - 2);

// Crear puntos dinámicamente
for (let i = 0; i < numPuntos; i++) {
    const punto = document.createElement("span");
    punto.classList.add("punto");
    if (i === 0) punto.classList.add("activo");
    puntosContenedor.appendChild(punto);
}

const puntos = document.querySelectorAll(".punto");

function actualizarPuntos() {
    const indiceActual = Math.round(cartaPadre.scrollLeft / anchoDePrimeraTarjeta);
    puntos.forEach((punto, indice) => {
        punto.classList.toggle("activo", indice === indiceActual);
    });
}

function manejarClicBoton(event) {
    const btn = event.currentTarget;
    const maxScrollLeft = cartaPadre.scrollWidth - cartaPadre.clientWidth;

    if (btn.id === "left") {
        if (cartaPadre.scrollLeft === 0) {
            cartaPadre.scrollLeft = maxScrollLeft;
        } else {
            cartaPadre.scrollLeft -= anchoDePrimeraTarjeta;
        }
    } else {
        if (cartaPadre.scrollLeft >= maxScrollLeft) {
            cartaPadre.scrollLeft = 0;
        } else {
            cartaPadre.scrollLeft += anchoDePrimeraTarjeta;
        }
    }

    actualizarPuntos();
    clearInterval(intervaloID);
    intervaloID = setInterval(desplazarCartasAutomaticamente, tiempoIntervalo);
}

flechasI.forEach(btn => {
    btn.addEventListener("click", manejarClicBoton);
});

function desplazarCartasAutomaticamente() {
    const maxScrollLeft = cartaPadre.scrollWidth - cartaPadre.clientWidth;
    if (cartaPadre.scrollLeft >= maxScrollLeft) {
        cartaPadre.scrollLeft = 0;
    } else {
        cartaPadre.scrollLeft += anchoDePrimeraTarjeta;
    }
    actualizarPuntos();
}

const tiempoIntervalo = 15000;
let intervaloID = setInterval(desplazarCartasAutomaticamente, tiempoIntervalo);

// Actualizar los puntos cuando se arrastra manualmente
cartaPadre.addEventListener("scroll", () => {
    clearTimeout(cartaPadre.scrollTimeout);
    cartaPadre.scrollTimeout = setTimeout(actualizarPuntos, 100);
});

// pregunstas frecuentes
const categorias = document.querySelectorAll("#categorias .categoria"),
    contenedorPreguntas = document.querySelectorAll(".contenedor-preguntas");

let categoriaActiva = null;
// identificamos categoria
categorias.forEach((categoria) => {
    // cuando se le de click en una categoria
    categoria.addEventListener("click", (e) => {
        categorias.forEach((elemento) => {
            elemento.classList.remove("activo")
        })

        e.currentTarget.classList.toggle("activo");
        categoriaActiva = categoria.dataset.categoria

        // activando el conetendor de la pregunta que corrresponde
        contenedorPreguntas.forEach((contenedor) => {
            if (contenedor.dataset.categoria === categoriaActiva) {
                contenedor.classList.add("activo")
            } else {
                contenedor.classList.remove("activo")
            }
        })
    })
});

const preguntas = document.querySelectorAll(".preguntas .contenedor-pregunta"),
    respuestas = document.querySelectorAll(".respuestas");

preguntas.forEach((pregunta) => {
    pregunta.addEventListener("click", (e) => {
        e.currentTarget.classList.toggle("activa");

        const respuesta = pregunta.querySelector(".respuesta");
        const alturaRespuesta = respuesta.scrollHeight;

        if (!respuesta.style.maxHeight) {
            respuesta.style.maxHeight = alturaRespuesta + "px";

        } else {
            respuesta.style.maxHeight = null;
        }


        preguntas.forEach((elemento) => {
            if (pregunta !== elemento) {
                elemento.classList.remove("activa");
                elemento.querySelector(".respuesta").style.maxHeight = null;
            }

        })


    })
});














