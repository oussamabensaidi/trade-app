<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <title>Analysis Data</title>
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            margin: 10px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
  font-family: "New Amsterdam", sans-serif;
  font-weight: 400;
  font-style: unset;
}

.highlight {
    font-weight: bold;
    color: #ff9900; /* Or any color you prefer */
    background-color: #fff4e5; /* Light background to highlight */
}
    </style>
</head>
<body>
    <div class="center-container">
        <h1 class="new-amsterdam-regular">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFD700"> <!-- Gold color -->
                <path d="M400-320q100 0 170-70t70-170q0-100-70-170t-170-70q-100 0-170 70t-70 170q0 100 70 170t170 70Zm-40-120v-280h80v280h-80Zm-140 0v-200h80v200h-80Zm280 0v-160h80v160h-80ZM824-80 597-307q-41 32-91 49.5T400-240q-134 0-227-93T80-560q0-134 93-227t227-93q134 0 227 93t93 227q0 56-17.5 106T653-363l227 227-56 56Z"/>
            </svg>
            Analysis Data
        </h1>
    </div>
    {{-- @if(session('success'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="toast-success" class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var toastEl = document.getElementById('toast-success');
        var toast = new bootstrap.Toast(toastEl);
        toast.show();
    });
</script>

    <div class="position-absolute top-0 end-0">
    <div class="toast" id="myToast" data-bs-autohide="true">
    <div class="toast-header">
        <strong class="me-auto"><i class="bi-gift-fill"></i>DO WEEK ANALYSIS !!</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" ></button>
    </div>
    <div class="toast-body">
       to do your weekend analysis <a href="{{route ('create')}}">Click here!</a>
    </div>
</div></div>
<div class="position-absolute top-0 end-0">
    <div class="toast" id="myToast2" data-bs-autohide="true">
    <div class="toast-header">
        <strong class="me-auto"><i class="bi-gift-fill"></i>complete the position</strong>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" ></button>
    </div>
    <div class="toast-body">
       To complete the previous analysis  <a href="{{route ('completed')}}">Click here!</a>
    </div>
    </div>
</div> 
      
</div>
    <script>
        document.addEventListener("DOMContentLoaded", function(){
            let element = document.getElementById("myToast");
            let element2 = document.getElementById("myToast2");
        
            const now = new Date();
            const day = now.getDay();
if(day == 0 || day == 6 ){
    let myToast = new bootstrap.Toast(element);
        
                myToast.show(); 
}else{
    let myToast = new bootstrap.Toast(element2);
        
        myToast.show();
}
        });
        </script>
 --}}

<div class="center-container">
    <a class=" btn btn-outline-primary" href="{{route ('create')}}" >create week analysis</a>  
</div>
    <table>
        <thead>
            <tr>
                <th>Ticker Name</th>
                
                <th>Picture</th>
                <th>Result</th>
                <th>Major notes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($analysis as $item)


@if ($item->succses===null)

        <tr>
            <td>{{ $item->asset?->name ?? 'No Asset' }}</td>
            
            
            <td>
            <a href="{{ asset($item->picture) }}" target="_blank">
            <img src="{{ asset($item->picture) }}" alt="" width="100px">
            </a>
            </td>
            <td>
                <span class="result" id="result-{{ $item->id }}">
                    {{$item->result}}
                </span>
            </td>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
    // Get all result elements
    const results = document.querySelectorAll('.result');

    results.forEach(result => {
        // Get the text content of the result
        const resultText = result.textContent.trim();

        // Split the result into parts
        const [up, down, no] = resultText.split('---').map(part => part.trim());

        // Extract the counts
        const upCount = up.split(':')[1].trim();
        const downCount = down.split(':')[1].trim();
        const noCount = no.split(':')[1].trim();

        // Create spans for each part with icons
        const upSpan = document.createElement('span');
        upSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#00ff00">
    <path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/>
</svg>
 ${upCount} |`; // Up arrow icon

        const downSpan = document.createElement('span');
        downSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff0000">
    <path d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"/>
</svg>
 ${downCount} |`; // Down arrow icon

        const noSpan = document.createElement('span');
        noSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#007bff">
    <path d="M280-440h400v-80H280v80ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
</svg>
 ${noCount} .`; // Dash icon

        // Clear the original content and append styled parts
        result.innerHTML = '';
        result.appendChild(upSpan);
        result.appendChild(document.createTextNode(' ')); // Space between the parts
        result.appendChild(downSpan);
        result.appendChild(document.createTextNode(' ')); // Space between the parts
        result.appendChild(noSpan);
    });
});

            </script>
            <td>
                {{$item->major_notes}}
            </td>
            <td>
            <a class="btn btn-outline-primary" href="{{route('complete',$item->id)}}">complete</a> 
            <a class="btn btn-outline-primary" href=" {{route('show',$item->id) }} " >see</a> 
            <a class="btn btn-outline-primary" href=" {{route('updateAll',$item->id) }} " >update All elements</a> 
            <a class="btn btn-outline-primary" href=" {{route('create_quickPosition',$item->id) }} " >create quick Position</a> 
            
        </td>
                </tr>
                @endif
            @endforeach
        </tbody>
        

    </table>
    <div class="center-container">
    <a class=" btn btn-outline-primary" href="{{route ('completed')}}" >See Completed position </a>  
    </div>
    <div class="center-container">
        <h1 class="new-amsterdam-regular">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path fill='#007bff' d="m216-160-56-56 384-384H440v80h-80v-160h233q16 0 31 6t26 17l120 119q27 27 66 42t84 16v80q-62 0-112.5-19T718-476l-40-42-88 88 90 90-262 151-40-69 172-99-68-68-266 265Zm-96-280v-80h200v80H120ZM40-560v-80h200v80H40Zm739-80q-33 0-57-23.5T698-720q0-33 24-56.5t57-23.5q33 0 57 23.5t24 56.5q0 33-24 56.5T779-640Zm-659-40v-80h200v80H120Z"/></svg>
            Quick Position Data
        </h1>
    </div>
    <table>
        <thead>
            <tr>
                <th>Ticker Name</th>
                
                <th>oppperation</th>
                <th>why ?</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($quick as $q)
            @if ($q->result===null)
            <tr>
                <td>{{ $q->asset->name }}</td>
                <td style="color: 
                @if($q->operation == 'Buy') 
                    green 
                @elseif($q->operation == 'Sell') 
                    red 
                @else 
                    blue 
                @endif;"> {{ $q->operation }}
            </td> 
                <td>{{ $q->why_before }}</td>
                <td><a class="btn btn-outline-primary" href="{{route('show',$q->trade_id)}}">check parent analysis</a>
                <a class="btn btn-outline-primary" href="{{route('showquick',$q->id)}}">see</a>
                <a class="btn btn-outline-primary" href="{{route('complete_quick_page',$q->id)}}">complete</a>
                <a class="btn btn-outline-primary" href="{{route('livenotes_page',$q->id)}}">Live Notes</a>
                <form action="{{ route('destroy', $q->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?');">
                    @method('DELETE')
                    @csrf
                    <button   type="submit" class="btn btn-outline-danger">Delete</button>
                </form>

            </td>
            </tr>  
            @endif
            @endforeach  
    </table>
    <div class="center-container">
        <a class=" btn btn-outline-primary" href="{{route ('indexQuick')}}" >See Completed Quick position </a>  
    </div>
    <div class="center-container">
        <a href="{{ route('asset.index') }}" class="btn btn-outline-primary">Asset Side</a>
    </div>
</body>
</html>
