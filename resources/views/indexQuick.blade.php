<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=New+Amsterdam&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    </style>
</head>
<body>
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
                <th>why after?</th>
                <th>profit</th>
                <th>result</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($quick as $q)
            @if ($q->result!=null)
            <tr>
                <td><a href="{{route('showquick',['id'=>$q->id])}}">{{ $q->asset->name }}</a></td>
                <td style="color: 
                @if($q->operation == 'Buy') 
                    green 
                @elseif($q->operation == 'Sell') 
                    red 
                @else 
                    blue 
                @endif;"> {{ $q->operation }}
            </td>                   
                </td>
                <td>{{ $q->why_before }}</td>
                <td>{{ $q->why_after }}</td>
                <td>{{ $q->profit }}</td>
                <td>{{ $q->result }}</td>
                <td><a class="btn btn-outline-primary" href="{{route('show',$q->trade_id)}}">check parent analysis</a>
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
</body>
</html>