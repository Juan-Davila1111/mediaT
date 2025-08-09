const inputs = document.querySelectorAll(".infoDat input"),
    botonOpcion = document.querySelectorAll(".botonOpcion"),
    editarOp = document.querySelectorAll(".editar"),
    canelarOp = document.querySelectorAll(".cancelar")



editarOp.forEach((editar) => {

    editar.addEventListener("click", (e) => {
        inputCloset = e.target.closest(".infoDat");
        input = inputCloset.querySelector("input").classList.add("activo")

        let cancelar = inputCloset.querySelector(".cancelar").classList.remove("activo");
        let edita = inputCloset.querySelector(".editar").classList.add("activo");

    });

});



canelarOp.forEach((cancelar) => {

    cancelar.addEventListener("click", (e) => {
        inputCloset = e.target.closest(".infoDat");
        input = inputCloset.querySelector("input").classList.remove("activo");

        let cancela = inputCloset.querySelector(".cancelar").classList.add("activo");
        let edita = inputCloset.querySelector(".editar").classList.remove("activo");

    });

});






