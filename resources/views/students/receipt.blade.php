<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scholarship Receipt</title>
    <style>
        body {
            font-family: 'Moul-Regular', sans-serif; /* Apply Moul-Regular font */
            margin: 0;
            padding: 0;
        }

        .receipt-container {
            width: 100%;
            padding: 20px;
            border: 2px solid #006cb8;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #006cb8; /* Blue background for header */
            padding: 20px;
            color: white;
            border-radius: 10px;
            text-align: center;
        }

        .header img {
            width: 150px; /* Logo width */
            margin-bottom: 15px;
        }

        .header h2 {
            margin: 0;
        }

        .header .slogan {
            font-style: italic;
            font-size: 14px;
        }

        .receipt-details {
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .receipt-details p {
            margin: 8px 0;
        }

        .receipt-footer {
            background-color: #e50914; /* Red background for footer */
            color: white;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            margin-top: 40px;
        }

        .receipt-footer .signature {
            font-size: 14px;
            margin-top: 20px;
        }

        .amount {
            font-size: 18px;
            font-weight: bold;
        }

        .button-container {
            margin-top: 20px;
            text-align: center;
        }

        .btn-download {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-download:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="receipt-container">
        <div class="header">
            <!-- University Logo and Name -->
            <img src="{{ public_path('storage/images/BELTEI-Logo.png') }}" alt="Beltei Logo">
            <h2>Beltei International University</h2>
            <p class="slogan">Quality, Efficiency, Excellence, Morality, Virtue</p>
            <p style="font-family: 'Moul-Regular', sans-serif;">សាកលវិទ្យាល័យ ប៊ែលធីអន្តរជាតិ</p>

        </div>

        <div class="receipt-details">
            <p><strong>Name:</strong> {{ $student->name }}</p>
            <p><strong>Major:</strong> {{ $student->major->name ?? 'No major assigned' }}</p>
            <p><strong>Duration:</strong> One Batch</p>
            <p class="amount"><strong>Amount:</strong> 
                @if($student->major->name == 'Electrical Engineering')
                    $1500
                @elseif($student->major->name == 'Computer Science')
                    $760
                @else
                    $0
                @endif
            </p>
        </div>

        <div class="receipt-footer">
            <p><strong>Issued By:</strong> H.E. DR. LY CHHENG</p>
            <p class="signature"><strong>Signature:</strong> ____________________</p>
            <p>Seal: [Institution Seal]</p>
        </div>

        <!-- Download Button -->
        
    </div>

</body>
</html>
