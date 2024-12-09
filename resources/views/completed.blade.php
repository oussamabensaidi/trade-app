<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Analysis Data</title>
        <style>
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
        </style>
    </head>
<body>

    <div class="position-absolute top-0 end-0">
        <div class="toast" id="myToast" data-bs-autohide="false">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i>DO WEEK ANALYSIS !!</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" ></button>
        </div>
        <div class="toast-body">
           to do your weekend analysis <a href="{{route ('create')}}">Click here!</a>
        </div>
    </div></div>
    <div class="position-absolute top-0 end-0">
        <div class="toast" id="myToast2" data-bs-autohide="false">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i>complete the position</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" ></button>
        </div>
        <div class="toast-body">
           complete the previous analysis  !
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
    <h1>
        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M268-240 42-466l57-56 170 170 56 56-57 56Zm226 0L268-466l56-57 170 170 368-368 56 57-424 424Zm0-226-57-56 198-198 57 56-198 198Z"/></svg>
        completed position</h1>
    <table>
        <thead>
            <tr>
                <th>Ticker Name</th>
                <th>analysis date</th>
                <th>picture</th>
                <th>post picture</th>
                <th>predicted resault </th>
                <th>actuel resault </th>
            </tr>
        </thead>
        <tbody>
            @php
            $lastDate = null;
        @endphp
{{-- <tr style="background-color: #f0f0f0;">
    <td colspan="5" style="text-align: center; font-weight: bold;">
        Sunday, {{ \Carbon\Carbon::now()->next(\Carbon\Carbon::SUNDAY)->format('F j, Y') }}
    </td>
</tr> --}}
            @foreach ($analysis as $item)
            
            @if ($item->succses!=null)
            
                <tr>
                    @php
                    $date = \Carbon\Carbon::parse($item->created_at);
                @endphp
        @if ($date->isSaturday() && $date->format('F j, Y') !== $lastDate)
        <tr style="background-color: #f0f0f0;">
            <td colspan="5" style="text-align: center; font-weight: bold;">Sunday, {{ $date->format('F j, Y') }}</td>
        </tr>
        @php
            $lastDate = $date->format('F j, Y'); // Update the last date
        @endphp
        @elseif($date->isSunday() && $date->format('F j, Y') !== $lastDate)
            <tr style="background-color: #f0f0f0;">
                        <td colspan="5" style="text-align: center; font-weight: bold;">Saturday, {{ $date->format('F j, Y') }}</td>
                    </tr>
                    @php
                        $lastDate = $date->format('F j, Y'); // Update the last date
                    @endphp
        @elseif($date->isMonday() && $date->format('F j, Y') !== $lastDate)
            <tr style="background-color: #f0f0f0;">
                        <td colspan="5" style="text-align: center; font-weight: bold;">Monday, {{ $date->format('F j, Y') }}</td>
                    </tr>
                    @php
                        $lastDate = $date->format('F j, Y'); // Update the last date
                    @endphp
        @endif
                    <td><a href="{{ route('show', $item->id) }}" class="text-decoration-none">{{ $item->ticker_name }}</a></td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                        <path d="m612-292 56-56-148-148v-184h-80v216l172 172ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-400Zm0 320q133 0 226.5-93.5T800-480q0-133-93.5-226.5T480-800q-133 0-226.5 93.5T160-480q0 133 93.5 226.5T480-160Z" fill="#7BBEFE"/></svg>
                       <a href="{{ route('show', $item->id) }}" class="text-decoration-none">{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y \a\t g:i A') }}</a> 
                    </td>
                    
                    
                    <td>
                        <a href="{{ asset($item->picture) }}" target="_blank">
                            <img src="{{ asset($item->picture) }}" alt="" width="100px">
                        </a>
                    </td>
                    <td><a href="{{ asset($item->post_picture) }}" target="_blank">
                        <img src="{{ asset($item->post_picture) }}" alt="" width="100px">
                    </a></td>

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




<td @if ($item->succses == 'VALIDE') style="background-color: green;"
    
@elseif($item->succses == 'failed')
style="background-color: red;"
@endif>
    {{ $item->succses }}<br>
    {{ $item->profit }}$<br>
{{-- <a class="btn btn-outline-primary" href="{{ route('show', $item->id) }}" style="color: white; text-decoration: none; background-color: #007bff; padding: 10px 20px; border-radius: 5px; display: inline-block;">See more details</a> --}}
<a class="btn btn-outline-primary" href=" {{route('updateAll',$item->id) }} " style="color: white; text-decoration: none; background-color: #007bff; padding: 10px 20px; border-radius: 5px; display: inline-block;">update All elements</a> 
</td>
                </tr>
                
    
   
           


                @endif
            @endforeach
        </tbody>
    </table>
    <button><a href="{{route('index')}}">index</a></button>
</body>
</html>