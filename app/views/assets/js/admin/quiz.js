const botones = document.querySelectorAll(".tab_btn");
const contenido = document.querySelectorAll(".contenido");
const linea = document.querySelector(".linea");

botones.forEach((boton, i) => {

    boton.addEventListener("click", (e) => {
        botones.forEach(boton => { boton.classList.remove("activo") })
        boton.classList.add("activo");

        linea.style.width = e.target.offsetWidth + "px";
        linea.style.left = e.target.offsetLeft + "px";

        contenido.forEach(conte => { conte.classList.remove("activo") })
        contenido[i].classList.add("activo")
    });


});

const crear = document.querySelector(".crear"),
    contenedorCrear = document.querySelector(".contenedorCrear"),
    cerrar = document.querySelector(".cerrar")
    crear.addEventListener("click", () => {
        contenedorCrear.classList.add("activo")
        });


cerrar.addEventListener("click", () => {
    contenedorCrear.classList.remove("activo");
})

contenedorCrear.addEventListener("click", (e) => {
    if (e.target.classList.contains("contenedorCrear")) {
        contenedorCrear.classList.remove("activo");
    }
})



