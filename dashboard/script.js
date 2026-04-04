const ctx = document.getElementById("pieChart");

new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Completed', 'Pending', 'In Process'],
        datasets: [{
            label: "Tasks",
            data: [12, 10, 2],
            backgroundColor: [
                '#22c55e',
                '#f59e0b',
                '#3b82f6'
            ],
            boderWidth: 0
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});

// line chart

const lineChart = document.getElementById("lineChart");

new Chart(lineChart, {
    type: 'line',
    data: {
        labels: ['01/04', '02/04', '03/04', '04/04', '05/04', '06/04', '07/04', '07/04', '08/04', '09/04', '10/04'],
        datasets: [{
            label: "Last 10 Days",
            data: [57, 23, 53, 23, 65, 23, 56, 23, 34, 12, 89],
            borderColor: '#3b82f6',
            backgroundColor: 'rgba(59,130,246,0.2)',
            tension: 0.4,
            fill: true,
            pointRadius: 5,
            pointBackgroundColor: '#3b82f6'
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100   // 👈 Set Maximum Value Here
            }
        }
    }
});