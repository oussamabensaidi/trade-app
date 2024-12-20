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
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
            width: 100%;
        }
        .grid-container > div {
            padding: 10px;
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
        }
        .grid-container > div:nth-child(odd) {
            font-weight: bold;
        }
        .grid-container img {
            max-width: 100%;
            height: auto;
        }
        body {
  font-family: "New Amsterdam", sans-serif;
  font-weight: 400;
  font-style: unset;
}
    </style>
</head>
<body>

<div class="container my-4">
    <h1 class="mb-4">Position Details</h1>
    <div class="grid-container">
        <div>Ticker Name</div>
        <div>{{ $trade->ticker_name }}</div>
        
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
${upCount} `; // Up arrow icon

    const downSpan = document.createElement('span');
    downSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff0000">
<path d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"/>
</svg>
${downCount} `; // Down arrow icon

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
      
        
        <div>DOW Day</div>
        <div>{{ $trade->dow_day }}<br>note: 
            <span style="color: {{ $trade->dow_day === 'up' ? 'green' : ($trade->dow_day === 'down' ? 'red' : 'blue') }}">
                {{ $trade->dow_day_note ?? 'null' }}
            </span>
        </div>
        
        <div>DOW 4H</div>
        <div>{{ $trade->dow_4h }}<br>note: 
            <span style="color: {{ $trade->dow_4h === 'up' ? 'green' : ($trade->dow_4h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->dow_4h_note ?? 'null' }}
            </span>
        </div>
        <div>DOW 1h</div>
        <div>{{ $trade->dow_1h }}<br>note: 
            <span style="color: {{ $trade->dow_1h === 'up' ? 'green' : ($trade->dow_1h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->dow_1h_note ?? 'null' }}
            </span>
        </div>
       
        
        <div>Moving Average Day</div>
        <div>{{ $trade->moving_average_day }}<br>note: 
            <span style="color: {{ $trade->moving_average_day === 'up' ? 'green' : ($trade->moving_average_day === 'down' ? 'red' : 'blue') }}">
                {{ $trade->moving_average_day_note ?? 'null' }}
            </span>
        </div>
        
        <div>Moving Average 4H</div>
        <div>{{ $trade->moving_average_4h }}<br>note: 
            <span style="color: {{ $trade->moving_average_4h === 'up' ? 'green' : ($trade->moving_average_4h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->moving_average_4h_note ?? 'null' }}
            </span>
        </div>
        <div>Moving Average 1h</div>
        <div>{{ $trade->moving_average_1h }}<br>note: 
            <span style="color: {{ $trade->moving_average_1h === 'up' ? 'green' : ($trade->moving_average_1h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->moving_average_1h_note ?? 'null' }}
            </span>
        </div>
       
        
        <div>MACD Day</div>
        <div>{{ $trade->macd_day }}<br>note: 
            <span style="color: {{ $trade->macd_day === 'up' ? 'green' : ($trade->macd_day === 'down' ? 'red' : 'blue') }}">
                {{ $trade->macd_day_note ?? 'null' }}
            </span>
        </div>
        
        <div>MACD 4H</div>
        <div>{{ $trade->macd_4h }}<br>note: 
            <span style="color: {{ $trade->macd_4h === 'up' ? 'green' : ($trade->macd_4h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->macd_4h_note ?? 'null' }}
            </span>
        </div>
        <div>MACD 1h</div>
        <div>{{ $trade->macd_1h }}<br>note: 
            <span style="color: {{ $trade->macd_1h === 'up' ? 'green' : ($trade->macd_1h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->macd_1h_note ?? 'null' }}
            </span>
        </div>
       
        
        <div>RSI Day</div>
        <div>{{ $trade->rsi_day }}<br>note: 
            <span style="color: {{ $trade->rsi_day === 'up' ? 'green' : ($trade->rsi_day === 'down' ? 'red' : 'blue') }}">
                {{ $trade->rsi_day_note ?? 'null' }}
            </span>
        </div>
        
        <div>RSI 4H</div>
        <div>{{ $trade->rsi_4h }}<br>note: 
            <span style="color: {{ $trade->rsi_4h === 'up' ? 'green' : ($trade->rsi_4h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->rsi_4h_note ?? 'null' }}
            </span>
        </div>
        
        <div>RSI 1h</div>
        <div>{{ $trade->rsi_1h }}<br>note: 
            <span style="color: {{ $trade->rsi_1h === 'up' ? 'green' : ($trade->rsi_1h === 'down' ? 'red' : 'blue') }}">
                {{ $trade->rsi_1h_note ?? 'null' }}
            </span>
        </div>
        <div>Fibonacci</div>
        <div>{{ $trade->fibo }}<br>note: 
            <span style="color: {{ $trade->fibo === 'up' ? 'green' : ($trade->fibo === 'down' ? 'red' : 'blue') }}">
                {{ $trade->fibo_note ?? 'null' }}
            </span>
        </div>
        
        <div>Gann</div>
        <div>{{ $trade->gann }}<br>note: 
            <span style="color: {{ $trade->gann === 'up' ? 'green' : ($trade->gann === 'down' ? 'red' : 'blue') }}">
                {{ $trade->gann_note ?? 'null' }}
            </span>
        </div>
        <div>Result</div>
        <div><h1><span class="result" id="result-{{ $trade->id }}">
            {{$trade->result}}
        </span></h1></div>



        <div>Picture</div>
        <div>
            <a href="{{ asset($trade->picture) }}" target="_blank">
                <img src="{{ asset($trade->picture) }}" alt="Trade Picture">
            </a>
        </div>
        <div>Post Picture</div>
@if ($trade->post_picture == null)
<a class="btn btn-outline-primary" href="{{route('complete',$trade->id)}}" style="color: white; text-decoration: none; background-color: #007bff; padding: 10px 20px; border-radius: 5px; display: inline-block;">click to complete</a> 
@else
<div>
            <a href="{{ asset($trade->post_picture) }}" target="_blank">
                <img src="{{ asset($trade->post_picture) }}" alt="Post Trade Picture">
            </a>
        </div>
@endif 
<div>Major notes</div>

    <div>{{ $trade->major_notes ?? 'null'}}</div>

    <div>Success</div>
    @if ($trade->succses == null)
        <a class="btn btn-outline-primary" href="{{ route('complete', $trade->id) }}" 
           style="color: white; text-decoration: none; background-color: #007bff; padding: 10px 20px; border-radius: 5px; display: inline-block;">
           click to complete
        </a>
    @else
        @php
            // Mapping success values to full names and colors
            $statusMapping = [
                'VALIDE' => ['label' => 'Valid', 'color' => 'green'],
                'closev' => ['label' => 'Close But Valid', 'color' => 'yellow'],
                'failed' => ['label' => 'Fail', 'color' => 'red'],
                'closeF' => ['label' => 'Close But Fail', 'color' => 'orange'],
            ];
    
            $status = $statusMapping[$trade->succses] ?? null;
        @endphp
    
        @if ($status)
            <div style="color: {{ $status['color'] }};">{{ $status['label'] }}</div>
        @else
            <div>{{ $trade->succses }}</div>
        @endif
    @endif
    


        <div>Profit</div>
        @if ($trade->profit == null)
        <a class="btn btn-outline-primary" href="{{route('complete',$trade->id)}}" style="color: white; text-decoration: none; background-color: #007bff; padding: 10px 20px; border-radius: 5px; display: inline-block;">click to complete</a> 
@else
        <div>{{ $trade->profit }}$</div>
        @endif
        <div>Created At</div>
        <div>{{ $trade->created_at }}</div>
        <div>Post Notes</div>
        <div>{{ $trade->post_notes }}</div>
    </div>
    <a href="{{ route('index') }}" class="btn btn-outline-primary mt-4">Back</a>
</div>

</body>
</html>
