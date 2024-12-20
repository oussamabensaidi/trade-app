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
                    <h4 style="color: #388E3C; font-weight: bold; font-family: 'Arial', sans-serif;">📈 Strategy Insights</h4>
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
                        <li><strong>Leverage:</strong> <span style="color: #689F38;">{{ $m->leverage }}x</span></li>
                        <li><strong>Risk/Reward Ratio:</strong> <span style="color: #FF5722;">1:{{ $m->risk_ratio }}</span></li>
                    </ul>
                    <p style="margin-top: 15px; font-size: 14px; color: #666;">
                        ⚠️ Ensure the strategy maintains balance stability and adheres to the risk tolerance levels to optimize performance and minimize potential losses.
                    </p>
                </div>
                
                @endforeach
                
            </td></tr>
        </table>
    </form>


</body>
</html>
