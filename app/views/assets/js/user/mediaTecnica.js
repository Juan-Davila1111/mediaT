const corazon = document.querySelectorAll(".heart");
const corazonAnimcacion = document.querySelectorAll(".animacion-heart");
// Cuando se lee da click en el corazon se le agrega la clases para las animaciones
corazon.forEach((cora, i) => {
    cora.addEventListener("click", () => {
        corazonAnimcacion.forEach((corazonAni, j) => {
            if (i === j) {
                cora.classList.add("activo");
                corazonAni.classList.add("animacionn")
            }
        })
    })
})
// Cuando se lee da click en el corazon se le qquita la clases para las animaciones
corazonAnimcacion.forEach((corazonAni, j) => {
    corazonAni.addEventListener("click", () => {
        corazon.forEach((cora, i) => {
            if (i === j) {
                cora.classList.remove("activo");
                corazonAni.classList.remove("animacionn")
            }
        })
    })
});

// Ver mas
const verMas = document.querySelector(".ver");
const forosItem = [...document.querySelectorAll(".foros-item")];

contadorItem = 0;

// Cuando se le de click en ver mas se va a desplegar los foros en lista de 4
verMas.addEventListener("click", () => {
    for (let i = contadorItem; i <= contadorItem + 4 && i < forosItem.length; i++) {
        forosItem[i].style.display = "block";
    }
    contadorItem += 4;

    if (contadorItem >= forosItem.length) {
        verMas.style.display = "none";
    }
});
// Click en leer mas mostar la info del completa
const leerMas = document.querySelectorAll(".leer span");
leerMas.forEach((leer) => {
    leer.addEventListener("click", (e) => {

        let datosNovedad = e.target.parentNode.parentNode;
        let p = datosNovedad.querySelector("p")
        p.classList.toggle("mostrar");

        if (p.classList.contains("mostrar")) {
            leer.innerHTML = "Leer menos"
        } else {
            leer.innerHTML = "Leer más"
        }
    })
});
let contenedorImgNovedad = document.querySelector(".contenedor-img-novedad");
let imgContenedor = document.querySelector(".contenedor-img-novedad img");
let imgNovedad = document.querySelectorAll(".imgNovedad");
let iSalir = document.getElementById("iSalir")

imgNovedad.forEach((img) => {
    img.addEventListener("click", (e) => {
        contenedorImgNovedad.classList.add("activo");
        let body = document.querySelector("body").classList.add("scrollNonebody");

        let datos = e.target.parentNode;
        let srcFinal = datos.querySelector("img").src;

        imgContenedor.src = srcFinal

        iSalir.addEventListener("click", () => {
            contenedorImgNovedad.classList.remove("activo");
            let body = document.querySelector("body").classList.remove("scrollNonebody");

        })

        contenedorImgNovedad.addEventListener("click", () => {
            contenedorImgNovedad.classList.remove("activo");
            let body = document.querySelector("body").classList.remove("scrollNonebody");

        });

    });
})



