<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Strategy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Edit Money Management Strategy</h1>

    <form action="{{ route('money.update', $money->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="balance" class="form-label">Balance</label>
            <input type="number" step="0.01" name="initial_balance" id="balance" class="form-control" value="{{ $money->balance }}" required>
        </div>

        <button type="submit" class="btn btn-success">Update Strategy</button>
        <a href="{{ route('money.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
