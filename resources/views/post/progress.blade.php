@extends('layout.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Bar Chart -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <h3 class="mb-3">Teachers by Category</h3>
            <canvas id="categoryBarChart" width="400" height="300"></canvas>
        </div>
        <!-- Pie Chart -->
        <div class="col-md-6 d-flex flex-column align-items-center">
            <h3 class="mb-3">Subjects by Category</h3>
            <canvas id="categoryPieChart" width="300" height="300"></canvas>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Bar Chart
    const barCtx = document.getElementById('categoryBarChart').getContext('2d');
    const categoryBarChart = new Chart(barCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($categoryLabels) !!},
            datasets: [{
                label: 'Number of Teachers',
                data: {!! json_encode($categoryCounts) !!},
                backgroundColor: [
                    '#42a5f5', // blue
                    '#ef5350', // red
                    '#66bb6a', // green
                    '#ffa726', // orange
                    '#ab47bc', // purple
                    '#26c6da', // teal
                ],
                borderColor: [
                    '#1e88e5','#d32f2f','#388e3c','#f57c00','#8e24aa','#0097a7',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: { display: true, position: 'top' },
                title: { display: true, text: 'Teachers by Category' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: { display: true, text: 'Number of Teachers' }
                },
                x: {
                    title: { display: true, text: 'Categories' }
                }
            }
        }
    });

    // Pie Chart
    const pieCtx = document.getElementById('categoryPieChart').getContext('2d');
    const categoryPieChart = new Chart(pieCtx, {
        type: 'pie',
        data: {
            labels: {!! json_encode($categoryLabels) !!},
            datasets: [{
                data: {!! json_encode($categoryCounts) !!},
                backgroundColor: [
                    '#ef5350', // red
                    '#42a5f5', // blue
                    '#66bb6a', // green
                    '#ffa726', // orange
                    '#ab47bc', // purple
                    '#26c6da', // teal
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: false,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Subjects by Category' }
            }
        }
    });
</script>
@endsection