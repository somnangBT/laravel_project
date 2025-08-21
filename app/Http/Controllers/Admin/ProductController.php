<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post; // Import the model if used
class ProductController extends Controller
{
    public function index(Request $request)
    
    {
       return view('admin.product'); // Make sure this view exists
    }
}
