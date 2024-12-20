<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Strategy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1>Money Management</h1>

    <a href="{{ route('money.create') }}" class="btn btn-primary mb-3">Add New mangment</a>

    <table class="table">
        <thead>
            <tr>
                <th>initial balance</th>
                <th>Balance</th>
                <th>Risk in dollar</th>
                <th>Risk Percentage</th>
                <th>target</th>
                <th>Reward to Risk Ratio</th>
                <th>Max Drawdown</th>
                <th>exposure</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($money as $m)
                <tr>
                    <td>${{ $m->initial_balance }}</td>
                    <td>${{ $m->balance }}</td>
                    <td>${{ number_format(($m->balance * $m->risk_percentage) / 100, 2) }}</td>
                    <td>{{ $m->risk_percentage }}%</td>
                    <td>${{ $m->target }}</td>
                    <td>{{ $m->risk_ratio }}</td>
                    <td>${{ $m->max_drawdown }}</td>
                    <td>${{ $m->exposure }}</td>
                    <td>
                        <a href="{{ route('money.complete', $m->id) }}" class="btn btn-info btn-sm">complete</a>
                        <a href="{{ route('money.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('money.destroy', $m->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('do you really wanna delete this money mangment strategy??')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>