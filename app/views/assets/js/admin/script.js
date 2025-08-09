

function establecerFecha() {
    const almanaque = document.querySelector("#almanaque")
    let fechaNueva = new Date();

    // se conbierte en la fecha en el formato YYYY-MM-DD
    let dia = String(fechaNueva.getDate()).padStart(2, "0");
    let mes = String(fechaNueva.getMonth() + 1).padStart(2, "0");
    let año = fechaNueva.getFullYear();
    let fechaFormateada = año + "-" + mes + "-" + dia;

    almanaque.value = fechaFormateada;
}
setInterval(establecerFecha, 1000);

const contador = document.querySelector(".contador span");
const valorObjetivo = contador.getAttribute("data-contador")

// Función para animar el contador
function actualizarContador() {
    const duracion = 2000;
    const intervalo = 50;

    let valorActual = 0;
    const incremento = valorObjetivo / (duracion / intervalo);

    const intervaloId = setInterval(() => {
        valorActual += incremento;
        if (valorActual >= valorObjetivo) {
            valorActual = valorObjetivo;
            clearInterval(intervaloId);
        }
        contador.innerHTML = Math.round(valorActual);
    }, intervalo);
}

actualizarContador();

let canva = document.querySelector("#grafica").getContext("2d");
let canva2 = document.querySelector("#grafica2").getContext("2d");

// Crear gradiente para el primer gráfico
var gradient = canva.createLinearGradient(0, 0, 0, 225);
gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
gradient.addColorStop(1, "rgba(215, 227, 244, 0)");

let chart = new Chart(canva, {
    type: "line",
    data: {
        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        datasets: [{
            label: "Crecimiento de Usuarios Registrados a lo Largo del Tiempo",
            fill: true,
            backgroundColor: gradient,
            borderColor: "rgb(31, 161, 234)",
            data: datosUsuarios
        }]
    },
    options: {
        maintainAspectRatio: false,
        legend: {
            display: false
        },
        tooltips: {
            intersect: false
        },
        hover: {
            intersect: true
        },
        plugins: {
            filler: {
                propagate: false
            },

        },
        scales: {
            xAxes: [{
                reverse: true,
                gridLines: {
                    color: "rgba(0,0,0,0.0)"
                }
            }],
            yAxes: [{
                ticks: {
                    stepSize: 1000
                },
                display: true,
                borderDash: [3, 3],
                gridLines: {
                    color: "rgba(0,0,0,0.0)"
                }
            }]
        },
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Crecimiento de Usuarios Registrados a lo Largo del Tiempo'
            },
            legend: {
                display: false,
            },
            tooltip: {
                mode: 'index',
                intersect: true,
            }
        },
        interaction: {
            mode: 'nearest',
            axis: 'x',
            intersect: false
        },
    }
});

const labels = datosTemas.map(item => item.nombre);
const data = datosTemas.map(item => item.total_preguntas);
console.log(data);

let chart2 = new Chart(canva2, {


    type: "bar",
    data: {
        labels: labels,
        datasets: [{
            label: "Media técnica con más quiz",
            data: data,
            backgroundColor: [
                "rgb(31, 161, 234,.5)",
            ],
            borderColor: [
                "rgb(31, 161, 234)"
            ],
            borderWidth: 3
        }]
    },
    options: {
        scales: {
            x: {
                grid: {
                    display: false,
                }
            },
            y: {
                grid: {
                    display: true,
                }
            }
        },

        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Media técnica con más quiz'
            },
            legend: {
                display: false,
            },
            tooltip: {
                mode: 'index',
                intersect: false,
            }
        },
        interaction: {
            mode: 'nearest',
            axis: 'x',
            intersect: false
        },

    }
});