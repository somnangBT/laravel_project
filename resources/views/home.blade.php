@extends('layout.app')
@section('content')
<form action="" method="POST">
    @csrf
    <table>
        <tr>
            <td><label for="name">Name:</label></td>
            <td>
                <input type="text" id="name" name="name" required value="{{ old('name') }}">
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <tr>
            <td><label for="title">Title:</label></td>
            <td>
                <input type="text" id="title" name="title" required value="{{ old('title') }}">
                @error('title')
                    <div class="error">{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <tr>
            <td><label for="content">Content:</label></td>
            <td>
                <textarea id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                @error('content')
                    <div class="error">{{ $message }}</div>
                @enderror
            </td>
        </tr>

        <tr>
            <td colspan="2">
                <button type="submit">Submit</button>
            </td>
        </tr>
    </table>
</form>

<a href="{{ route('contain') }}">View Posts</a>

@endsection
