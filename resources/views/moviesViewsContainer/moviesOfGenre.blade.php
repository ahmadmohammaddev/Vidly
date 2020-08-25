@extends('master')

@section('content')
    
<div class="container">
    <div class="panel-heading text-center mt-1">
        <h1>Managing {{ $genre->name }} Movies</h1> 
    </div>

    <br/>

    <div class="text-center">
        <h2> Creating new Movie</h2>
    </div>
    <hr/>

    {{-- Creating New Movie Form --}}            
    {!! Form::open(['url' => 'movie']) !!}
    {!! Form::hidden("genre_id",$genre->id) !!}
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Movie Title</span>
                </div>
                {!!   Form::text('movie_title', '',['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Description</span>
                </div>
                {!!   Form::text('description', '',['class' => 'form-control']) !!}
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Number In Stock</span>
                </div>
                {!!   Form::text('number_in_stock', '',['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-5">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Daily Rental Rate</span>
                </div>
                {!!   Form::text('daily_rental_rate', '',['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-1">
            {!! Form::submit('Add',["class"=>"btn btn-info"]);!!}
        </div>
    </div>
    {!! Form::close() !!}


    <table class="table">
        <tr>
            <th><h3>Movie Title</h3></th>
            <th class="text-center"><h3>Movie Description</h3></th>
            <th class="text-center"><h3>Number in stock</h3></th>
            <th class="text-center"><h3>Daily rental rate</h3></th>
            <th class="text-center"></th>            
            <th class="text-center"></th>
        </tr>
                
        @foreach($all_movies as $movie)
        <tr>
            <td>{{ $movie->title }}</td>
            <td>{{ $movie->description }}</td>
            <td class="text-center">{{ $movie->number_in_stock }}</td>
            <td class="text-center">{{ $movie->daily_rental_rate }}</td>
            <td><a href="#">Update</a></td>
            <td><a href="#">Delete</a></td>
        </tr>
        @endforeach
    </table>

</div>


@endsection