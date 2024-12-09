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
    <h1>Create Analysis</h1>
    <form class="form-container" action="{{ route('create_position') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td><label for="ticker_name">Ticker Name:</label></td>
                <td><input type="text" id="ticker_name" name="ticker_name"></td>
            </tr>
            <tr>
                <td>Type of the asset:</td>
                <td>
                <select name="asset_type" id="" class="form-select" >
                    <option value="futures">futures</option>
                    <option value="commidities">commidities</option>
                    <option value="forex">forex</option>
                    <option value="stocks">stocks</option>
                </select></td>
            </tr>

           

            <tr class="white">
                <td>Dow Day:</td>
                <td>
                    <input type="radio" id="dow_day_up" name="dow_day" value="up" onchange="toggleRowColor(this)">
                    <label for="dow_day_up">Up</label>
                    <input type="radio" id="dow_day_down" name="dow_day" value="down" onchange="toggleRowColor(this)">
                    <label for="dow_day_down">Down</label>
                    <input type="radio" id="dow_day_no" name="dow_day" value="no" onchange="toggleRowColor(this)">
                    <label for="dow_day_no">No</label>
                    <input type="radio" id="dow_day_idk" name="dow_day" value="idk" onchange="toggleRowColor(this)">
                    <label for="dow_day_idk">idk</label><br>
                    <label for="dow_day_note"> Any notes?</label>
                    <input type="text" name="dow_day_note">
                </td>
            </tr>
            <tr class="white">
                <td>Dow 4H:</td>
                <td>
                    <input type="radio" id="dow_4h_up" name="dow_4h" value="up" onchange="toggleRowColor(this)">
                    <label for="dow_4h_up">Up</label>
                    <input type="radio" id="dow_4h_down" name="dow_4h" value="down" onchange="toggleRowColor(this)">
                    <label for="dow_4h_down">Down</label>
                    <input type="radio" id="dow_4h_no" name="dow_4h" value="no" onchange="toggleRowColor(this)">
                    <label for="dow_4h_no">No</label>
                    <input type="radio" id="dow_4h_idk" name="dow_4h" value="idk" onchange="toggleRowColor(this)">
                    <label for="dow_4h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="dow_4h_note">
                </td>
            </tr>
            <tr class="white">
                <td>Dow 1h:</td>
                <td>
                    <input type="radio" id="dow_1h_up" name="dow_1h" value="up" onchange="toggleRowColor(this)">
                    <label for="dow_1h_up">Up</label>
                    <input type="radio" id="dow_1h_down" name="dow_1h" value="down" onchange="toggleRowColor(this)">
                    <label for="dow_1h_down">Down</label>
                    <input type="radio" id="dow_1h_no" name="dow_1h" value="no" onchange="toggleRowColor(this)">
                    <label for="dow_1h_no">No</label>
                    <input type="radio" id="dow_1h_idk" name="dow_1h" value="idk" onchange="toggleRowColor(this)">
                    <label for="dow_1h_idk">idk</label><br>
                    <label for="dow_1h_note"> Any notes?</label>
                    <input type="text" name="dow_1h_note">
                    
                </td>
            </tr>
            
            <tr class="white">
                <td>moving average day:</td>
                <td>
                    <input type="radio" id="moving_average_day_up" name="moving_average_day" value="up" onchange="toggleRowColor(this)">
                    <label for="moving_average_day_up">Up</label>
                    <input type="radio" id="moving_average_day_down" name="moving_average_day" value="down" onchange="toggleRowColor(this)">
                    <label for="moving_average_day_down">Down</label>
                    <input type="radio" id="moving_average_day_no" name="moving_average_day" value="no" onchange="toggleRowColor(this)">
                    <label for="moving_average_day_no">No</label>
                    <input type="radio" id="moving_average_day_idk" name="moving_average_day" value="idk" onchange="toggleRowColor(this)">
                    <label for="moving_average_day_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="moving_average_day_note">
                </td>
            </tr>
            <tr class="white">
                <td>moving average 4h:</td>
                <td>
                    <input type="radio" id="moving_average_4h_up" name="moving_average_4h" value="up" onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_up">Up</label>
                    <input type="radio" id="moving_average_4h_down" name="moving_average_4h" value="down" onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_down">Down</label>
                    <input type="radio" id="moving_average_4h_no" name="moving_average_4h" value="no" onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_no">No</label>
                    <input type="radio" id="moving_average_4h_idk" name="moving_average_4h" value="idk" onchange="toggleRowColor(this)">
                    <label for="moving_average_4h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="moving_average_4h_note">
                </td>
            </tr>
            <tr class="white">
                <td>moving average 1h:</td>
                <td>
                    <input type="radio" id="moving_average_1h_up" name="moving_average_1h" value="up" onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_up">Up</label>
                    <input type="radio" id="moving_average_1h_down" name="moving_average_1h" value="down" onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_down">Down</label>
                    <input type="radio" id="moving_average_1h_no" name="moving_average_1h" value="no" onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_no">No</label>
                    <input type="radio" id="moving_average_1h_idk" name="moving_average_1h" value="idk" onchange="toggleRowColor(this)">
                    <label for="moving_average_1h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="moving_average_1h_note">
                </td>
            </tr>
           
            <tr class="white">
                <td>macd Day:</td>
                <td>
                    <input type="radio" id="macd_day_up" name="macd_day" value="up" onchange="toggleRowColor(this)">
                    <label for="macd_day_up">Up</label>
                    <input type="radio" id="macd_day_down" name="macd_day" value="down" onchange="toggleRowColor(this)">
                    <label for="macd_day_down">Down</label>
                    <input type="radio" id="macd_day_no" name="macd_day" value="no" onchange="toggleRowColor(this)">
                    <label for="macd_day_no">No</label>
                    <input type="radio" id="macd_day_idk" name="macd_day" value="idk" onchange="toggleRowColor(this)">
                    <label for="macd_day_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="macd_day_note">
                </td>
            </tr>
            <tr class="white">
                <td>macd 4h:</td>
                <td>
                    <input type="radio" id="macd_4h_up" name="macd_4h" value="up" onchange="toggleRowColor(this)">
                    <label for="macd_4h_up">Up</label>
                    <input type="radio" id="macd_4h_down" name="macd_4h" value="down" onchange="toggleRowColor(this)">
                    <label for="macd_4h_down">Down</label>
                    <input type="radio" id="macd_4h_no" name="macd_4h" value="no" onchange="toggleRowColor(this)">
                    <label for="macd_4h_no">No</label>
                    <input type="radio" id="macd_4h_idk" name="macd_4h" value="idk" onchange="toggleRowColor(this)">
                    <label for="macd_4h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="macd_4h_note">
                </td>
            </tr>
            <tr class="white">
                <td>macd 1h:</td>
                <td>
                    <input type="radio" id="macd_1h_up" name="macd_1h" value="up" onchange="toggleRowColor(this)">
                    <label for="macd_1h_up">Up</label>
                    <input type="radio" id="macd_1h_down" name="macd_1h" value="down" onchange="toggleRowColor(this)">
                    <label for="macd_1h_down">Down</label>
                    <input type="radio" id="macd_1h_no" name="macd_1h" value="no" onchange="toggleRowColor(this)">
                    <label for="macd_1h_no">No</label>
                    <input type="radio" id="macd_1h_idk" name="macd_1h" value="idk" onchange="toggleRowColor(this)">
                    <label for="macd_1h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="macd_1h_note">
                </td>
            </tr>
           
            <tr class="white">
                <td>rsi day:</td>
                <td>
                    <input type="radio" id="rsi_day_up" name="rsi_day" value="up" onchange="toggleRowColor(this)">
                    <label for="rsi_day_up">Up</label>
                    <input type="radio" id="rsi_day_down" name="rsi_day" value="down" onchange="toggleRowColor(this)">
                    <label for="rsi_day_down">Down</label>
                    <input type="radio" id="rsi_day_no" name="rsi_day" value="no" onchange="toggleRowColor(this)">
                    <label for="rsi_day_no">No</label>
                    <input type="radio" id="rsi_day_idk" name="rsi_day" value="idk" onchange="toggleRowColor(this)">
                    <label for="rsi_day_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="rsi_day_note">
                </td>
            </tr>
            <tr class="white">
                <td>Rsi 4h:</td>
                <td>
                    <input type="radio" id="rsi_4h_up" name="rsi_4h" value="up" onchange="toggleRowColor(this)">
                    <label for="rsi_4h_up">Up</label>
                    <input type="radio" id="rsi_4h_down" name="rsi_4h" value="down" onchange="toggleRowColor(this)">
                    <label for="rsi_4h_down">Down</label>
                    <input type="radio" id="rsi_4h_no" name="rsi_4h" value="no" onchange="toggleRowColor(this)">
                    <label for="rsi_4h_no">No</label>
                    <input type="radio" id="rsi_4h_idk" name="rsi_4h" value="idk" onchange="toggleRowColor(this)">
                    <label for="rsi_4h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="rsi_4h_note">
                </td>
            </tr>
            <tr class="white">
                <td>rsi 1h:</td>
                <td>
                    <input type="radio" id="rsi_1h_up" name="rsi_1h" value="up" onchange="toggleRowColor(this)">
                    <label for="rsi_1h_up">Up</label>
                    <input type="radio" id="rsi_1h_down" name="rsi_1h" value="down" onchange="toggleRowColor(this)">
                    <label for="rsi_1h_down">Down</label>
                    <input type="radio" id="rsi_1h_no" name="rsi_1h" value="no" onchange="toggleRowColor(this)">
                    <label for="rsi_1h_no">No</label>
                    <input type="radio" id="rsi_1h_idk" name="rsi_1h" value="idk" onchange="toggleRowColor(this)">
                    <label for="rsi_1h_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="rsi_1h_note">
                </td>
            </tr>

            

            <tr class="white">
                <td>Fibonacci:</td>
                <td>
                    <input type="radio" id="fibo_up" name="fibo" value="up" onchange="toggleRowColor(this)">
                    <label for="fibo_up">Up</label>
                    <input type="radio" id="fibo_down" name="fibo" value="down" onchange="toggleRowColor(this)">
                    <label for="fibo_down">Down</label>
                    <input type="radio" id="fibo_no" name="fibo" value="no" onchange="toggleRowColor(this)">
                    <label for="fibo_no">No</label>
                    <input type="radio" id="fibo_idk" name="fibo" value="idk" onchange="toggleRowColor(this)">
                    <label for="fibo_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="fibo_note">
                </td>
            </tr>

            <tr class="white">
                <td>Gann:</td>
                <td>
                    <input type="radio" id="gann_up" name="gann" value="up" onchange="toggleRowColor(this)">
                    <label for="gann_up">Up</label>
                    <input type="radio" id="gann_down" name="gann" value="down" onchange="toggleRowColor(this)">
                    <label for="gann_down">Down</label>
                    <input type="radio" id="gann_no" name="gann" value="no" onchange="toggleRowColor(this)">
                    <label for="gann_no">No</label>
                    <input type="radio" id="gann_idk" name="gann" value="idk" onchange="toggleRowColor(this)">
                    <label for="gann_idk">idk</label><br>
                    <label for="_note"> Any notes?</label>
                    <input type="text" name="gann_note">
                </td>
            </tr>
            <tr class="white">
                <td>Major notes:</td>
                <td>
                    <label for="_note"> Any Major notes?</label>
                    <input type="text" name="major_notes">
                </td>
            </tr>

            <tr>
                <td>picture</td>
                <td>
                    <input type="file" name="picture">
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
                        let idkCount = 15;
            
                        const options = document.querySelectorAll('input[type="radio"]:checked');
                        
                        options.forEach(option => {
                            if (option.checked) {
                                if (option.value === 'up') {
                                    if (option.id == 'dow_4h_up'){
                                        return upCount += 2
                                    }
                                    if (option.id == 'dow_1h_up'){
                                        return upCount += 1.5
                                    }
                                    if (option.id == 'moving_average_4h_up'){
                                        return upCount += 2
                                    }
                                    if (option.id == 'macd_1h_up'){
                                        return upCount += 0.75
                                    }
                                    if (option.id == 'macd_day_up'){
                                        return upCount += 0.5
                                    }
                                    if (option.id == 'rsi_1h_up'){
                                        return upCount += 0.75
                                    }
                                    if (option.id == 'rsi_day_up'){
                                        return upCount += 0.5
                                    }
                                    
                                    upCount++;
                                } else if (option.value === 'down') {
                                    if (option.id == 'dow_4h_down'){
                                        return downCount += 2
                                    }
                                    if (option.id == 'dow_1h_down'){
                                        return downCount += 1.5
                                    }
                                    if (option.id == 'moving_average_4h_down'){
                                        return downCount += 2
                                    }
                                    if (option.id == 'macd_1h_down'){
                                        return downCount += 0.75
                                    }
                                    if (option.id == 'macd_day_down'){
                                        return downCount += 0.5
                                    }
                                    if (option.id == 'rsi_1h_down'){
                                        return downCount += 0.75
                                    }
                                    if (option.id == 'rsi_day_down'){
                                        return downCount += 0.5
                                    }
                                    downCount++;
                                } else if (option.value === 'no') {
                                    if (option.id == 'dow_4h_no'){
                                        return noCount += 2
                                    }
                                    if (option.id == 'dow_1h_no'){
                                        return noCount += 1.5
                                    }
                                    if (option.id == 'moving_average_4h_no'){
                                        return noCount += 2
                                    }
                                    if (option.id == 'macd_1h_no'){
                                        return noCount += 0.75
                                    }
                                    if (option.id == 'macd_day_no'){
                                        return noCount += 0.5
                                    }
                                    if (option.id == 'rsi_1h_no'){
                                        return noCount += 0.75
                                    }
                                    if (option.id == 'rsi_day_no'){
                                        return noCount += 0.5
                                    }
                                    noCount++;
                                }
                                 else if (option.value === 'idk') {
                                    if (option.id == 'dow_4h_idk'){
                                        return idkCount -= 2
                                    }
                                    if (option.id == 'dow_1h_idk'){
                                        return idkCount -= 1.5
                                    }
                                    if (option.id == 'moving_average_4h_idk'){
                                        return idkCount -= 2
                                    }
                                    if (option.id == 'macd_1h_idk'){
                                        return idkCount -= 0.75
                                    }
                                    if (option.id == 'macd_day_idk'){
                                        return idkCount -= 0.5
                                    }
                                    if (option.id == 'rsi_1h_idk'){
                                        return idkCount -= 0.75
                                    }
                                    if (option.id == 'rsi_day_idk'){
                                        return idkCount -= 0.5
                                    }
                                    idkCount--;
                                }
                            }
                        });
                        document.getElementById('upCount').textContent = 'Up: ' + upCount+'   /'+idkCount;
                        document.getElementById('downCount').textContent = 'Down: ' + downCount+'   /'+idkCount;
                        document.getElementById('noCount').textContent = 'No: ' + noCount+'   /'+idkCount;
                        document.getElementById('resault_inp').value ='Up: ' + upCount+'   /'+idkCount+' ---    ' + '   Down: ' + downCount+'   /'+idkCount+' ---    '+'    No: ' + noCount+'   /'+idkCount;
                    }
                    const radioButtons = document.querySelectorAll('input[type="radio"]');

// Add event listener to each radio button
radioButtons.forEach((radio) => {radio.addEventListener('click',test )})
                    

            
                </script>

</body>
</html>
