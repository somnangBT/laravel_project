<div class="container mt-5">
    <h2 class="text-center mb-4">Add New Student</h2>

    <!-- Success Message Alert -->
  @if(session('success'))
    <div id="success-alert" class="alert alert-success text-center" role="alert">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function() {
            const alertBox = document.getElementById('success-alert');
            if (alertBox) {
                alertBox.style.transition = 'opacity 1s ease-out';
                alertBox.style.opacity = 0;
                setTimeout(function() {
                    alertBox.style.display = 'none';
                    window.location.href = "{{ route('students.index') }}";  // Redirect after success alert
                }, 1000);
            }
        }, 1000);
    </script>
@endif


    <!-- Add Student Form -->
   <form action="{{ route('students.store') }}" method="POST" class="shadow p-4 rounded bg-light">
    @csrf
    <!-- Student Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Student Name:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
        @error('name')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Student Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Date of Birth -->
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth:</label>
        <input type="date" id="date_of_birth" name="date_of_birth" class="form-control" required>
    </div>

    <!-- Major Selection -->
    <div class="mb-3">
        <label for="major_id" class="form-label">Select Major:</label>
        <select id="major_id" name="major_id" class="form-select" required>
            <option value="" disabled selected>Select a Major</option>
            @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ old('major_id') == $major->id ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
        @error('major_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <!-- Submit Button -->
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Add Student</button>
    </div>
</form>

</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
