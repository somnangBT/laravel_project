<!-- filepath: c:\xampp\htdocs\week1\resources\views\classtecher\index.blade.php -->
@extends ('layout.app')
@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">Teacher Classes</h2>
    <div class="row justify-content-center">
        @php
            $shifts = ['Morning', 'Afternoon', 'Evening'];
            $startTimes = ['08:00', '13:00', '17:00'];
            $endTimes = ['11:00', '16:00', '20:00'];
        @endphp
        @for($i = 1; $i <= 10; $i++)
            @php
                $shiftIndex = ($i - 1) % 3;
                $students = rand(15, 40);
                $isActive = rand(0, 1) === 1;
            @endphp
            <div class="col-md-4 mb-3">
    <div class="card shadow-sm h-100">
        <div class="card-body text-center">
            <!-- Teacher Image -->
            <img src="https://randomuser.me/api/portraits/men/{{ $i }}.jpg"
                 alt="Teacher Photo"
                 class="rounded-circle mb-2 shadow"
                 style="width:60px; height:60px; object-fit:cover; border: 2px solid #0d6efd;">
            <h5 class="card-title">
                <i class="bi bi-easel2-fill text-primary"></i> Class {{ $i }}
            </h5>
            <span id="badge-{{ $i }}" class="badge {{ $isActive ? 'bg-success' : 'bg-secondary' }}">
                {{ $isActive ? 'Active' : 'Not Active' }}
            </span>
            <ul class="list-unstyled mb-3 mt-2">
                <li><strong>Shift:</strong> {{ $shifts[$shiftIndex] }}</li>
                <li><strong>Start:</strong> {{ $startTimes[$shiftIndex] }}</li>
                <li><strong>End:</strong> {{ $endTimes[$shiftIndex] }}</li>
                <li><strong>Number of Students:</strong> {{ $students }}</li>
            </ul>
            <!-- Toggle Active Button -->
            <button type="button" class="btn btn-warning btn-sm mb-2 toggle-btn" onclick="toggleActive({{ $i }})">
                Toggle Active
            </button>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#classModal{{ $i }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                    <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13A6 6 0 1 1 8 2a6 6 0 0 1 0 12z"/>
                    <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 .912-.252 1.024-.598l.088-.416c.066-.292.152-.352.446-.352h.073v-.533h-.073c-.293 0-.352-.06-.446-.353l-.088-.416c-.112-.346-.48-.598-1.025-.598-.702 0-1 .422-.808 1.318l.738 3.467c.063.293.005.399-.288.469l-.45.083.082.38 2.29.287c.287.04.54-.145.54-.437v-4.105c0-.292-.253-.477-.54-.437z"/>
                </svg>
                View Details
            </button>
        </div>
    </div>
</div>

            <!-- Modal -->
            <!-- filepath: c:\xampp\htdocs\week1\resources\views\classtecher\index.blade.php -->
...
<!-- Modal -->
<div class="modal fade" id="classModal{{ $i }}" tabindex="-1" aria-labelledby="classModalLabel{{ $i }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="classModalLabel{{ $i }}">
                    <i class="bi bi-easel2-fill text-primary"></i> Class {{ $i }} Details
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-start">
                <!-- Teacher Image in Modal -->
                <div class="text-center mb-3">
                    <img src="https://randomuser.me/api/portraits/men/{{ $i }}.jpg"
                         alt="Teacher Photo"
                         class="rounded-circle shadow"
                         style="width:70px; height:70px; object-fit:cover; border: 2px solid #0d6efd;">
                </div>
                <span id="modal-badge-{{ $i }}" class="badge {{ $isActive ? 'bg-success' : 'bg-secondary' }}">
                    {{ $isActive ? 'Active' : 'Not Active' }}
                </span>
                <ul class="list-unstyled mt-3">
                    <li><strong>Shift:</strong> {{ $shifts[$shiftIndex] }}</li>
                    <li><strong>Start Time:</strong> {{ $startTimes[$shiftIndex] }}</li>
                    <li><strong>End Time:</strong> {{ $endTimes[$shiftIndex] }}</li>
                    <li><strong>Number of Students:</strong> {{ $students }}</li>
                    <li><strong>Description:</strong> This is a sample description for Class {{ $i }}.</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
...
        @endfor
    </div>
</div>
<style>
  .toggle-btn {
    font-weight: 600;
    border-radius: 25px;
    padding: 6px 18px;
    transition: background-color 0.3s ease, color 0.3s ease;
  }
  .toggle-btn:hover {
    background-color: #ffc107cc; /* Slightly lighter yellow */
    color: #212529; /* Dark text for contrast */
  }
</style>
<script>
  function toggleActive(i) {
    const badge = document.getElementById('badge-' + i);
    const modalBadge = document.getElementById('modal-badge-' + i);

    const activeText = 'សិក្សា';    // means "Studying"
    const inactiveText = 'មិនទាន់'; // means "Not Yet"

    if (badge.innerText === activeText) {
      badge.innerText = inactiveText;
      badge.classList.replace('bg-success', 'bg-secondary');

      if (modalBadge) {
        modalBadge.innerText = inactiveText;
        modalBadge.classList.replace('bg-success', 'bg-secondary');
      }
    } else {
      badge.innerText = activeText;
      badge.classList.replace('bg-secondary', 'bg-success');

      if (modalBadge) {
        modalBadge.innerText = activeText;
        modalBadge.classList.replace('bg-secondary', 'bg-success');
      }
    }
  }
</script>

@endsection