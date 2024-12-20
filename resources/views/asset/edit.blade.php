@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Asset</h1>

        <!-- Form to edit an existing asset -->
        <form action="{{ route('asset.update', $asset->id) }}" method="POST">
            @csrf
            @method('PUT')  <!-- This will make the form use PUT method -->

            <div class="mb-3">
                <label for="name" class="form-label">Asset Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $asset->name) }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Asset Type</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ old('type', $asset->type) }}" required>
                @error('type')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="favorite_indicator" class="form-label">Favorite Indicator</label>
                <input type="text" class="form-control" id="favorite_indicator" name="favorite_indicator" value="{{ old('favorite_indicator', $asset->favorite_indicator) }}">
                @error('favorite_indicator')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="study_objective" class="form-label">Study Objective</label>
                <input type="text" class="form-control" id="study_objective" name="study_objective" value="{{ old('study_objective', $asset->study_objective) }}">
                @error('study_objective')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Asset</button>
        </form>
    </div>
@endsection
