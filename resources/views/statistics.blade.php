@extends('layout/layout')

@section('content')
<div>
    <h2>Наиболее востребованные вакансии</h2>
    <canvas id="topJobsChart"></canvas>
</div>

<div>
    <h2>Наименее востребованные вакансии</h2>
    <canvas id="bottomJobsChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Получите данные для диаграммы из переменной PHP $topFiveJobs
    var topJobsData = {!! $topJobs !!};

    // Получите метки и значения для диаграммы
    var topJobsLabels = topJobsData.map(job => job.title);
    var topJobsValues = topJobsData.map(job => job.places / job.candidates_count*100);

    // Создайте контекст для диаграммы
    var topJobsChartCtx = document.getElementById('topJobsChart').getContext('2d');

    // Инициализируйте диаграмму
    new Chart(topJobsChartCtx, {
        type: 'bar',
        data: {
            labels: topJobsLabels,
            datasets: [{
                label: 'Соотношение мест к кандидатам',
                data: topJobsValues,
                backgroundColor: 'rgba(75, 192, 192, 0.8)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            },
            plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw.toFixed(2) + '%'; // Отображение значения с двумя знаками после запятой и символом процента
                            }
                        }
                    }
                },
            onClick: function(event, elements) {
                    if (elements.length > 0) {
                        var index = elements[0].index;
                        var jobId = topJobsData[index].id;
                        window.location.href = '/jobs/' + jobId;
                    }
                }
        }
    });
// Получите данные для диаграммы из переменной PHP $bottomFiveJobs
var bottomJobsData = {!! $bottomJobs !!};

// Получите метки и значения для диаграммы
var bottomJobsLabels = bottomJobsData.map(job => job.title);
var bottomJobsValues = bottomJobsData.map(job => job.places / job.candidates_count*100);
var max = Math.max(bottomJobsValues);
// Создайте контекст для диаграммы
var bottomJobsChartCtx = document.getElementById('bottomJobsChart').getContext('2d');

// Инициализируйте диаграмму
new Chart(bottomJobsChartCtx, {
    type: 'bar',
    data: {
        labels: bottomJobsLabels,
        datasets: [{
            label: 'Соотношение мест к кандидатам',
            data: bottomJobsValues,
            backgroundColor: 'rgba(255, 99, 132, 0.8)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true,
                max: max
            }
        },
        plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.raw.toFixed(2) + '%'; // Отображение значения с двумя знаками после запятой и символом процента
                            }
                        }
                    }
                },
        onClick: function(event, elements) {
                    if (elements.length > 0) {
                        var index = elements[0].index;
                        var jobId = bottomJobsData[index].id;
                        window.location.href = '/jobs/' + jobId;
                    }
                }
    }
});
</script>
@endsection