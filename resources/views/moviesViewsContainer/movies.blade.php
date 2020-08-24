<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header class="jumbotron">
        <div class="container">
            <div class="col-md-10">
                <h1>The Movies!</h1>
                <p>Evrey movie is a new adventure</p>
            </div>
            <div class="col-md-2">
                {{-- Date : {{ $date }} <br/> Time : {{ $time }}  --}}
            </div>
            
        </div>
    </header>


    <div class="row">
        @foreach($genres as $key => $value)
        <div class="col-md-3">
            <div class="thumbnail">
                <img src="images/{{$value}}">
                <h1><a class="btn btn-primary">{{$key}}</a></h1>
            </div>
        </div> 
        @endforeach
        
    </div>

    <footer class="container">
        &copy; All Right Reserved for Ahmed Muhammed - 2020
    </footer>
        
</body>
</html>