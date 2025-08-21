<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use App\Models\Post; // Import the model if used
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\DB;
use App\Models\Student;
use App\Models\Major;
use App\Models\Subject;
use App\Models\User; // Import User model for teacher count
use App\Http\Models; // Import DB facade for database queries
// Import the QrCode facade
class PostController extends Controller
{

    public function index(Request $request)
    {

        // Get filter inputs
        $search = $request->input('search');
        $category = $request->input('category');
        $province = $request->input('province');
        $member_id = $request->input('member_id');
        $min_price = $request->input('min_price');
        $max_price = $request->input('max_price');

        // Prepare filter options
        $categories = Post::distinct()->pluck('category');
        $provinces = Post::distinct()->pluck('province');

        // Build the query
        $posts = Post::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($member_id, function ($query, $member_id) {
                $query->where('member_id', $member_id);
            })
            ->when($category, function ($query, $category) {
                $query->where('category', $category);
            })
            ->when($province, function ($query, $province) {
                $query->where('province', $province);
            })
            ->when($min_price, function ($query, $min_price) {
                $query->where('price', '>=', $min_price);
            })
            ->when($max_price, function ($query, $max_price) {
                $query->where('price', '<=', $max_price);
            })
            ->paginate(10);

        return view('post.index', compact(
            'posts',
            'categories',
            'provinces',
            'search',
            'category',
            'province',
            'min_price',
            'max_price',

        ));
    }

    public function teacherProgress()
    {
        // Example: Get progress data
        $categoryProgress = Post::select('category', DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        $categoryLabels = $categoryProgress->pluck('category');
        $categoryCounts = $categoryProgress->pluck('total');

        return view('post.progress', compact('categoryProgress', 'categoryLabels', 'categoryCounts'));
    }

    public function create()
    {
        $categories = Post::distinct()->pluck('category');
        $provinces = Post::distinct()->pluck('province');
        return view('post.create', compact('categories', 'provinces'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'province' => 'required|string',
            'member_id' => 'nullable|integer',
            'price' => 'nullable|numeric', // Validate member_id // Validate category
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Post::create([
            'name' => $request->input('name'),
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'member_id' => $request->input('member_id'),
            'price' => $request->price, // Save price // Save member_id
            'province' => $request->input('province'),  // Save category
            'image' => $imagePath,
        ]);

        return redirect()->route('post.index')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edite', compact('post'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'province' => 'required|string',
            'member_id' => 'nullable|integer', // Validate member_id// Validate category
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post = Post::findOrFail($id);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image) {
                Storage::delete('public/' . $post->image);
            }

            // Store the new image
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        // Update other fields
        $post->title = $request->input('title');
        $post->name = $request->input('name');
        $post->content = $request->input('content');
        $post->category = $request->input('category');
        $post->province = $request->input('province'); // Update category
        $post->save();

        return redirect()->route('post.index')->with('success', 'Post updated successfully!');
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index')->with('success', 'Post deleted successfully!');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('post.index')->with('success', 'Logged in successfully!');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }
    public function home()
    {
        $totalStudents = Student::count();
        $totalSubjects = Subject::count();
        $totalTeachers = Post::all()->count(); // Assuming you want to count all posts as teachers
        $posts = Post::all(); // or your existing logic

        return view('home', compact('totalStudents', 'totalTeachers', 'totalSubjects', 'posts'));
    }
    // select function 
    public function bulkDelete(Request $request)
    {
        $postIds = $request->input('selected_posts', []);
        if (!empty($postIds)) {
            Post::whereIn('id', $postIds)->delete();
            return redirect()->back()->with('success', 'Selected posts have been deleted successfully.');
        }
        return redirect()->back()->with('error', 'No posts selected for deletion.');
    }

    public function generateQrCode($id)
    {
        // Retrieve the post by ID
        $post = Post::findOrFail($id);

        // Generate the QR code with PNG format
        $qrCode = QrCode::format('png')
            ->size(200)
            ->encoding('UTF-8')
            ->generate("ឈ្មោះ ៖ {$post->name}\nកុដិ ៖ {$post->content}\nមុខដំណែង: {$post->category}\nខេត្ត ៖ {$post->province}\nលេខកូដ ៖ {$post->id}\nបានចុះឈ្មោះ ៖ {$post->created_at}\nបានធ្វើបច្ចុប្បន្នភាព៖ {$post->updated_at}\nលេខសង្ឃដីកា៖​ {$post->member_id}\nរូបភាព៖ {$post->image}\nវត្ត៖ {$post->title}");

        // Convert the QR code to a data URI to display it properly in the view
        $qrCodeDataUri = 'data:image/png;base64,' . base64_encode($qrCode);

        // Pass the QR code data URI and post details to the view
        return view('post.qrcode', compact('qrCodeDataUri', 'post'));
    }
}
