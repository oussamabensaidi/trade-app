<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create task</title>
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
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q65 0 123 19t107 53l-58 59q-38-24-81-37.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160q32 0 62-6t58-17l60 61q-41 20-86 31t-94 11Zm280-80v-120H640v-80h120v-120h80v120h120v80H840v120h-80ZM424-296 254-466l56-56 114 114 400-401 56 56-456 457Z"/></svg>       
        Create New Task</h1>

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

    <form action="{{ route('TaskCreation') }}" method="POST">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" >
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" id="description" name="description" class="form-control" value="{{ old('description') }}">
        </div>

       <!-- Level Inputs -->
       <div id="lvlarea" class="p-3 border rounded bg-light shadow-sm mb-3">
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
        <div class="text-end">
            <button id="addlvl" type="button" class="btn btn-primary btn-sm">Add Level</button>
        </div>
    </div>
    
        <!-- Hidden Input for Final Level -->
<input type="hidden" id="level" name="level">
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
            <input type="date" id="future_beginning" name="future_beginning" class="form-control" value="{{ old('future_beginning') }}">
        </div>

        <!-- Day Off -->
        <div class="mb-3">
            <label for="day_off" class="form-label fw-bold">Day Off</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Monday" id="dayOffMonday">
                <label class="form-check-label" for="dayOffMonday">Monday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Tuesday" id="dayOffTuesday">
                <label class="form-check-label" for="dayOffTuesday">Tuesday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Wednesday" id="dayOffWednesday">
                <label class="form-check-label" for="dayOffWednesday">Wednesday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Thursday" id="dayOffThursday">
                <label class="form-check-label" for="dayOffThursday">Thursday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Friday" id="dayOffFriday">
                <label class="form-check-label" for="dayOffFriday">Friday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Saturday" id="dayOffSaturday">
                <label class="form-check-label" for="dayOffSaturday">Saturday</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="day_off[]" value="Sunday" id="dayOffSunday">
                <label class="form-check-label" for="dayOffSunday">Sunday</label>
            </div>
        </div>
        

        <!-- Motivation -->
        <div class="mb-3">
            <label for="motivation" class="form-label">Motivation</label>
            <input type="text" id="motivation" name="motivation" class="form-control" value="{{ old('motivation') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
        <a href="{{ route('todolist') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
