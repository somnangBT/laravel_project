@extends('layout.app')

@section('content')
<!-- Header Cards -->
<div class="row mb-4">
    <!-- Location -->
    <!-- Location with Map -->
<div class="col-md-8 mb-3">
    <div class="p-3 bg-light rounded shadow-sm d-flex align-items-center">
        <!-- Google Static Map -->
        <a href="https://www.google.com/maps/place/BELTEI+INTERNATIONAL+UNIVERSITY,+Phnom+Penh" target="_blank">
   <img src="https://maps.googleapis.com/maps/api/staticmap?center=BELTEI+INTERNATIONAL+UNIVERSITY,Phnom+Penh&zoom=15&size=150x100&key=YOUR_REAL_API_KEY"
     alt="Map" class="me-3 rounded" style="width: 150px; height: 100px; object-fit: cover;">
</a>


        <!-- Location Text -->
        <div>
            <h5 class="mb-0 text-dark">
                <i class="bi bi-geo-alt-fill text-danger me-2"></i>
                <strong>Location:</strong>
                <span class="fw-normal">BELTEI INTERNATIONAL UNIVERSITY, Phnom Penh</span>
            </h5>
        </div>
    </div>
</div>


    <!-- Time -->
    <div class="col-md-4 mb-3">
        <div class="p-3 bg-white rounded shadow-sm d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <i class="bi bi-clock-fill text-primary me-2" style="font-size: 1.5rem;"></i>
                <strong class="text-dark me-2">Time:</strong>
            </div>
            <span id="live-time" class="text-muted small"></span>
        </div>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row mb-5">
    <div class="col-md-4 mb-4">
        <div class="card shadow-lg border-0 h-100" style="background: linear-gradient(to right, #007bff, #00c6ff); color: white;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                <i class="bi bi-people-fill mb-3" style="font-size: 3rem;"></i>
                <h5 class="card-title">Total Students</h5>
                <h2 class="fw-bold">{{ $totalStudents }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-lg border-0 h-100" style="background: linear-gradient(to right, #28a745, #a1ffce); color: white;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                <i class="bi bi-mortarboard-fill mb-3" style="font-size: 3rem;"></i>
                <h5 class="card-title">Total Teachers</h5>
                <h2 class="fw-bold">{{ $totalTeachers }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card shadow-lg border-0 h-100" style="background: linear-gradient(to right, #17a2b8, #6dd5ed); color: white;">
            <div class="card-body d-flex flex-column align-items-center justify-content-center text-center">
                <i class="bi bi-journal-bookmark-fill mb-3" style="font-size: 3rem;"></i>
                <h5 class="card-title">Total Subjects</h5>
                <h2 class="fw-bold">{{ $totalSubjects }}</h2>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<!-- Live Time Script -->
<script>
    function updateTime() {
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'short', day: '2-digit' };
        const dateStr = now.toLocaleDateString('en-US', options);
        const timeStr = now.toLocaleTimeString('en-US', { hour12: false });
        document.getElementById('live-time').textContent = `${dateStr} - ${timeStr}`;
    }
    updateTime();
    setInterval(updateTime, 1000);
</script>
@endsection
