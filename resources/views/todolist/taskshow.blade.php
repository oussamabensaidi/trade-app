<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>task show</title>
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
    <div class="container mt-4">
        <h2 class="mb-4">Task Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Task: {{ $task->id }}</h5>
                
                <table class="table table-bordered">
                    @if ($task->deleted == 1)
                    <tr>
                        <th>deleted</th>
                        <td><span class="badge bg-warning">this task is archeived </span></td>
                    
                    <tr>
                    @endif
                    <tr>
                        <th>Name</th>
                        <td>{{ $task->name ?? 'No name' }}</td>
                    
                    <tr>
                    <tbody>
                        <tr>
                            <th>Motivation</th>
                            <td>{{ $task->motivation ?? 'Not Provided' }}</td>
                        </tr>
                        <tr>
                            <th>Done Counter</th>
                            <td>{{ $task->donecounter }}</td>
                        
                        <tr>
                            <th>Day Off</th>
                            <td>{{ $task->day_off ?? 'Not Specified' }}</td>
                        </tr>
                        @if ($task->level)
                        @php
                                $levels = json_decode($task->level, true); // Decode JSON to array
                                $levelcount = 1
                        @endphp
                        @foreach ($levels as $item)
                        <tr rowspan="2">
                            <th rowspan="2">Level {{$levelcount ++}}</th>
                            <td> must do time :
                                


                            @if( !empty($levels ) && is_array($levels))
                                
                                    <span class="badge bg-info">{{$item[0] }}</span>
                                
                            @else
                                N/A 
                            @endif
                            </td>

                        </tr>
                        <tr>
                            <td>next name :
                                @if( !empty($levels ) && is_array($levels))
                                
                                    <span class="badge bg-info">{{$item[1] }}</span>
                                
                            @else
                                N/A 
                            @endif
                            </td>
                        </tr>
                        @endforeach
                            
                        @else
                        <tr>
                            <th>level </th>
                            <td>no level</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
<div class="d-flex justify-content-between">
    <span>
        <a href="{{ route('todolist') }}" class="btn btn-secondary mt-3">Back to List</a>
        <a href="{{ route('editTask',['id'=>$task->id])}}" class="btn btn-primary mt-3">Edit Task</a>
    </span>
    <span>
        @if ($task->deleted == 0)
<form action="{{ route('archeivefunc', $task->id) }}" method="POST" style="display:inline;" onsubmit="return DeleteTask();">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-warning mt-3">
                archeive this task
            </button>
        </form>
        @else
        <form action="{{ route('archeivefunc', $task->id) }}" method="POST" style="display:inline;" onsubmit="return PUTTask();">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-success mt-3">
                Get back this task
            </button>
        </form>
        @endif
        
        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return DeleteTask();">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mt-3">
                delete this task for ever
            </button>
        </form>
    </span>
</div>

<script>
    function DeleteTask() {
            return confirm('Are you sure you want to delete this task?');
        }
</script>
            </div>
        </div>
    </div> 
    
</body>