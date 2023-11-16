import Chart from 'chart.js/auto';

const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
    'July',
    'August',
    'September',
    'October',
    'November',
    'December'
];

const data = {
    labels: labels,
    datasets: [
        {
            label: '2023',
            backgroundColor: 'rgba(228, 86, 230, 0.8)',
            borderColor: 'rgba(228, 86, 230, 0.8)',
            data: [15, 10, 7, 5, 15, 36, 55, 38, 24, 20, 7, 4],
        },
        {
            label: '2022',
            backgroundColor: 'rgba(92, 247, 178, 0.8)',
            borderColor: 'rgba(92, 247, 178, 0.8)',
            data: [10, 15, 5, 2, 20, 30, 45, 32, 27, 20, 10, 0],
        }
    ]
};

const config = {
    type: 'line',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            title: {
                display: true,
                color: 'white',
                text: 'Sample Data From Year',
                font: {
                    size: 18,
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: 'white',
                    font: {
                        size: 15,
                    }
                },
                grid: {
                    color: 'gray',
                },
            },
            y: {
                ticks: {
                    color: 'white',
                    font: {
                        size: 15,
                    }
                },
                grid: {
                    color: 'gray',
                },
            }                       
        },
    }
};

new Chart(
    document.getElementById('lineChart'),
    config
);