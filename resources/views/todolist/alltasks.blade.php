<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>toDoList</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    @php
    use Carbon\Carbon;
    $today = Carbon::now()->format('l'); // Get today's day name (e.g., 'Monday')
@endphp

<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Archeived</th>
                <th>Future Status</th>
                <th>Days Off</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                @php
                    // Parse the `future_beginning` value as a Carbon instance
                    $futureDate = $task->future_beginning ? Carbon::parse($task->future_beginning) : null;
                    $taskdate = Carbon::now();
                    $dayOff = json_decode($task->day_off); // Decode the JSON string into an array
                    if (is_null($dayOff)) {
                        $dayOff = [];
                    }
                @endphp

                <tr>
                    <td>
                        <a href="{{ route('taskshow', ['id' => $task->id]) }}">{{ $task->name }}</a>
                    </td>
                    
                    <td>
                        @if ($task->deleted == 0)
                            <ul class="list-unstyled">
                                    <li><span class="badge bg-success">working</span></li>
                            </ul>
                        @else
                            <span class="badge bg-warning">Archeived</span>
                        @endif
                    </td>
                    <!-- Display Future Status -->
                    <td>
                        @if ($futureDate && $taskdate->lt($futureDate))
                            <span class="badge bg-warning">Future</span> - <span>{{ $futureDate->format('l, jS F Y') }}</span>
                        @else
                            <span class="badge bg-success">Available</span>
                        @endif
                    </td>

                    <!-- Display Days Off -->
                    <td>
                        @if (count($dayOff) > 0)
                            <ul class="list-unstyled">
                                @foreach ($dayOff as $day)
                                    <li><span class="badge bg-info">{{ $day }}</span></li>
                                @endforeach
                            </ul>
                        @else
                            <span class="badge bg-secondary">No Days Off</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('todolist') }}" class="btn btn-secondary mt-3">Back to List</a>
</div>

