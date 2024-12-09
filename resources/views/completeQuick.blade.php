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
    <form class="form-container" action="{{ route('complete_quick',$quick->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <table>
            <tr>
                <td><label for="ticker_name">Ticker Name:</label></td>
                <td><input type="text" id="ticker_name" name="assetName" value="{{  $quick->assetName }}"></td>
                <input type="hidden" name="trade_id" value="{{ $quick->trade_id }}">
            </tr>
            <tr>
                <td><label for="operation_type">Operation type:</label></td>
                <td>
                    <input type="radio" id="buy" name="operation" value="Buy" required {{ $quick->operation == 'Buy' ? 'checked' : '' }}>
                    <label for="buy">Buy</label>
            
                    <input type="radio" id="sell" name="operation" value="Sell" required {{ $quick->operation == 'Sell' ? 'checked' : '' }}>
                    <label for="sell">Sell</label>

                    <input type="radio" id="idk" name="operation" value="idk" required {{ $quick->operation == 'idk' ? 'checked' : '' }}>
                    <label for="idk">idk</label>
                </td>
            </tr>
            
            <tr>
                <td><label for="why_before">Why Before</label></td>
                <td><input type="text" name="why_before" value="{{ $quick->why_before }}"></td>
            </tr>
            
                <tr>
                    <td><label for="why_after">Why After</label></td>
                    <td><input type="text" name="why_after"></td>
                </tr>
                <tr>
                    <td><label for="profit">Profit</label></td>
                    <td><input type="number" name="profit"></td>
                </tr>
        
            

            <tr>
                <td><label for="operation_type">result type:</label></td>
                <td>
                    <input type="radio" id="valide" name="result" value="valide" >
                    <label for="valide">valide</label>

                    <input type="radio" id="failed" name="result" value="failed" >
                    <label for="failed">failed</label>
                    <input type="radio" id="didnotenter" name="result" value="did_not_enter" >
                    <label for="didnotenter">did not enter</label>
                </td>
            </tr>


            <tr>
                <td colspan="2" class="result">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>


</body>
</html>
