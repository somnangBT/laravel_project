@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-primary">Portfolio Dashboard</h2>

    <!-- Dashboard Summary -->
    <div class="row text-center mb-4">
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Total Students</h5>
                <h3>{{ $totalStudents }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Total Majors</h5>
                <h3>{{ $totalMajors }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3">
                <h5>Total Subjects</h5>
                <h3>{{ $totalSubjects }}</h3>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="row">
        <div class="col-md-6">
            <h5 class="text-center">Students by Major</h5>
            <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
                <canvas id="studentsChart"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="text-center">Subjects by Major</h5>
            <div class="chart-container" style="position: relative; height: 300px; width: 100%;">
                <canvas id="subjectsChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="mt-5">
        <h5 class="text-center">Major Details</h5>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Major</th>
                    <th>Number of Students</th>
                    <th>Number of Subjects</th>
                    <th>Student Names</th>
                </tr>
            </thead>
            <tbody>
                @foreach($studentsByMajor as $major)
                <tr>
                    <td>{{ $major->name }}</td>
                    <td>{{ $major->students_count }}</td>
                    <td>{{ $subjectsByMajor->where('id', $major->id)->first()->subjects_count }}</td>
                    <td>
                        @foreach($major->students as $student)
                            {{ $student->name }}{{ !$loop->last ? ', ' : '' }}
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Students by Major Chart
        const studentsCtx = document.getElementById('studentsChart').getContext('2d');
        new Chart(studentsCtx, {
            type: 'bar',
            data: {
                labels: @json($managerData->pluck('name')),  // Labels for the bar chart
                datasets: [{
                    label: 'Number of Students',
                    data: @json($managerData->pluck('count')),  // Data for the bar chart
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
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
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Number of Students',
                        },
                    },
                },
            },
        });

        // Subjects by Major Chart
        const subjectsCtx = document.getElementById('subjectsChart').getContext('2d');
        new Chart(subjectsCtx, {
            type: 'pie',
            data: {
                labels: @json($subjectsByMajor->pluck('name')),  // Labels for the pie chart
                datasets: [{
                    data: @json($subjectsByMajor->pluck('subjects_count')),  // Data for the pie chart
                    backgroundColor: ['#ff6384', '#36a2eb', '#cc65fe', '#ffce56', '#4bc0c0'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                },
            },
        });
    });
</script>
@endsection
