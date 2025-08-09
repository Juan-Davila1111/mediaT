// Ver foro
const contenedorVerForo = document.querySelectorAll(".contenedorVerForo"),
    verforo = document.querySelectorAll(".foroLeer");

verforo.forEach((foro, i) => {
    foro.addEventListener("click", (e) => {
        e.preventDefault();
        contenedorVerForo.forEach((contenedor, j) => {
            if (i == j) {
                contenedor.classList.add("activo");
            }
            cerrar = contenedor.querySelector(".cerrar");

            cerrar.addEventListener("click", () => {
                contenedor.classList.remove("activo");
            })

            contenedor.addEventListener("click", (e) => {
                if (e.target.classList.contains("contenedorVerForo")) {
                    contenedor.classList.remove("activo")
                }
            })

        })
    })
});





