<!-- filepath: c:\xampp\htdocs\week1\resources\views\students\progress.blade.php -->
@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Average Students by Major</h2>
    <canvas id="majorChart" width="400" height="200"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('majorChart').getContext('2d');

        // Data from the controller
        const labels = @json($majorData->pluck('name'));
        const data = @json($majorData->pluck('count'));

        // Chart.js configuration
        new Chart(ctx, {
            type: 'bar', // You can change this to 'line', 'pie', etc.
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Students',
                    data: data,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Majors',
                        },
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Number of Students',
                        },
                        beginAtZero: true,
                    },
                },
            },
        });
    });
</script>
@endsection