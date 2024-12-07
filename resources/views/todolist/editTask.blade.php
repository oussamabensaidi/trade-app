<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit task</title>
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
<div class="container">
    <h1 align='center'>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M160-120v-170l527-526q12-12 27-18t30-6q16 0 30.5 6t25.5 18l56 56q12 11 18 25.5t6 30.5q0 15-6 30t-18 27L330-120H160Zm80-80h56l393-392-28-29-29-28-392 393v56Zm560-503-57-57 57 57Zm-139 82-29-28 57 57-28-29ZM560-120q74 0 137-37t63-103q0-36-19-62t-51-45l-59 59q23 10 36 22t13 26q0 23-36.5 41.5T560-200q-17 0-28.5 11.5T520-160q0 17 11.5 28.5T560-120ZM183-426l60-60q-20-8-31.5-16.5T200-520q0-12 18-24t76-37q88-38 117-69t29-70q0-55-44-87.5T280-840q-45 0-80.5 16T145-785q-11 13-9 29t15 26q13 11 29 9t27-13q14-14 31-20t42-6q41 0 60.5 12t19.5 28q0 14-17.5 25.5T262-654q-80 35-111 63.5T120-520q0 32 17 54.5t46 39.5Z"/>
        </svg>
        Edit Task
    </h1>

    <!-- Display Validation Errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('TaskUpdate',['id'=>$task->id]) }}" method="POST">
        @csrf
@method('PUT')
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{$task->name}}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{$task->description}}">
        </div>

       <!-- Level Inputs -->
       <div id="lvlarea" class="p-3 border rounded bg-light shadow-sm mb-3">
        @if ($task->level)
       
        @php 
        $levels = json_decode($task->level);
        @endphp
        @foreach ($levels as $lvl)
            
        <div class="row g-2 align-items-center mb-3">
            <div class="col-md-6">
                <label for="times" class="form-label fw-bold">Number of Times</label>
                <input type="number" name="times[]" class="form-control" placeholder="Enter number" value="{{$lvl[0]}}">
            </div>
            <div class="col-md-6">
                <label for="next_name" class="form-label fw-bold">Next Name</label>
                <input type="text" name="next_name[]" class="form-control" placeholder="Enter name" value="{{$lvl[1]}}">
            </div>
        </div>
        @endforeach
        @else 
        <div class="row g-2 align-items-center mb-3">
            <div class="col-md-6">
                <label for="times" class="form-label fw-bold">Number of Times</label>
                <input type="number" name="times[]" class="form-control" placeholder="Enter number" >
            </div>
            <div class="col-md-6">
                <label for="next_name" class="form-label fw-bold">Next Name</label>
                <input type="text" name="next_name[]" class="form-control" placeholder="Enter name" >
            </div>
        </div>
        @endif
        <div class="text-end">
            <button id="addlvl" type="button" class="btn btn-primary btn-sm">Add Level</button>
        </div>
    </div>
    
        <!-- Hidden Input for Final Level -->
<input type="hidden" id="level" name="level" value="{{$task->level}}">
<script>
    // Update the level field when any input is changed
document.querySelector('form').addEventListener('input', function () {
    // Gather all inputs with name="times[]" and name="next_name[]"
    const timesInputs = document.querySelectorAll('input[name="times[]"]');
    const nextNameInputs = document.querySelectorAll('input[name="next_name[]"]');

    // Combine all input values into a JSON array
    const levels = [];
    timesInputs.forEach((input, index) => {
        const times = input.value;
        const nextName = nextNameInputs[index]?.value || ""; // Handle potential mismatched inputs
        levels.push([times, nextName]);
    });

    // Update the hidden input with the JSON string
    document.getElementById('level').value = JSON.stringify(levels);
});

// Add new inputs when "Add lvl" is clicked
document.getElementById('addlvl').addEventListener('click', function () {
    // Create a new set of inputs
    const newFields = document.createElement('div');
    newFields.classList.add('new-level'); // Optional class for styling or identification

    newFields.innerHTML = `
         <div class="row g-2 align-items-center mb-3">
            <div class="col-md-6">
                <label for="times" class="form-label fw-bold">Number of Times</label>
                <input type="number" name="times[]" class="form-control" placeholder="Enter number">
            </div>
            <div class="col-md-6">
                <label for="next_name" class="form-label fw-bold">Next Name</label>
                <input type="text" name="next_name[]" class="form-control" placeholder="Enter name">
            </div>
        </div>
    `;

    // Append the new fields to the form
    document.getElementById('lvlarea').appendChild(newFields);
});

</script>


        <!-- Future Beginning -->
        <div class="mb-3">
            <label for="future_beginning" class="form-label">Future Beginning</label>
            <input type="date" id="future_beginning" name="future_beginning" class="form-control" value="{{$task->future_beginning}}">
        </div>

        <!-- Day Off -->
        <div class="mb-3">
        @php
        // List of all possible days
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
$old_days = json_decode($task->day_off);
    @endphp

    @foreach ($days as $day)
        <div class="form-check">
            <input 
                class="form-check-input" 
                type="checkbox" 
                name="day_off[]" 
                value="{{ $day }}" 
                id="dayOff{{ $day }}"
                {{ in_array($day, $old_days ?? []) ? 'checked' : '' }} 
            >
            <label class="form-check-label" for="dayOff{{ $day }}">{{ $day }}</label>
        </div>
    @endforeach
        </div>
        

        <!-- Motivation -->
        <div class="mb-3">
            <label for="motivation" class="form-label">Motivation</label>
            <input type="text" id="motivation" name="motivation" class="form-control" value="{{$task->motivation}}">
        </div>

        <button type="submit" class="btn btn-primary">Update This Task</button>
        <a href="{{ route('taskshow',['id'=>$task->id]) }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
