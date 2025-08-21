<?php

return [

    /*
    |--------------------------------------------------------------------------
    | DomPDF Settings
    |--------------------------------------------------------------------------
    |
    | Settings for DomPDF library.
    |
    */

    'enable_font_subsetting' => true,  // Enable font subsetting for embedding fonts

    'show_warnings' => false,  // Turn off warnings from DomPDF

    'public_path' => null,  // Override the public path if needed

    'convert_entities' => true,  // Convert special characters like € and £

    'options' => [
        'font_dir' => storage_path('fonts'),  // Path to font directory
        'font_cache' => storage_path('fonts/cache'),  // Path to font cache directory
        'font_family' => [
            'Moul-Regular' => storage_path('fonts/Moul-Regular.ttf'),  // Correct path to the font
        ],
    ],

    /**
     * The PDF rendering backend to use
     */
    'pdf_backend' => 'CPDF',  // Use CPDF backend for PDF rendering

    /**
     * The default font family
     */
    'default_font' => 'Moul-Regular',  // Set Moul-Regular as the default font

];
