@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asset Details: {{ $asset->name }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $asset->name }}</h5>
                <p class="card-text"><strong>Type:</strong> {{ $asset->type }}</p>
                <p class="card-text"><strong>Win Percentage:</strong> {{ $asset->win_percentage }}%</p>
                <p class="card-text"><strong>Lose Percentage:</strong> {{ $asset->wintimes }}%</p>
                <p class="card-text"><strong>Favorite Indicator:</strong> {{ $asset->favorite_indicator ?? 'N/A' }}</p>
                <p class="card-text"><strong>Study Objective:</strong> {{ $asset->study_objective ?? 'N/A' }}</p>
            </div>
        </div>

        <!-- Buttons for editing and deleting (if needed) -->
        <div class="mt-3">
            <a href=" route('asset.edit', $asset->id) }}" class="btn btn-warning">Edit</a>

            <!-- Optional: Add Delete button (if needed) -->
            <form action="{{ route('asset.destroy', $asset->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this asset?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
