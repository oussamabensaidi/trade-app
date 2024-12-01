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
    <div class="container mt-5">
        <table class="table table-bordered">
            <h2 class="mb-4">fill the to do list ( <span id="hoursLeft"></span> )</h2>
            <span style="
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
                    progress rate: <span style="color: 
                @if($average < 40) red 
                @elseif($average < 60) orange 
                @elseif($average < 80) green 
                @elseif($average < 100) blue 
                @else gold 
                @endif;">
                        {{ number_format($average, 2) }}%
                    </span> 
      
        </span>
        
            <thead class="thead-dark">
                <tr>
                    <th>date</th>
                    @foreach ($tasks as $task)
                    <th>
                        {{$task->name}}
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;" onsubmit="return DeleteTask();">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="blue"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                </svg>
                            </button>
                        </form>
                    </th>
                        
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
    <td>
        <label for="">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m424-296 282-282-56-56-226 226-114-114-56 56 170 170Zm56 216q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"  fill="green"/></svg>
        </label>
        <input type="radio" name="task{{ $task->id }}" value="yes">
        
        <label for="">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q54 0 104-17.5t92-50.5L228-676q-33 42-50.5 92T160-480q0 134 93 227t227 93Zm252-124q33-42 50.5-92T800-480q0-134-93-227t-227-93q-54 0-104 17.5T284-732l448 448Z"fill="red"/></svg>
        </label>
        <input type="radio" name="task{{ $task->id }}" value="no">
        
    </td>  
    @endforeach

                   
                    <td id="result"></td>
                    <input type="hidden" name="resault" id="test1">
                    <td><button type="submit">submit the day</button></td>
                </form>
                </tr>




            </tbody>
        </table>
        <div class="container mt-5">
            <form action="{{ route('taskinsert') }}" method="POST" onsubmit="return confirmAddTask();" class="p-4 border rounded shadow-sm bg-light">
                @csrf
                <div class="d-flex align-items-center mb-3">
                    <input type="text" name="name" id="taskName" class="form-control me-2" placeholder="Enter task name" required>
                    <button type="submit" class="btn btn-primary">Add Task</button>
                </div>
            </form>
        </div>
        
        <script>
        function confirmAddTask() {
            return confirm('Are you sure you want to add this task?');
        }
        function DeleteTask() {
            return confirm('Are you sure you want to delete this task?');
        }
        </script>
    </div>
    
    <script>
        function calculateResult() {
    let result = 0;
    const tasks = document.querySelectorAll('input[type="radio"]:checked'); // Get all checked radio buttons
    const totalTasks = document.querySelectorAll('input[type="radio"][name^="task"]').length / 2; // Count all radio buttons for tasks, assuming each task has 2 radio buttons (yes and no)
    
    tasks.forEach((task) => {
        if (task.value === 'yes') {
            result++;
        }
    });

    document.getElementById('result').innerText = result + "/" + totalTasks;
    document.getElementById('test1').value = result + "/" + totalTasks;
}
    
        // Attach event listeners to radio buttons
        document.querySelectorAll('input[type="radio"]').forEach(radio => {
            radio.addEventListener('change', calculateResult);
        })
        calculateResult();
    </script>
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
               @php
                    use Carbon\Carbon;
                @endphp
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
</div>
</body>
</html>