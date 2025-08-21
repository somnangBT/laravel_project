@extends('layout.app')

@section('content')
<div class="container-fluid" style="position: relative; height: 100vh; background: url('{{ asset('images/netflix-image.jpg') }}') no-repeat center center/cover;">

    <!-- Dark Overlay -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.6);"></div>

    <div class="container mt-5 position-relative z-index-1">
        <h2 class="text-center mb-4 text-white">Create a New Post</h2>
        <form action="{{ url('post/index') }}" method="POST" class="shadow p-4 rounded bg-light" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="member_id" class="form-label">អត្ថលេខ:</label>
            <input type="number" id="member_id" name="member_id" class="form-control" value="{{ old('member_id') }}" placeholder="Enter Member ID">
            @error('member_id')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">ឈ្មោះ:</label>
            <input type="text" id="name" name="name" class="form-control" required value="{{ old('name') }}">
            @error('name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">ផ្ទះ:</label>
            <input type="text" id="title" name="title" class="form-control" required value="{{ old('title') }}">
            @error('title')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">ផ្លូវលេខ:</label>
            <textarea id="content" name="content" rows="4" class="form-control" required>{{ old('content') }}</textarea>
            @error('content')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- New Category Field with Select Dropdown -->
        <div class="mb-3">
            <label for="category" class="form-label">មុខដំណែង:</label>
            <select id="category" name="category" class="form-select" required>
                <option value="" disabled selected>ជ្រើសរើស មុខដំណែង</option>
                <option value="គ្រូពេញសិទ្ធ" {{ old('category') == 'គ្រូពេញសិទ្ធ' ? 'selected' : '' }}>គ្រូពេញសិទ្ធ</option>
                <option value="គ្រូកិច្ចសន្យា" {{ old('category') == 'គ្រូកិច្ចសន្យា' ? 'selected' : '' }}>គ្រូកិច្ចសន្យា</option>
                <option value="គ្រូពេញម៉ោង" {{ old('category') == 'គ្រូពេញម៉ោង' ? 'selected' : '' }}>គ្រូពេញម៉ោង</option>
                <option value="គ្រូក្រៅម៉ោង" {{ old('category') == 'គ្រូក្រៅម៉ោង' ? 'selected' : '' }}>គ្រូក្រៅម៉ោង</option>
            </select>
            @error('category')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
    <label for="price" class="form-label">តម្លៃ (Price):</label>
    <input type="number" step="0.01" id="price" name="price" class="form-control" value="{{ old('price') }}" placeholder="បញ្ចូលតម្លៃ">
    @error('price')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>

        <div class="mb-3">
            <label for="province" class="form-label">ខេត្ត:</label>
            <select id="province" name="province" class="form-select" required>
                    <option value="" disabled selected>ជ្រើសរើស​ ខេត្ត</option>
                    <option value="ភ្នំពេញ (Phnom Penh) - Capital city" {{ old('province') == 'Province 1' ? 'selected' : '' }}>ភ្នំពេញ (Phnom Penh) - Capital city

                    </option>
                    <option value="បាត់ដំបង " {{ old('province') == 'Province 2' ? 'selected' : '' }}>បាត់ដំបង (Battambang)</option>
                    <option value="កំពង់ចាម " {{ old('province') == 'Province 3' ? 'selected' : '' }}>កំពង់ចាម (Kampong Cham)</option>
                    <option value="កំពង់ឆ្នាំង " {{ old('province') == 'Province 4' ? 'selected' : '' }}>កំពង់ឆ្នាំង (Kampong Chhnang)</option>
                    <option value="កំពង់ស្ពឺ " {{ old('province') == 'Province 5' ? 'selected' : '' }}>កំពង់ស្ពឺ (Kampong Speu)</option>
                    <option value="កំពង់ធំ " {{ old('province') == 'Province 6' ? 'selected' : '' }}>កំពង់ធំ (Kampong Thom)</option>
        <option value="កំពត " {{ old('province') == 'Province 7' ? 'selected' : '' }}>កំពត (Kampot)</option>
        <option value="កណ្តាល " {{ old('province') == 'Province 8' ? 'selected' : '' }}>កណ្តាល (Kandal)</option>
        <option value="កែប " {{ old('province') == 'Province 9' ? 'selected' : '' }}>កែប (Kep)</option>
        <option value="ក្រចេះ " {{ old('province') == 'Province 10' ? 'selected' : '' }}>ក្រចេះ (Kratié)</option>
        <option value="មណ្ឌលគីរ " {{ old('province') == 'Province 11' ? 'selected' : '' }}>មណ្ឌលគីរ (Mondulkiri)</option>
        <option value="ឧត្តមានជ័យ " {{ old('province') == 'Province 12' ? 'selected' : '' }}>ឧត្តមានជ័យ (Oddar Meanchey)</option>
        <option value="ប៉ៃលិន " {{ old('province') == 'Province 13' ? 'selected' : '' }}>ប៉ៃលិន (Pailin)</option>
        <option value="បន្ទាយមានជ័យ" {{ old('province') == 'Province 14' ? 'selected' : '' }}>បន្ទាយមានជ័យ (Banteay Meanchey)</option>
        <option value="ព្រះវិហារ " {{ old('province') == 'Province 15' ? 'selected' : '' }}>ព្រះវិហារ (Preah Vihear)</option>
        <option value="ព្រៃវែង " {{ old('province') == 'Province 16' ? 'selected' : '' }}>ព្រៃវែង (Prey Veng)</option>
        <option value="ពោធិ៍សាត " {{ old('province') == 'Province 17' ? 'selected' : '' }}>ពោធិ៍សាត (Pursat)</option>
        <option value="រតនគីរី " {{ old('province') == 'Province 18' ? 'selected' : '' }}>រតនគីរី (Ratanakiri)</option>
        <option value="សៀមរាប " {{ old('province') == 'Province 19' ? 'selected' : '' }}>សៀមរាប (Siem Reap)</option>
        <option value="ក្រុងព្រះសីហនុ " {{ old('province') == 'Province 20' ? 'selected' : '' }}>ក្រុងព្រះសីហនុ (Sihanoukville)

        </option>
        <option value="ស្ទឹងត្រែង " {{ old('province') == 'Province 21' ? 'selected' : '' }}>ស្ទឹងត្រែង (Stung Treng)</option>
        <option value="ស្វាយរៀង " {{ old('province') == 'Province 22' ? 'selected' : '' }}>ស្វាយរៀង (Svay Rieng)</option>
        <option value="តាកែវ " {{ old('province') == 'Province 23' ? 'selected' : '' }}>តាកែវ (Takeo)</option>
        <option value="ត្បូងឃ្មុំ " {{ old('province') == 'Province 24' ? 'selected' : '' }}>ត្បូងឃ្មុំ (Tbong Khmum)</option>
    </select>
    @error('province')
        <div class="text-danger mt-1">{{ $message }}</div>
    @enderror
</div>
        <div class="mb-3">
            <label for="image" class="form-label">ជ្រើសរើស រូបភាព:</label>
            <input type="file" id="image" name="image" class="form-control" onchange="previewImage(event)">
            @error('image')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Preview -->
        <div class="mb-3 text-center">
            <img id="imagePreview" src="#" alt="Image Preview" style="display: none; max-width: 100px; max-height: 100px;">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">ចុះឈ្មោះ</button>
        </div>
        </form>
    </div>
</div>

<script>
    function previewImage(event) {
        const image = document.getElementById('imagePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
                image.style.display = 'block'; // Show the image
            };

            reader.readAsDataURL(file); // Read the file as a data URL
        } else {
            image.src = '#';
            image.style.display = 'none'; // Hide the image if no file is selected
        }
    }
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endsection