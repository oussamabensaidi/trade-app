<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Analysis Data</title>  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    <title>Create Analysis</title>
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
    <h1>update Analysis</h1>
    <form class="form-container" action="{{ route('update_position',$position->id) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <table>
            <tr>
                <td><label for="ticker_name">Ticker Name:</label></td>
                <td><input type="text" id="ticker_name" name="ticker_name" value="{{ old('ticker_name', $position->ticker_name) }}"></td>
            </tr>
            <tr>
                <td><label for="ticker_name">Previous resault:</label></td>
                <td><h1>{{ $position->result }}</h1></td>
            </tr>

            

            <tr>
                <td>Previous picture</td>
                <td>
                    <img src="{{ asset(old('picture', $position->picture)) }}" alt="" style="width: 50%">
                </td>
            </tr>
            <tr>
                <td>Post picture</td>
                <td>
                    <input type="file" name="post_picture">
                </td>
            </tr>
            <tr>
                <td>success</td>
                <td>
                    <input type="radio" id="yes" name="succses" value="VALIDE">
                    <label for="yes">valid</label>
                    <input type="radio" id="no" name="succses" value="failed">
                    <label for="no">fail</label>
                </td>
            </tr>
            <tr>
                <td>profit</td>
                <td>
                    <input type="number" name="profit">
                </td>
            </tr>
            <tr >
                <td>Major notes:</td>
                <td>
                    <input type="text" name="major_notes" value="{{ old('ticker_name', $position->major_notes) }}">
                </td>
            </tr>
            <tr >
                <td>Post Position notes:</td>
                <td>
                    <input type="text" name="post_notes" >
                </td>
            </tr>
            

            <tr>
                <td colspan="2" class="result">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    
                    

            
                </script>

</body>
</html>
