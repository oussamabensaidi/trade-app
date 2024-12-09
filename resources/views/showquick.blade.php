<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Position Details</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Quick Position Details</h2>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title text-primary">Quick Position #{{ $quick->id }}</h5>
                
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Parent result:</strong></div>
                    <div class="col-md-9">{{ $trade->result ?? 'No Trade result available' }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-3"><strong>Trade ID:</strong></div>
                    <div class="col-md-9">{{ $quick->trade_id ?? 'No Trade ID available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Asset Name:</strong></div>
                    <div class="col-md-9">{{ $quick->assetName ?? 'No Asset Name available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Operation:</strong></div>
                    <div class="col-md-9">{{ $quick->operation ?? 'No Operation provided' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Why Before:</strong></div>
                    <div class="col-md-9">{{ $quick->why_before ?? 'No data available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Why After:</strong></div>
                    <div class="col-md-9">{{ $quick->why_after ?? 'No data available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Profit:</strong></div>
                    <div class="col-md-9">{{ $quick->profit ?? 'No profit information' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Result:</strong></div>
                    <div class="col-md-9">{{ $quick->result ?? 'No result available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Price:</strong></div>
                    <div class="col-md-9">{{ $quick->price ?? 'No price available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Live Notes:</strong></div>
                    <div class="col-md-9">{{ $quick->livenotes ?? 'No live notes available' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Target:</strong></div>
                    <div class="col-md-9">{{ $quick->target ?? 'No target specified' }}</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3"><strong>Created At:</strong></div>
                    <div class="col-md-9">{{ $quick->created_at ?? 'No creation date available' }}</div>
                </div>
                <div class="row mb-3">
                    <a href="{{ route('index') }}" class="btn btn-outline-primary">Back to Accueil</a>
                    <a class="btn btn-outline-primary" href="{{route('show',$quick->trade_id)}}">check parent analysis</a>
                <a class="btn btn-outline-primary" href="{{route('complete_quick_page',$quick->id)}}">complete</a>
                <a class="btn btn-outline-primary" href="{{route('livenotes_page',$quick->id)}}">Live Notes</a>
                <form action="{{ route('destroy', $quick->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
                </div>
            </div>

                <!-- Add action buttons (edit, delete) -->
            </div>
                
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
