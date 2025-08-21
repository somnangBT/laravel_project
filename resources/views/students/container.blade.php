<!-- filepath: c:\xampp\htdocs\week1\resources\views\students\container.blade.php -->
@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Average Students Created Over Time</h2>
    <!-- Display the data in a table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Month</th>
                <th>Number of Students</th>
            </tr>
        </thead>
        <tbody>
            @foreach($monthData as $month => $count)
                <tr>
                    <td>{{ \Carbon\Carbon::create()->month($month)->format('F') }}</td>
                    <td>{{ $count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p class="text-center mt-4">
        <strong>Average Students Created Per Month: </strong> {{ number_format($average, 2) }}
    </p>
</div>
@endsection