@extends('layout.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">All Subjects</h2>

    <!-- Button to show students page -->
    <div class="text-end mb-3">
        <a href="{{ url('/students') }}" class="btn btn-primary">View Students</a>
    </div>

   <table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Major</th>
            <th>ID</th>
            <th>Subject Name</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>IT</td>
            <td colspan="4">
                @foreach($subjects->take(5) as $subject)
                    {{ $subject->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </td>
        </tr>
        <tr>
            <td>Education</td>
            <td colspan="4">
                @foreach($subjects->skip(5)->take(5) as $subject)
                    {{ $subject->name }}{{ !$loop->last ? ', ' : '' }}
                @endforeach
            </td>
        </tr>
    </tbody>
</table>
    {{-- Pagination links if paginated --}}
  

</div>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
