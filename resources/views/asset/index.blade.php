@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Assets</h1>
        <a href="{{ route('asset.create') }}" class="btn btn-primary">Create Asset</a>
    </div>

    @if($assets->isEmpty())
        <div class="alert alert-info">
            No assets found. Click "Create Asset" to add a new one.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Win Percentage</th>
                    <th>Lose Percentage</th>
                    <th>Favorite Indicator</th>
                    <th>Study Objective</th>
                    <th >action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assets as $asset)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{route('asset.show',['asset'=>$asset->id])}}">{{ $asset->name }}</a></td>
                        <td>{{ $asset->type }}</td>
                        <td>{{ $asset->win_percentage }}%</td>
                        <td>{{ $asset->wintimes }}%</td>
                        <td>{{ $asset->favorite_indicator }}</td>
                        <td>{{ $asset->study_objective }}</td>
                        <td><a class="btn btn-primary" href="{{ route('asset.edit',['asset'=>$asset->id]) }}">edit</a>
                        
                            <form action="{{ route('asset.destroy', $asset->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this asset?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
