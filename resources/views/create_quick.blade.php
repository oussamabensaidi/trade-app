<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Quick position</title>  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <title>Create quick position </title>
</head>
<body>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td, th {
            padding: 10px;
            border: 1px solid #ddd;
        }
        tr.white {
            background-color: #fff;
        }
        tr.black {
            background-color: #000;
            color: #fff;
        }
        input[type="radio"] {
            margin-right: 5px;
        }
        .result {
            text-align: center;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        body {
  font-family: "New Amsterdam", sans-serif;
  font-weight: 400;
  font-style: unset;
}
    </style>
</head>
<body>
    <h1>create a quick position </h1>
    <form class="form-container" action="{{ route('inserquickposition') }}" method="POST" enctype="multipart/form-data">
        @method('POST')
        @csrf
        <table>
            
            <tr>
                <td><label for="ticker_name">Ticker Name:</label></td>
                <td>
                    {{  $trade->asset->name }}
                
                </td>
                <input type="hidden" name="trade_id" value="{{ $trade->id }}">
            </tr>
            <tr>
                <td><span class="result" id="result-1">RESULT :</span></td>
                <td>
                    {{  $trade->result }}
                
                </td>
            </tr>
            <script>
document.addEventListener('DOMContentLoaded', function () {
    const results = document.querySelectorAll('.result');

    results.forEach(result => {
        const resultText = result.textContent.trim();
        console.log(resultText); // Debugging

        // Ensure the format is valid
        if (!resultText.includes('---')) {
            console.error('Invalid format:', resultText);
            return;
        }

        // Split the result into parts
        const [up, down, no] = resultText.split('---').map(part => part.trim());

        // Extract the counts before the `/`
        const upCount = up.split(':')[1].split('/')[0].trim();
        const downCount = down.split(':')[1].split('/')[0].trim();
        const noCount = no.split(':')[1].split('/')[0].trim();

        // Create spans for each part with icons
        const upSpan = document.createElement('span');
        upSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#00ff00">
            <path d="m136-240-56-56 296-298 160 160 208-206H640v-80h240v240h-80v-104L536-320 376-480 136-240Z"/>
        </svg> ${upCount} |`;

        const downSpan = document.createElement('span');
        downSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#ff0000">
            <path d="M640-240v-80h104L536-526 376-366 80-664l56-56 240 240 160-160 264 264v-104h80v240H640Z"/>
        </svg> ${downCount} |`;

        const noSpan = document.createElement('span');
        noSpan.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#007bff">
            <path d="M280-440h400v-80H280v80ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/>
        </svg> ${noCount}`;

        // Clear the original content and append styled parts
        result.innerHTML = '';
        result.appendChild(upSpan);
        result.appendChild(document.createTextNode(' '));
        result.appendChild(downSpan);
        result.appendChild(document.createTextNode(' '));
        result.appendChild(noSpan);
    });
});

            </script>
            <tr>
                <td><label for="operation_type">Operation type:</label></td>
                <td>
                    <input type="radio" id="buy" name="operation" value="Buy" required>
                    <label for="buy">Buy</label>

                    <input type="radio" id="sell" name="operation" value="Sell" required>
                    <label for="sell">Sell</label>

                    <input type="radio" id="idk" name="operation" value="idk" required>
                    <label for="idk">idk</label>
                </td>
            </tr>
          

            
                <tr>
                    <td><label for="why_before">Why Before</label></td>
                    <td><input type="text" name="why_before"></td>
                </tr>
                <tr>
                    <td><label for="entryprice">Entry Price</label></td>
                    <td><input type="integer" name="entryprice"></td>
                </tr>
                <tr>
                    <td><label for="target">Target Price</label></td>
                    <td><input type="text" name="target"></td>
                </tr>
            <tr>
                <td colspan="2" class="result">
                    <button type="submit">Submit</button>
                </td>
            </tr>
            <tr><td colspan="2">
                @foreach ($money as $m)
                    
                <div style="padding: 15px; border: 3px solid #4CAF50; border-radius: 12px; background: linear-gradient(to right, #f9f9f9, #e8f5e9); color: #333; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h4 style="color: #388E3C; font-weight: bold; font-family: 'Arial', sans-serif;">📈 Strategy Rules</h4>
                    <p style="font-size: 16px; line-height: 1.6; font-family: 'Arial', sans-serif;">
                        Strategy <span style="color: #1976D2; font-weight: bold;">#{{ $m->id }}</span> is operating with a risk level of 
                        <span style="color: #FB8C00; font-weight: bold;">{{ $m->risk_percentage }}%</span> of the current balance. <br>
                        The maximum drawdown permissible is set at 
                        <span style="color: #D32F2F; font-weight: bold;">{{ number_format($m->max_drawdown, 2) }}</span>.
                    </p>
                    <ul style="margin: 10px 0; padding-left: 20px; font-size: 15px; color: #555;">
                        <li><strong>Initial Balance:</strong> <span style="color: #0288D1;">{{ number_format($m->initial_balance, 2) }}</span></li>
                        <li><strong>Current Balance:</strong> <span style="color: #0288D1;">{{ number_format($m->balance, 2) }}</span></li>
                        <li><strong>Target:</strong> <span style="color: #7B1FA2;">{{ number_format($m->target, 2) }}</span></li>
                        <li><strong>Leverage:</strong> <span style="color: #FF5722;">{{ $m->leverage }}x</span></li>
                        <li><strong>Risk/Reward Ratio:</strong> <span style="color: #689F38;">risk {{ $m->target/$m->risk_ratio }}$</span></li>
                    </ul>
                    <p style="margin-top: 15px; font-size: 14px; color: #666;">
                        ⚠️ Max trades 10 <br>
                        ⚠️ 3 losses == OUT !!!<br>
                        ⚠️ hit the risk in the balance == OUT !!!<br>
                        ⚠️ 10 loss == OUT !!! FOR THE WEEK ONLY YOU CAN DO IS ANALYSIS AND WITNNES ( IF THERE IS A GOLDEN CLUSTER YOU CAN ENTER ONE TIME)<br>
                        ⚠️ you can trade more if you did not lose any trade<br>
                        ⚠️ risk more when you know more 
                    </p>
                </div>
                
                @endforeach
                
            </td></tr>
        </table>
    </form>


</body>
</html>
