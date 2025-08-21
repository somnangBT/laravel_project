@extends('layout.app')
@section('content')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dangrek&display=swap" rel="stylesheet">
<style>
    th {
  font-family: "Dangrek", sans-serif;
  font-weight: 400;
  font-style: normal;
}

</style>
<div class="container mt-5">
    <h1 class="text-center mb-4 text-primary">គ្រូ</h1>

    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <!-- Create Post Button and Filter/Search -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('posts.store') }}" class="btn btn-success btn-lg shadow-sm">
            <i class="bi bi-plus-circle"></i> Create Post
        </a>

        <!-- Search and Filter Form -->
        <form action="{{ route('posts.index') }}" method="GET" class="d-flex align-items-center">
    <input type="text" name="search" class="form-control me-2" placeholder="Search by name" value="{{ request('search') }}" style="border-radius: 25px;">
    <select name="category" class="form-select me-2" style="border-radius: 25px;">
        <option value="">All Categories</option>
        @foreach($categories as $cat)
            <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
        @endforeach
    </select>
    <select name="province" class="form-select me-2" style="border-radius: 25px;">
        <option value="">All Provinces</option>
        @foreach($provinces as $prov)
            <option value="{{ $prov }}" {{ request('province') == $prov ? 'selected' : '' }}>{{ $prov }}</option>
        @endforeach
    </select>
    <!-- Add price filters here -->
    <input type="number" step="0.01" name="min_price" class="form-control me-2" placeholder="Min Price" value="{{ request('min_price') }}" style="border-radius: 25px; width: 120px;">
    <input type="number" step="0.01" name="max_price" class="form-control me-2" placeholder="Max Price" value="{{ request('max_price') }}" style="border-radius: 25px; width: 120px;">
    <button type="submit" class="btn btn-warning me-2" style="border-radius: 25px;">
        <i class="bi bi-filter-circle"></i> Filter
    </button>
    <a href="{{ url('post/index') }}" class="btn btn-secondary" style="border-radius: 25px;">
        <i class="bi bi-arrow-clockwise"></i> Refresh
    </a>
</form>
    </div>

    <!-- Posts Table -->
    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-primary">
    <tr>
        <th>លេខរៀង</th>
        <th>ឈ្មោះ</th>
        <th>អត្ថលេខ</th>
        <th>ផ្ទះ</th>
        <th>ផ្លូវលេខ</th>
        <th>មុខដំណែង</th>
        <th>ខេត្ត</th>
        <th>តម្លៃ</th> <!-- Add this -->
        <th>រូបភាព</th>
        <th>ប្រតិបត្ដិការ</th>
    </tr>
</thead>
<tbody>
                @forelse($posts as $post)
                      <tr class="text-center">
            <td class="text-info">{{ $post->id }}</td>
            <td class="text-success">{{ $post->name }}</td>
            <td class="text-warning">{{ $post->member_id }}</td>
            <td class="text-primary">{{ $post->title }}</td>
            <td class="text-secondary">{{ $post->content }}</td>
            <td class="text-danger">{{ $post->category }}</td>
            <td class="text-secondary">{{ $post->province }}</td>
           <td>${{ number_format($post->price ?? 0, 2) }}</td> <!-- Show price -->
            <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" alt="Image" class="img-thumbnail" style="width: 75px; height: 75px; object-fit: cover;">
                            @else
                                <span class="text-muted">No Image</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm mb-2" style="border-radius: 25px;">
    <i class="bi bi-pencil-square"></i> Edit
</a>


                            <a href="{{ route('post.qrcode', $post->id) }}" class="btn btn-info btn-sm mb-2" style="border-radius: 25px;">
                                <i class="bi bi-qr-code"></i> QR Code
                            </a>

                            <form action="{{ url('post/delete', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete this post?')" style="border-radius: 25px;">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">No posts found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    {{ $posts->links() }}
</div>

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

@endsection

