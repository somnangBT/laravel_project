<form action="{{ route('student.update', $student->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Student Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Student Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
    </div>
    
    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}" required>
    </div>
    
    <!-- Date of Birth -->
    <div class="mb-3">
        <label for="date_of_birth" class="form-label">Date of Birth</label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
    <!-- Major -->
    <div class="mb-3">
        <label for="major" class="form-label">Major</label>
        <select class="form-select" id="major" name="major_id" required>
            <option value="">Select Major</option>
            @foreach($majors as $major)
                <option value="{{ $major->id }}" {{ $major->id == $student->major->id ? 'selected' : '' }}>
                    {{ $major->name }}
                </option>
            @endforeach
        </select>
    </div>

    <!-- Subjects -->
    <div class="mb-3">
        <label for="subjects" class="form-label">Subjects</label>
        <select multiple class="form-select" id="subjects" name="subjects[]" required>
            @foreach($allSubjects as $subject)
                <option value="{{ $subject->id }}" 
                    @if($student->subjects->contains($subject->id)) selected @endif>
                    {{ $subject->name }}
                </option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Update Student</button>
</form>
