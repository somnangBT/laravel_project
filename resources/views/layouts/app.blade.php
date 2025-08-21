<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        /* From Uiverse.io by CYBWEBALI */
        .btn {
            display: grid;
            place-items: center;
            background: #e3edf7;
            padding: 1.4em;
            border-radius: 10px;
            box-shadow: 6px 6px 10px -1px rgba(0, 0, 0, 0.15),
                -6px -6px 10px -1px rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(0, 0, 0, 0);
            cursor: pointer;
            transition: transform 0.5s;
        }

        .btn:hover {
            box-shadow: inset 4px 4px 6px -1px rgba(0, 0, 0, 0.2),
                inset -4px -4px 6px -1px rgba(255, 255, 255, 0.7),
                -0.5px -0.5px 0px rgba(255, 255, 255, 1),
                0.5px 0.5px 0px rgba(0, 0, 0, 0.15),
                0px 12px 10px -10px rgba(0, 0, 0, 0.05);
            border: 1px solid rgba(0, 0, 0, 0.1);
            transform: translateY(0.5em);
        }

        .btn svg {
            transition: transform 0.5s;
        }

        .btn:hover svg {
            transform: scale(0.9);
            fill: #333333;
        }

        /* From Uiverse.io by 0xnihilism */
        .brutalist-button {
            display: flex;
            align-items: center;
            cursor: pointer;
            width: 169px;
            height: 60px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            font-family: Arial, sans-serif;
            font-weight: bold;
            border: 3px solid #fff;
            outline: 3px solid #000;
            box-shadow: 6px 6px 0 #00a4ef;
            transition: all 0.1s ease-out;
            padding: 0 15px;
            box-sizing: border-box;
            position: relative;
            overflow: hidden;
        }

        .brutalist-button::before {
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.8),
                    transparent);
            z-index: 1;
            transition: none;
            /* Initially hide the pseudo-element */
            opacity: 0;
        }

        @keyframes slide {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .brutalist-button:hover::before {
            /* Show the pseudo-element on hover */
            opacity: 1;
            animation: slide 2s infinite;
        }

        .brutalist-button:hover {
            transform: translate(-4px, -4px);
            box-shadow: 10px 10px 0 #000;
            background-color: #000;
            color: #fff;
        }

        @keyframes slide {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .brutalist-button:active {
            transform: translate(4px, 4px);
            box-shadow: 0px 0px 0 #00a4ef;
            background-color: #fff;
            color: #000;
            border-color: #000;
        }

        /* Rest of the CSS remains the same */

        .ms-logo {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1px;
            width: 26px;
            height: 26px;
            margin-right: 8px;
            flex-shrink: 0;
            transition: transform 0.2s ease-out;
            position: relative;
            z-index: 1;
        }

        .brutalist-button:hover .ms-logo {
            transform: rotate(-10deg) scale(1.1);
        }

        .brutalist-button:active .ms-logo {
            transform: rotate(10deg) scale(0.9);
        }

        .ms-logo-square {
            width: 100%;
            height: 100%;
        }

        .ms-logo-square:nth-child(1) {
            background-color: #f25022;
        }

        .ms-logo-square:nth-child(2) {
            background-color: #7fba00;
        }

        .ms-logo-square:nth-child(3) {
            background-color: #00a4ef;
        }

        .ms-logo-square:nth-child(4) {
            background-color: #ffb900;
        }

        .button-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
            transition: transform 0.2s ease-out;
            position: relative;
            z-index: 1;
        }

        .brutalist-button:hover .button-text {
            transform: skew(-5deg);
        }

        .brutalist-button:active .button-text {
            transform: skew(5deg);
        }

        .button-text span:first-child {
            font-size: 11px;
            text-transform: uppercase;
        }

        .button-text span:last-child {
            font-size: 16px;
            text-transform: uppercase;
        }
    </style>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <main>
    {{ $slot }}

    <section class="max-w-md mx-auto mt-12">
        <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center text-center transition-all duration-300 hover:shadow-2xl">

            <!-- Fun Intro GIF -->
            <img 
                src="https://media4.giphy.com/media/v1.Y2lkPWVjZjA1ZTQ3bnY1YXhxNGZ0c3FpbzJzY3YxNHNwbDEzaDJpejgwMm5heGlidHc5eiZlcD12MV9naWZzX3RyZW5kaW5nJmN0PWc/g5R9dok94mrIvplmZd/200.webp" 
                alt="Developer at work" 
                class="mb-4 rounded-lg shadow-lg ring-2 ring-blue-400" 
                style="width: 120px; height: 120px; object-fit: cover;"
            >

            <!-- Profile Photo -->
            <img 
                src="https://cdn.britannica.com/27/4027-050-15A75C70/Flag-Cambodia.jpg" 
                alt="Yorn Somnang" 
                class="rounded-full border-4 border-blue-500 shadow-md mb-4" 
                style="width: 120px; height: 120px; object-fit: cover;"
            >

            <!-- Profile Info -->
            <h2 class="text-2xl font-bold text-gray-800 mb-1">Yorn Somnang System</h2>
            <p class="text-blue-600 font-medium mb-1">Web Developer · Laravel Enthusiast</p>
            <p class="text-gray-600 mb-6 text-sm">
                Welcome to my portfolio! I craft elegant and robust web apps using Laravel, PHP, and JavaScript.
            </p>

            <!-- Buttons Section -->
<div class="flex flex-row gap-4 justify-center mt-4">
    <!-- Microsoft Button -->
    <button class="brutalist-button">
        <div class="ms-logo">
            <div class="ms-logo-square"></div>
            <div class="ms-logo-square"></div>
            <div class="ms-logo-square"></div>
            <div class="ms-logo-square"></div>
        </div>
        <div class="button-text">
            <span>Get it from</span>
            <span>Microsoft</span>
        </div>
    </button>

    <!-- GitHub Button -->
    <button class="btn" aria-label="GitHub profile">
        <svg width="20" height="20" fill="#0092E4" xmlns="http://www.w3.org/2000/svg"
            data-name="Layer 1" viewBox="0 0 24 24" id="github">
            <path
                d="M12,2.2467A10.00042,10.00042,0,0,0,8.83752,21.73419c.5.08752.6875-.21247.6875-.475,0-.23749-.01251-1.025-.01251-1.86249C7,19.85919,6.35,18.78423,6.15,18.22173A3.636,3.636,0,0,0,5.125,16.8092c-.35-.1875-.85-.65-.01251-.66248A2.00117,2.00117,0,0,1,6.65,17.17169a2.13742,2.13742,0,0,0,2.91248.825A2.10376,2.10376,0,0,1,10.2,16.65923c-2.225-.25-4.55-1.11254-4.55-4.9375a3.89187,3.89187,0,0,1,1.025-2.6875,3.59373,3.59373,0,0,1,.1-2.65s.83747-.26251,2.75,1.025a9.42747,9.42747,0,0,1,5,0c1.91248-1.3,2.75-1.025,2.75-1.025a3.59323,3.59323,0,0,1,.1,2.65,3.869,3.869,0,0,1,1.025,2.6875c0,3.83747-2.33752,4.6875-4.5625,4.9375a2.36814,2.36814,0,0,1,.675,1.85c0,1.33752-.01251,2.41248-.01251,2.75,0,.26251.1875.575.6875.475A10.0053,10.0053,0,0,0,12,2.2467Z">
            </path>
        </svg>
    </button>
</div>
        </div>
    </section>
</main>

    </div>
</body>

</html>