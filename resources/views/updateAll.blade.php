<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Analysis Data</title>  
    <meta charset="UTF-8">
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
        tr.blue {
            background-color: #1032a1;
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
    <form class="form-container" action="{{ route('update_whole',$position->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td><label for="ticker_name">Ticker Name:</label></td>
                <td><input type="text" id="ticker_name" name="ticker_name" value="{{ old('ticker_name', $position->ticker_name) }}"></td>
            </tr>
            <tr>
                <td>Type of the asset:</td>
                <td>
                    <select name="asset_type" id="" class="form-select">
                        <option value="futures" {{ old('asset_type', $position->asset_type) == 'futures' ? 'selected' : '' }}>futures</option>
                        <option value="commodities" {{ old('asset_type', $position->asset_type) == 'commodities' ? 'selected' : '' }}>commodities</option>
                        <option value="forex" {{ old('asset_type', $position->asset_type) == 'forex' ? 'selected' : '' }}>forex</option>
                        <option value="stocks" {{ old('asset_type', $position->asset_type) == 'stocks' ? 'selected' : '' }}>stocks</option>
                    </select>
                </td>
            </tr>
            
            
       

            <tr class="white">
                <td>Dow Day:</td>
                <td>
                    <input type="radio" id="dow_day_up" name="dow_day" value="up" {{ old('dow_day', $position->dow_day ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_day_up">Up</label>
                    <input type="radio" id="dow_day_down" name="dow_day" value="down" {{ old('dow_day', $position->dow_day ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_day_down">Down</label>
                    <input type="radio" id="dow_day_no" name="dow_day" value="no" {{ old('dow_day', $position->dow_day ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_day_no">No</label><br>
                    <label for="dow_day_note"> Any notes?</label>
                    <input type="text" name="dow_day_note" value="{{ old('dow_day_note', $position->dow_day_note ?? '') }}">
                </td>
            </tr>
            
            <tr class="white">
                <td>Dow 4H:</td>
                <td>
                    <input type="radio" id="dow_4h_up" name="dow_4h" value="up" {{ old('dow_4h', $position->dow_4h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_4h_up">Up</label>
                    <input type="radio" id="dow_4h_down" name="dow_4h" value="down" {{ old('dow_4h', $position->dow_4h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_4h_down">Down</label>
                    <input type="radio" id="dow_4h_no" name="dow_4h" value="no" {{ old('dow_4h', $position->dow_4h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_4h_no">No</label><br>
                    <label for="dow_4h_note"> Any notes?</label>
                    <input type="text" name="dow_4h_note" value="{{ old('dow_4h_note', $position->dow_4h_note ?? '') }}">
                </td>
            </tr>
            <tr class="white">
                <td>Dow 1h:</td>
                <td>
                    <input type="radio" id="dow_1h_up" name="dow_1h" value="up" {{ old('dow_1h', $position->dow_1h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_1h_up">Up</label>
                    <input type="radio" id="dow_1h_down" name="dow_1h" value="down" {{ old('dow_1h', $position->dow_1h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_1h_down">Down</label>
                    <input type="radio" id="dow_1h_no" name="dow_1h" value="no" {{ old('dow_1h', $position->dow_1h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="dow_1h_no">No</label><br>
                    <label for="dow_1h_note"> Any notes?</label>
                    <input type="text" name="dow_1h_note" value="{{ old('dow_1h_note', $position->dow_1h_note ?? '') }}">
                </td>
            </tr>
            
            
            <tr class="white">
                <td>Moving average day:</td>
                <td>
                    <input type="radio" id="moving_average_day_up" name="moving_average_day" value="up" {{ old('moving_average_day', $position->moving_average_day ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_day_up">Up</label>
                    <input type="radio" id="moving_average_day_down" name="moving_average_day" value="down" {{ old('moving_average_day', $position->moving_average_day ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_day_down">Down</label>
                    <input type="radio" id="moving_average_day_no" name="moving_average_day" value="no" {{ old('moving_average_day', $position->moving_average_day ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_day_no">No</label><br>
                    <label for="moving_average_day_note"> Any notes?</label>
                    <input type="text" name="moving_average_day_note" value="{{ old('moving_average_day_note', $position->moving_average_day_note ?? '') }}">
                </td>
            </tr>
            
            <tr class="white">
                <td>Moving average 4H:</td>
                <td>
                    <input type="radio" id="moving_average_4h_up" name="moving_average_4h" value="up" {{ old('moving_average_4h', $position->moving_average_4h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_up">Up</label>
                    <input type="radio" id="moving_average_4h_down" name="moving_average_4h" value="down" {{ old('moving_average_4h', $position->moving_average_4h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_down">Down</label>
                    <input type="radio" id="moving_average_4h_no" name="moving_average_4h" value="no" {{ old('moving_average_4h', $position->moving_average_4h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_no">No</label><br>
                    <label for="moving_average_4h_note"> Any notes?</label>
                    <input type="text" name="moving_average_4h_note" value="{{ old('moving_average_4h_note', $position->moving_average_4h_note ?? '') }}">
                </td>
            </tr>
            <tr class="white">
                <td>Moving average 1h:</td>
                <td>
                    <input type="radio" id="moving_average_1h_up" name="moving_average_1h" value="up" {{ old('moving_average_1h', $position->moving_average_1h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_up">Up</label>
                    <input type="radio" id="moving_average_1h_down" name="moving_average_1h" value="down" {{ old('moving_average_1h', $position->moving_average_1h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_down">Down</label>
                    <input type="radio" id="moving_average_1h_no" name="moving_average_1h" value="no" {{ old('moving_average_1h', $position->moving_average_1h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_no">No</label><br>
                    <label for="moving_average_1h_note"> Any notes?</label>
                    <input type="text" name="moving_average_1h_note" value="{{ old('moving_average_1h_note', $position->moving_average_1h_note ?? '') }}">
                </td>
            </tr>
            
            
            <tr class="white">
                <td>MACD day:</td>
                <td>
                    <input type="radio" id="macd_day_up" name="macd_day" value="up" {{ old('macd_day', $position->macd_day ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_day_up">Up</label>
                    <input type="radio" id="macd_day_down" name="macd_day" value="down" {{ old('macd_day', $position->macd_day ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_day_down">Down</label>
                    <input type="radio" id="macd_day_no" name="macd_day" value="no" {{ old('macd_day', $position->macd_day ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_day_no">No</label><br>
                    <label for="macd_day_note"> Any notes?</label>
                    <input type="text" name="macd_day_note" value="{{ old('macd_day_note', $position->macd_day_note ?? '') }}">
                </td>
            </tr>
            
            <tr class="white">
                <td>MACD 4H:</td>
                <td>
                    <input type="radio" id="macd_4h_up" name="macd_4h" value="up" {{ old('macd_4h', $position->macd_4h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_4h_up">Up</label>
                    <input type="radio" id="macd_4h_down" name="macd_4h" value="down" {{ old('macd_4h', $position->macd_4h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_4h_down">Down</label>
                    <input type="radio" id="macd_4h_no" name="macd_4h" value="no" {{ old('macd_4h', $position->macd_4h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_4h_no">No</label><br>
                    <label for="macd_4h_note"> Any notes?</label>
                    <input type="text" name="macd_4h_note" value="{{ old('macd_4h_note', $position->macd_4h_note ?? '') }}">
                </td>
            </tr>
            <tr class="white">
                <td>MACD 1h:</td>
                <td>
                    <input type="radio" id="macd_1h_up" name="macd_1h" value="up" {{ old('macd_1h', $position->macd_1h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_1h_up">Up</label>
                    <input type="radio" id="macd_1h_down" name="macd_1h" value="down" {{ old('macd_1h', $position->macd_1h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_1h_down">Down</label>
                    <input type="radio" id="macd_1h_no" name="macd_1h" value="no" {{ old('macd_1h', $position->macd_1h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="macd_1h_no">No</label><br>
                    <label for="macd_1h_note"> Any notes?</label>
                    <input type="text" name="macd_1h_note" value="{{ old('macd_1h_note', $position->macd_1h_note ?? '') }}">
                </td>
            </tr>
            
            
            <tr class="white">
                <td>RSI day:</td>
                <td>
                    <input type="radio" id="rsi_day_up" name="rsi_day" value="up" {{ old('rsi_day', $position->rsi_day ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_day_up">Up</label>
                    <input type="radio" id="rsi_day_down" name="rsi_day" value="down" {{ old('rsi_day', $position->rsi_day ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_day_down">Down</label>
                    <input type="radio" id="rsi_day_no" name="rsi_day" value="no" {{ old('rsi_day', $position->rsi_day ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_day_no">No</label><br>
                    <label for="rsi_day_note"> Any notes?</label>
                    <input type="text" name="rsi_day_note" value="{{ old('rsi_day_note', $position->rsi_day_note ?? '') }}">
                </td>
            </tr>
            
            <tr class="white">
                <td>RSI 4H:</td>
                <td>
                    <input type="radio" id="rsi_4h_up" name="rsi_4h" value="up" {{ old('rsi_4h', $position->rsi_4h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_4h_up">Up</label>
                    <input type="radio" id="rsi_4h_down" name="rsi_4h" value="down" {{ old('rsi_4h', $position->rsi_4h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_4h_down">Down</label>
                    <input type="radio" id="rsi_4h_no" name="rsi_4h" value="no" {{ old('rsi_4h', $position->rsi_4h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_4h_no">No</label><br>
                    <label for="rsi_4h_note"> Any notes?</label>
                    <input type="text" name="rsi_4h_note" value="{{ old('rsi_4h_note', $position->rsi_4h_note ?? '') }}">
                </td>
            </tr>

            <tr class="white">
                <td>RSI 1h:</td>
                <td>
                    <input type="radio" id="rsi_1h_up" name="rsi_1h" value="up" {{ old('rsi_1h', $position->rsi_1h ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_1h_up">Up</label>
                    <input type="radio" id="rsi_1h_down" name="rsi_1h" value="down" {{ old('rsi_1h', $position->rsi_1h ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_1h_down">Down</label>
                    <input type="radio" id="rsi_1h_no" name="rsi_1h" value="no" {{ old('rsi_1h', $position->rsi_1h ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="rsi_1h_no">No</label><br>
                    <label for="rsi_1h_note"> Any notes?</label>
                    <input type="text" name="rsi_1h_note" value="{{ old('rsi_1h_note', $position->rsi_1h_note ?? '') }}">
                </td>
            </tr>

            <tr class="white">
                <td>Fibonacci:</td>
                <td>
                    <input type="radio" id="fibo_up" name="fibo" value="up" {{ old('fibo', $position->fibo ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="fibo_up">Up</label>
                    <input type="radio" id="fibo_down" name="fibo" value="down" {{ old('fibo', $position->fibo ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="fibo_down">Down</label>
                    <input type="radio" id="fibo_no" name="fibo" value="no" {{ old('fibo', $position->fibo ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="fibo_no">No</label><br>
                    <label for="fibo_note"> Any notes?</label>
                    <input type="text" name="fibo_note" value="{{ old('fibo_note', $position->fibo_note ?? '') }}">
                </td>
            </tr>
            
            <tr class="white">
                <td>Gann:</td>
                <td>
                    <input type="radio" id="gann_up" name="gann" value="up" {{ old('gann', $position->gann ?? '') == 'up' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="gann_up">Up</label>
                    <input type="radio" id="gann_down" name="gann" value="down" {{ old('gann', $position->gann ?? '') == 'down' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="gann_down">Down</label>
                    <input type="radio" id="gann_no" name="gann" value="no" {{ old('gann', $position->gann ?? '') == 'no' ? 'checked' : '' }} onchange="toggleRowColor(this)">
                    <label for="gann_no">No</label><br>
                    <label for="gann_note"> Any notes?</label>
                    <input type="text" name="gann_note" value="{{ old('gann_note', $position->gann_note ?? '') }}">
                </td>
            </tr>
            
            <tr class="white">
                <td>Major notes:</td>
                <td>
                    <label for="_note"> Any Major notes?</label>
                    <input type="text" name="major_notes" value="{{ old('major_notes', $position->major_notes) }}">
                </td>
            </tr>

            <tr>
                <td>picture</td>
                <td>
                    <img src="{{ asset(old('picture', $position->picture)) }}" alt=""  style="width: 50%">
                    <input type="file" name="picture">
                </td>
            </tr>
            <tr>
                <td>post picture</td>
                <td>
                    <img src="{{ asset(old('picture', $position->post_picture)) }}" alt=""  style="width: 50%">
                    <input type="file" name="post_picture">
                </td>
            </tr>
            <tr class="white">
                <td>success</td>
                <td>
                <input type="radio" id="yes" name="succses" value="VALIDE">
                    <label for="yes">valid</label>
                    <input type="radio" id="no" name="succses" value="failed">
                    <label for="no">fail</label>
                </td>
            </tr>
            <tr class="white">
                <td>profit</td>
                <td>
                    <input type="number" name="profit" value="{{ old('profit', $position->profit) }}">
                </td>
            </tr>
            <tr class="white">
                <td>Post notes</td>
                <td>
                    <input type="text" name="post_notes" value="{{ old('post_notes', $position->post_notes) }}">
                </td>
            </tr>

            <tr>
                <td colspan="2" class="result">
                    <h3>Counts:</h3>
                    <p id="upCount">Up: 0</p>
                    <p id="downCount">Down: 0</p>
                    <p id="noCount">No: 0</p>
                    <input type="hidden" id="resault_inp" value="" name="result">
                </td>
            </tr>

            <tr>
                <td colspan="2" class="result">
                    <button type="submit">Submit</button>
                </td>
            </tr>
        </table>
    </form>

    <script>
        function toggleRowColor(radio) {
            const row = radio.closest('tr');
            const allRows = document.querySelectorAll('tr');
            allRows.forEach(tr => tr.classList.remove('blue'));
            row.classList.add('blue');
        }
    </script>
                <script>
                function test(){
                        let upCount = 0;
                        let downCount = 0;
                        let noCount = 0;
            
                        const options = document.querySelectorAll('input[type="radio"]:checked');
                        
                        options.forEach(option => {
                            if (option.checked) {
                                if (option.value === 'up') {
                                    if (option.id == 'dow_4h_up'){
                                        return upCount += 2
                                    }
                                    if (option.id == 'moving_average_4h_up'){
                                        return upCount += 2
                                    }
                                    if (option.id == 'macd_1h_up'){
                                        return upCount += 0.5
                                    }
                                    if (option.id == 'macd_day_up'){
                                        return upCount += 0.5
                                    }
                                    if (option.id == 'rsi_1h_up'){
                                        return upCount += 0.5
                                    }
                                    if (option.id == 'rsi_day_up'){
                                        return upCount += 0.5
                                    }
                                    
                                    upCount++;
                                } else if (option.value === 'down') {
                                    if (option.id == 'dow_4h_down'){
                                        return downCount += 2
                                    }
                                    if (option.id == 'moving_average_4h_down'){
                                        return downCount += 2
                                    }
                                    if (option.id == 'macd_1h_down'){
                                        return downCount += 0.5
                                    }
                                    if (option.id == 'macd_day_down'){
                                        return downCount += 0.5
                                    }
                                    if (option.id == 'rsi_1h_down'){
                                        return downCount += 0.5
                                    }
                                    if (option.id == 'rsi_day_down'){
                                        return downCount += 0.5
                                    }
                                    downCount++;
                                } else if (option.value === 'no') {
                                    if (option.id == 'dow_4h_no'){
                                        return noCount += 2
                                    }
                                    if (option.id == 'moving_average_4h_no'){
                                        return noCount += 2
                                    }
                                    if (option.id == 'macd_1h_no'){
                                        return noCount += 0.5
                                    }
                                    if (option.id == 'macd_day_no'){
                                        return noCount += 0.5
                                    }
                                    if (option.id == 'rsi_1h_no'){
                                        return noCount += 0.5
                                    }
                                    if (option.id == 'rsi_day_no'){
                                        return noCount += 0.5
                                    }
                                    noCount++;
                                }
                            }
                        });
                        document.getElementById('upCount').textContent = 'Up: ' + upCount+'   /14';
                        document.getElementById('downCount').textContent = 'Down: ' + downCount+'    /14';
                        document.getElementById('noCount').textContent = 'No: ' + noCount+'    /14';
                        document.getElementById('resault_inp').value ='Up: ' + upCount+'   /14 ---    ' + '   Down: ' + downCount+'    /14 ---   '+'    No: ' + noCount+'    /14  ';
                    }
                    const radioButtons = document.querySelectorAll('input[type="radio"]');

// Add event listener to each radio button
radioButtons.forEach((radio) => {radio.addEventListener('click',test )})
                    

            
                </script>

</body>
</html>
