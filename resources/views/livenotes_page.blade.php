<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LiveNotes</title>
    
    
</head>
<body  >
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="card" style="width: 100%; max-width: 600px;">
        <div class="card-body">

<form action="{{ route('livenotes', ['id' => $quickPosition->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Asset Name -->
    <div class="mb-3">
        <label for="assetName" class="form-label">Asset Name</label>
        <p class="form-control-plaintext text-primary" id="assetName">{{ old('assetName', $quickPosition->asset->name) }}</p>
    </div>
    
    <!-- Operation -->
    <div class="mb-3">
        <label for="operation" class="form-label">Operation</label>
        <p class="form-control-plaintext text-primary" id="operation">{{ old('operation', $quickPosition->operation) }}</p>
    </div>
    <div class="mb-3">
        <label for="operation" class="form-label">Previous Live Notes</label>
        @php
            $livenotes = json_decode($quickPosition->livenotes);
        @endphp

@if (!empty($livenotes))
@foreach ($livenotes as $item)
    <div class="d-flex justify-content-between">
        <span class="form-control-plaintext text-secondary">
           Note: {{ $item->notes ?? 'No previous live note' }}.
        </span>
        <span class="form-control-plaintext text-{{ $item->status == 'good' ? 'success' : ($item->status == 'bad' ? 'danger' : 'primary') }}">
            Status: {{ $item->status ?? 'No previous status' }}
        </span>
    </div>
@endforeach
@else
<p class="form-control-plaintext text-primary">No live notes available.</p>
@endif

    </div>
    
    <!-- Why Before -->
    <div class="mb-3">
        <label for="why_before" class="form-label">Why Before</label>
        <p class="form-control-plaintext text-primary" id="why_before">{{ old('why_before', $quickPosition->why_before) }}</p>
    </div>
    

    <!-- Live Notes -->
    <div class="mb-3">
        <label for="livenotes" class="form-label">Live Notes</label>
        <textarea class="form-control" name="fakelivenotes" id="livenotes" cols="30" rows="5"></textarea>
    </div>
    
    <!-- Hidden input to store live notes as JSON -->
    <input type="hidden" name="livenotes" id="live_notes_json" value="{{$quickPosition->livenotes}}">

    <!-- Status Radio Buttons -->
    <div class="mb-3">
        <label class="form-label">Status</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="statusGood" value="good" {{ old('status', $quickPosition->status) == 'good' ? 'checked' : '' }}>
            <label class="form-check-label" for="statusGood">
                Good
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="statusBad" value="bad" {{ old('status', $quickPosition->status) == 'bad' ? 'checked' : '' }}>
            <label class="form-check-label" for="statusBad">
                Bad
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="status" id="statusNotClear" value="not_clear" {{ old('status', $quickPosition->status) == 'not_clear' ? 'checked' : '' }}>
            <label class="form-check-label" for="statusNotClear">
                Not Clear
            </label>
        </div>
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn btn-primary">Update Live Notes</button>
</form>
<a class="btn btn-outline-primary" href="{{route('complete_quick_page',$quickPosition->id)}}">complete</a>
<a class="btn btn-outline-primary" href="{{route('index')}}">return to list</a>
</div>
</div>
</div>

<script>
    // Ensure that the form submits the live notes as JSON
    document.querySelector('form').addEventListener('submit', function(event) {
    const liveNotes = document.getElementById('livenotes').value;
    const selectedStatus = document.querySelector('input[name="status"]:checked').value;

    // Retrieve the current value of the hidden input and parse it as JSON or initialize as an empty array
    let oldData = document.getElementById('live_notes_json').value;
    let arr = oldData ? JSON.parse(oldData) : []; // Parse old data if it exists

    // Create a new object for the current live notes
    const liveNotesData = {
        notes: liveNotes,
        status: selectedStatus,
    };

    // Push the new object to the array
    arr.push(liveNotesData);

    // Convert the updated array back to JSON and set it to the hidden input
    document.getElementById('live_notes_json').value = JSON.stringify(arr);
});

</script>




</body>
</html>