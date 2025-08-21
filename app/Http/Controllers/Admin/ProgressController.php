<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProgressController extends Controller
{
   public function index()
   {
       return view('admin.progress'); // Make sure this view exists
   }
   public function store()
   {
       return view('/admin.product'); // Make sure this view exists
   }
}
