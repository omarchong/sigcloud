
/* Grafica lineal curveada */
const labels = [
    'Enero',
    'Febrero',
    'Marzo',
    'Abril',
    'Mayo',
    'Junio',
];

const data = {
    labels: labels,
    datasets: [{
            label: 'Azul',
            data: [28000, 72000, 60000, 95000, 68000, 100000],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            tension: 0.4
        },
        {
            label: 'Naranja',
            data: [25000, 30000, 85000, 46000, 80000, 90000, 68000],
            borderColor: 'rgba(255, 150, 19, 0.2)',
            backgroundColor: 'rgba(255, 159, 64, 1)',
            tension: 0.4
        }
    ]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom',

            },
        }
    }
};
const myChart = new Chart(
    document.getElementById('myChart'),
    config
);


/* Grafica de barras */
 // Obtener una referencia al elemento canvas del DOM
 const $grafica = document.querySelector("#grafica");
 // Las etiquetas son las que van en el eje X.
 const etiquetas = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto"]
 // Podemos tener varios conjuntos de datos
 const Sistemas = {
     label: "Sistemas",
     data: [30000, 40000, 33000, 30000, 40000, 30000, 45000,
         28000
     ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
     backgroundColor: 'rgba(255, 159, 64)', // Color de fondo
     /* borderColor: 'rgba(255, 159, 64)',  */// Color del borde
     borderWidth: 1, // Ancho del borde
 };
 const desarrolloweb = {
     label: "Desarrollo web",
     data: [50000, 75000, 55000, 50000, 65000, 50000, 75000,
         35000
     ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
     backgroundColor: 'rgba(54, 162, 235)', // Color de fondo
     /* borderColor: 'rgba(54, 162, 235)', */ // Color del borde
     borderWidth: 1, // Ancho del borde
 };
 const disenografico = {
     label: "Diseño Gráfico",
     data: [40000, 60000, 40000, 40000, 50000, 40000, 60000,
         30000
     ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
     backgroundColor: 'rgba(96, 200, 201)', // Color de fondo
     /* borderColor: 'rgba(92, 200, 201)', */ // Color del borde
     borderWidth: 1, // Ancho del borde
 };
 const consultoria = {
     label: "Consultoria",
     data: [60000, 90000, 60000, 60000, 75000, 60000, 100000,
         45000
     ], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
     backgroundColor: 'rgba(11, 111, 237)', // Color de fondo
     /* borderColor: 'rgba(11, 111, 237)', */ // Color del borde
     borderWidth: 1, // Ancho del borde
 };

 new Chart($grafica, {
     type: 'bar', // Tipo de gráfica
     data: {
         labels: etiquetas,
         datasets: [
             Sistemas,
             desarrolloweb,
             disenografico,
             consultoria,
             // Aquí más datos...
         ],
     },
     options: {
         responsive: true,
         plugins: {
             legend: {
                 labels: {
                     usePointStyle: true,
                 },
                 position: 'bottom',
                 scales: {
                     yAxes: [{
                         ticks: {
                             beginAtZero: true
                         }

                     }],
                 },
             },
         },
     }
 });
