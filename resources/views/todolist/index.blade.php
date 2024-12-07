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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @php
    use Carbon\Carbon;
    $today = Carbon::now()->format('l'); // Get today's day name (e.g., 'Monday')
@endphp
    <div class="container mt-5">
        <table class="table table-bordered">
            <h2 class="mb-4" align='center'>Fill the to do List</h2>
            <div id="progress-container" style="
    position: fixed;
    top: 30px;
    right: 30px;
    padding: 5px 10px;
    background-color: #f8f9fa;
    color: #343a40;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    font-family: Arial, sans-serif;
    z-index: 9999;
">
    Progress rate: 
    <span id="progress-text" style="color: @if($average < 40) red @elseif($average < 60) orange @elseif($average < 80) green @elseif($average < 100) blue @else gold @endif;">
        0%
    </span> 
    <span id="emoji"></span>
</div>
            <div id="progress-container" style="
    position: fixed;
    top: 30px;
    left: 30px;
    padding: 5px 10px;
    background-color: #f8f9fa;
    color: #343a40;
    border: 1px solid #ced4da;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    font-size: 14px;
    font-family: Arial, sans-serif;
    z-index: 9999;
">
    time left for today: 
    <span id="progress-text" style="color:  rgb(0, 68, 255) ;">
        ( <span id="hoursLeft"></span> )
    </span> 
    <span id="emoji"></span>
</div>

<script>
    // Get the target value for the average percentage
    const average = {{ number_format($average, 2) }};
    const progressText = document.getElementById("progress-text");
    const emoji = document.getElementById("emoji");

    // Function to animate the counting
    let current = 0;
    let interval = setInterval(function() {
        if (current < average) {
            current++;
            progressText.textContent = current + "%";
        } else {
            clearInterval(interval);
            if (average < 40) {
                emoji.textContent = "😐"; 
            } else if (average < 60) {
                emoji.textContent = "🙂"; 
            } else if (average < 80) {
                emoji.textContent = "😎"; 
            } else if (average < 100) {
                emoji.textContent = "🎉"; 
            } else {
                emoji.textContent = "🔥"; 
            }
        }
    }, 10); // Adjust the speed of the counting effect (in milliseconds)
</script>

        
            <thead class="thead-dark">
                <tr>
                    <th>date</th>
                    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                    @foreach ($tasks as $task)
                    @if ($task->deleted == 0)
                    @php
        // Parse the `future_beginning` value as a Carbon instance
        $futureDate = $task->future_beginning ? Carbon::parse($task->future_beginning) : null;
        $taskdate = Carbon::now();

    @endphp

    @if ($futureDate && $taskdate->lt($futureDate)) 
        <!-- Skip the task if today's date is before the future date -->
        @continue
    @endif
                    @php 
                     $dayOff = json_decode($task->day_off); // Decode the JSON string into an array
        
        // If $dayOff is null, convert it to an empty array
        if (is_null($dayOff)) {
            $dayOff = [];
        }
                    @endphp
                    @if (!in_array($today, $dayOff))
                        
                    
                    <th>
                        <a href="{{ route('taskshow', ['id' => $task->id]) }}" data-bs-toggle="tooltip" data-bs-placement="top" title="{{$task->description ? $task->description : 'no description available'}}"> {{$task->name}}</a>
                        {{-- tootip section --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    
    <script>
        // Enable tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
        </script>

{{-- end tootip section its pointed in the names of task as (data-bs-toggle="tooltip" data-bs-placement="top" title="This is a tooltip!")  --}}
                    </th>
                    @endif          
                    @endif          
                    @endforeach

                    <th>result</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>



                <tr>
                    <form action="{{route('fill_todolist')}}" method="POST">
                        @csrf
                        @method('POST')
                    <td >
                        <input type="date" name="date" required>
                    </td>
                    @foreach ($tasks as $task)
                    @if ($task->deleted == 0)
                    @php
                    // Parse the `future_beginning` value as a Carbon instance
                    $futureDate = $task->future_beginning ? Carbon::parse($task->future_beginning) : null;
                    $taskdate = Carbon::now();
            
                @endphp
            
                @if ($futureDate && $taskdate->lt($futureDate)) 
                    <!-- Skip the task if today's date is before the future date -->
                    @continue
                @endif
                    @php 
                    $dayOff = json_decode($task->day_off); // Decode the JSON string into an array
       
       // If $dayOff is null, convert it to an empty array
       if (is_null($dayOff)) {
           $dayOff = [];
       }
                   @endphp
                    
                   @if (!in_array($today, $dayOff))
                  
    <td>
        <label for="">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"  fill="green"/></svg>
        </label>
        <input type="radio" name="task{{ $task->id }}" id="id{{ $task->id }}" value="yes">
        
        <label for="">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"fill="red"/></svg>
        </label>
        <input type="radio" name="task{{ $task->id }}" value="no">
        
    </td>  
    @endif
    @endif
    @endforeach
 
                   
                    <td id="result"></td>
                    <input type="hidden" name="resault" id="test1">
                    <input type="hidden" name="yes_tasks" id="yesTasks">
                    <td><button type="submit" class="btn btn-primary">submit the day</button></td>
                </form>
                </tr>




            </tbody>
        </table>
        <div class="container mt-5 p-4 border rounded shadow-sm bg-light">
            {{-- <form action="{{ route('taskinsert') }}" method="POST" onsubmit="return confirmAddTask();" class="p-4 border rounded shadow-sm bg-light">
                @csrf
                <div class="d-flex align-items-center mb-3">
                    <input type="text" name="name" id="taskName" class="form-control me-2" placeholder="Enter task name" required>
                    <button type="submit" class="btn btn-primary">Add Task</button>

                </div>
                
            </form> --}}
            <div class="d-flex align-items-start mb-3 flex-row grid gap-0 column-gap-3">
                <button type="button" class="btn btn-primary "> <a class="text-decoration-none text-light" href="{{route('createTask')}}">Create an advanced task</a></button>

                <button type="button" class="btn btn-primary "> <a class="text-decoration-none text-light" href="{{route('alltasks')}}">All the tasks</a></button>

                <button type="button" class="btn btn-primary "><a  class="text-decoration-none text-light"href="{{ route('history') }}">History</a></button>
            </div>
        </div>
        <script>



function calculateResult() {
    const yesTasks = [];
    let result = 0;
    const tasks = document.querySelectorAll('input[type="radio"]:checked'); // Get all checked radio buttons
    const totalTasks = document.querySelectorAll('input[type="radio"][name^="task"]').length / 2; // Count all radio buttons for tasks, assuming each task has 2 radio buttons (yes and no)
    
    tasks.forEach((task) => {
        if (task.value === 'yes') {
            yesTasks.push(task.id.replace('id', ''));
            result++;
        }
    });

    document.getElementById('yesTasks').value = JSON.stringify(yesTasks);

    document.getElementById('result').innerText = result + "/" + totalTasks;
    document.getElementById('test1').value = result + "/" + totalTasks;
}
    
// Attach event listeners to radio buttons
document.querySelectorAll('input[type="radio"]').forEach(radio => {
    radio.addEventListener('change', calculateResult);
})
calculateResult();





function confirmAddTask() {
    return confirm('Are you sure you want to add this task?');
}
function DeleteTask() {
    return confirm('Are you sure you want to delete this task?');
}
        </script>
    </div>
   <div class="container mt-4">
    <h2 class="mb-4">Recent 5 Days Data</h2>
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Date</th>
                <th>Resault</th>
            </tr>
        </thead>
        <tbody>  
            @foreach ($data as $item)
                <tr>
              
                
                <td>{{ Carbon::parse($item->date)->format('d F Y') }}</td>
                    <td>{{ $item->resault }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('history') }}" class="btn btn-primary fixed-bottom-btn">History</a>
    <script>
        function calculateHoursLeft() {
            // Get the current date and time
            const now = new Date();

            // Get the end of the day (midnight)
            const endOfDay = new Date(now.getFullYear(), now.getMonth(), now.getDate(), 23, 59, 59, 999);

            // Calculate the difference in milliseconds
            const difference = endOfDay - now;

            // Convert milliseconds to hours
            const hoursLeft = Math.floor(difference / (1000 * 60 * 60));
            const minutesLeft = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));

            // Display the result in the specified element
            document
            .getElementById('hoursLeft').innerText = hoursLeft + ' hours' + minutesLeft + 'Minutes';
        }
          document.addEventListener('DOMContentLoaded', function() {
            calculateHoursLeft();
        });
        setInterval(calculateTimeLeft, 60000);
    </script>
    <div class="container mt-5">
        <div class="row">
            <!-- Top 3 Tasks Floating Card -->
            <div class="col-12 col-md-4">
                <div class="card " style=" width: 18rem;">
                    <div class="card-header bg-primary text-white">
                        Top 3 Tasks
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($topTasks as $task)
                            <li class="list-group-item">
                                <a href="{{ route('taskshow', ['id' => $task->id]) }}" class="text-decoration-none text-primary">
                                    <strong>{{ $task->name }}</strong>
                                </a>
                                <p>Completed: {{ $task->perfect_done }} times</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
    
            <!-- Flop 3 Tasks Floating Card -->
            <div class="col-12 col-md-4">
                <div class="card " style=" background-color: #f8f9fa;">
                    <div class="card-header bg-danger text-white">
                        Flop 3 Tasks
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($flopTasks as $task)
                            <li class="list-group-item">
                                 <a href="{{ route('taskshow', ['id' => $task->id]) }}" class="text-decoration-none text-danger">
                                    <strong>{{ $task->name }}</strong>
                                </a>
                                <p>Completed: {{ $task->perfect_done }} times</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card " >
                    <div class="card-header bg-warning text-white">
                        Oldest 3 Tasks
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($oldestTasks as $task)
                            <li class="list-group-item">
                                 <a href="{{ route('taskshow', ['id' => $task->id]) }}" class="text-decoration-none text-warning">
                                    <strong>{{ $task->name }}</strong>
                                </a>
                                <p>Completed: {{ $task->perfect_done }} times</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>                                                                                             