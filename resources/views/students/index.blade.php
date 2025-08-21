
@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Students and Their Majors</h2>
        <div class="mb-3 d-flex align-items-center gap-2">
            <div class="dropdown">
                <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterNameDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-funnel"></i> Filter by Name
                </button>
                <div class="dropdown-menu p-3" style="min-width: 250px;">
                    <input type="text" id="filterNameInput" class="form-control" placeholder="Type name to filter...">
                </div>
            </div>
            <button class="btn btn-outline-secondary" id="clearFilterBtn" style="display:none;">
                <i class="bi bi-x-circle"></i> Clear Filter
            </button>
        </div>
        
        <!-- Success Alert -->
        @if(session('success'))
            <div id="success-alert" class="alert alert-success text-center" role="alert">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function () {
                    const alertBox = document.getElementById('success-alert');
                    if (alertBox) {
                        alertBox.style.transition = 'opacity 1s ease-out';
                        alertBox.style.opacity = 0;
                        setTimeout(function () {
                            alertBox.style.display = 'none';
                        }, 1000); // Wait for the fade-out effect to complete
                    }
                }, 1000); // Delay before it starts fading out (in ms)
            </script>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped" id="studentsTable">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Major</th>
                        <th>Subjects</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr class="text-center">
                            <td>{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($student->date_of_birth)->format('d-m-Y') }}</td>
                            <td>{{ $student->created_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $student->updated_at->format('d-m-Y H:i') }}</td>
                            <td>{{ $student->major->name ?? 'No major assigned' }}</td>
                            <td>
                                @if($student->subjects->isNotEmpty())
                                    <ul class="mb-0" style="list-style-type: none; padding: 0;">
                                        @foreach($student->subjects as $subject)
                                            <li>{{ $subject->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <em>No subjects assigned</em>
                                @endif
                            </td>
                            <td>
                                <!-- Buttons for Receipt, Delete, and Update -->
                                <button class="btn btn-success btn-custom mb-2" data-bs-toggle="modal"
                                    data-bs-target="#receiptModal{{ $student->id }}">View Receipt</button>
                                <button class="btn btn-danger btn-custom mb-2" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $student->id }}">Delete</button>
                                <button class="btn btn-primary btn-custom mb-2" data-bs-toggle="modal"
                                    data-bs-target="#updateModal{{ $student->id }}">Update</button>

                            </td>
                        </tr>

                        <!-- Receipt Modal -->
                        <div class="modal fade" id="receiptModal{{ $student->id }}" tabindex="-1"
                            aria-labelledby="receiptModalLabel{{ $student->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="receiptModalLabel{{ $student->id }}">Scholarship Receipt for
                                            {{ $student->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Receipt content -->
                                        <div class="receipt-container">
                                            <div class="receipt-header text-center">
                                                <div class="header-left d-flex align-items-center gap-3">
                                                    <img src="{{ asset('storage/images/BELTEI-Logo.png') }}" alt="Logo"
                                                        class="receipt-logo">
                                                    <div>
                                                        <p class="header-text"><strong>Beltei International University</strong>
                                                        </p>
                                                        <p class="khmer-font"><strong>សាកលវិទ្យាល័យ ប៊ែលធីអន្តរជាតិ</strong></p>
                                                        <p class="receipt-slogan">Quality, Efficiency, Excellence, Morality,
                                                            Virtue</p>
                                                    </div>
                                                </div>
                                                <div class="header-right">
                                                    <p class="receipt-number">Receipt : {{$student->id}}</p>
                                                    <p><strong>Date:</strong>{{$student->created_at}}</p>
                                                </div>
                                            </div>
                                            <div class="receipt-details text-center">
                                                <div class="row justify-content-center">
                                                    <div class="col-md-6">
                                                        <p><strong>Name:</strong> {{ $student->name }}</p>
                                                        <p><strong>Major:</strong>
                                                            {{ $student->major->name ?? 'No major assigned' }}</p>
                                                        <p><strong>Duration:</strong> One Batch</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Amount:</strong>
                                                            @if($student->major->name == 'Electrical Engineering')
                                                                $1500
                                                            @elseif($student->major->name == 'Computer Science')
                                                                $760
                                                            @else
                                                                $0
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="receipt-footer text-center">
                                                <p><strong>Issued By:</strong> H.E. DR. LY CHHENG</p>
                                                <p>
                                                    <strong>Signature:</strong>
                                                    <img src="{{ asset('storage/images/s1.jpg') }}" alt="Signature"
                                                        style="width: 100px; height: auto; vertical-align: middle;">
                                                    ________________________
                                                </p>
                                                <p>
                                                    Seal:
                                                    <img src="{{ asset('storage/images/s1.jpg') }}" alt="Seal"
                                                        style="height:40px; vertical-align: middle;">
                                                    [Institution Seal]
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <a href="{{ route('downloadReceipt', $student->id) }}" class="btn btn-success">Download
                                            Receipt</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Modal -->
                        <div class="modal fade" id="deleteModal{{ $student->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $student->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $student->id }}">Delete Student</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete student <strong>{{ $student->name }}</strong>?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Update Modal -->
                        <div class="modal fade" id="updateModal{{ $student->id }}" tabindex="-1"
                            aria-labelledby="updateModalLabel{{ $student->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="updateModalLabel{{ $student->id }}">Update Student:
                                            {{ $student->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name{{ $student->id }}" class="form-label">Student Name:</label>
                                                <input type="text" id="name{{ $student->id }}" name="name" class="form-control"
                                                    value="{{ $student->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email{{ $student->id }}" class="form-label">Email:</label>
                                                <input type="email" id="email{{ $student->id }}" name="email"
                                                    class="form-control" value="{{ $student->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date_of_birth{{ $student->id }}" class="form-label">Date of
                                                    Birth:</label>
                                                <input type="date" id="date_of_birth{{ $student->id }}" name="date_of_birth"
                                                    class="form-control" value="{{ $student->date_of_birth }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="major_id{{ $student->id }}" class="form-label">Select Major:</label>
                                                <select id="major_id{{ $student->id }}" name="major_id" class="form-select"
                                                    required>
                                                    <option value="" disabled>Select a Major</option>
                                                    @foreach($majors as $major)
                                                        <option value="{{ $major->id }}" {{ $student->major_id == $major->id ? 'selected' : '' }}>
                                                            {{ $major->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Filter Script -->
        <script>
    document.addEventListener('DOMContentLoaded', function () {
        const tableRows = document.querySelectorAll('#studentsTable tbody tr');

        function filterTable() {
            const nameFilter = document.getElementById('filterNameInput').value.toLowerCase();
            const emailFilter = document.getElementById('filterEmailInput')?.value.toLowerCase() || '';
            const majorFilter = document.getElementById('filterMajorInput')?.value.toLowerCase() || '';

            tableRows.forEach(row => {
                const name = row.cells[1].innerText.toLowerCase();
                const email = row.cells[2].innerText.toLowerCase();
                const major = row.cells[6].innerText.toLowerCase();

                const showRow =
                    name.includes(nameFilter) &&
                    email.includes(emailFilter) &&
                    major.includes(majorFilter);

                row.style.display = showRow ? '' : 'none';
            });
        }

        ['filterNameInput', 'filterEmailInput', 'filterMajorInput'].forEach(id => {
            const input = document.getElementById(id);
            if (input) input.addEventListener('input', filterTable);
        });

        const clearBtn = document.getElementById('clearFilterBtn');
        clearBtn.addEventListener('click', () => {
            ['filterNameInput', 'filterEmailInput', 'filterMajorInput'].forEach(id => {
                const input = document.getElementById(id);
                if (input) input.value = '';
            });
            filterTable();
        });
    });
</script>

        <script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection
    <style>
        /* Main Receipt Container */
        .receipt-container {
            width: 100%;
            padding: 20px;
            border: 2px solid #006cb8;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        /* Header Section */
        .receipt-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
            background: linear-gradient(120deg, #006cb8, #4c8fbd);
            color: white;
            padding: 15px;
            border-radius: 10px;
        }

        .header-left {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-left img {
            height: 80px;
            width: auto;
        }

        .header-left div {
            margin-left: 10px;
        }

        .header-right {
            text-align: center;
        }

        .receipt-number {
            font-size: 18px;
            font-weight: bold;
            color: #f8c700;
        }

        .receipt-details {
            margin-bottom: 20px;
        }

        .receipt-details .row {
            display: flex;
            justify-content: center;
            color: #333;
        }

        .receipt-details p {
            margin: 5px 0;
            font-size: 14px;
        }

        /* Footer Section */
        .receipt-footer {
            display: flex;
            justify-content: center;
            font-size: 14px;
            background-color: #e50914;
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }

        .footer-left p,
        .footer-right p {
            margin: 5px 0;
        }

        .receipt-slogan {
            font-style: italic;
            font-size: 14px;
        }

        .khmer-font {
            font-family: 'Khmer Moul', sans-serif;
            font-size: 20px;
            color: #fff;
        }

        .header-text {
            font-family: 'Khmer Moul', sans-serif;
            font-size: 20px;
            color: #f8c700;
        }

        .receip-logo {
            margin-top: auto height: 80px;
            width: auto;
        }

        /* Add background image to border */


        .receipt-container::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://beltei.edu.kh/asset/img/university/campus/BIU1.png') no-repeat center center;
            background-size: cover;
            border-radius: 15px;
            opacity: 0.05;
            z-index: -2;
            /* Ensure background is behind other content */
            background-color: #f0f0f0;
            /* Fallback background color */
        }
    </style>
    <style>
        #success-alert {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            width: 200px;
            /* Reduced width */
            padding: 10px 15px;
            /* Reduced padding */
            font-size: 14px;
            /* Smaller font size */
            border-radius: 5px;
            display: block;
            /* Ensure alert is displayed */
            background-color: #68dd83;
            /* Green color */
            color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            font-weight: bold;
        }

        #success-alert {
            animation: slideIn 0.5s ease-in-out;
        }

        @keyframes slideIn {
            from {
                top: -50px;
                opacity: 0;
            }

            to {
                top: 20px;
                opacity: 1;
            }
        }
    </style>
    <style>
        /* ...existing code... */

        /* Make table header sticky */
        #studentsTable thead th {
            position: sticky;
            top: 0;
            z-index: 2;
            background: #212529;
            /* Bootstrap dark */
            color: #fff;
        }

        /* Optional: Set a max height for the table container to enable scrolling */
        .table-responsive {
            max-height: 500px;
            overflow-y: auto;
        }
    </style>
    <!-- Bootstrap JS -->