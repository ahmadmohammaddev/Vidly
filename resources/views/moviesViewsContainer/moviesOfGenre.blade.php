@extends('layouts.app')

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

        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Daily Rental Rate</span>
                </div>
                {!!   Form::text('daily_rental_rate', '',['class' => 'form-control']) !!}
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Main Actor 1</span>
                </div>
                {!!   Form::text('main_actor_1', '',['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Main Actor 2</span>
                </div>
                {!!   Form::text('main_actor_2', '',['class' => 'form-control']) !!}
            </div>
        </div>

        
        
    </div>

    <div class="row">
        <div class="col-6">
            <div class="input-group mb-1">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="">Main Actor 3</span>
                </div>
                {!!   Form::text('main_actor_3', '',['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-1">
            {!! Form::submit('Add',["class"=>"btn btn-info"]);!!}
        </div>
        
    </div>
    
    {!! Form::close() !!}

    <hr/>

    <div class="text-center mt-5">
        <h2> Editing Existing Movie</h2>
    </div>
    <br/>
    <table class="table">
        <tr>
            <th><h5>Movie Title</h5></th>
            <th class="text-center"><h5>Movie Description</h5></th>
            <th class="text-center"><h5>Number in stock</h5></th>
            <th class="text-center"><h5>Daily rental rate</h5></th>
            <th class="text-center"><h5>Main Actors</h5></th>            
            <th class="text-center"></th>
        </tr>
        
        <?php $i=0 ?>
        @foreach($all_movies as $movie)
        <tr>
            {!! Form::open(['url' => 'movie/'.$movie->id, 'method' => 'put']) !!}
            {!! Form::hidden("genre_id",$genre->id) !!}
                <td>
                    {!! Form::text('movie_title', $movie->title, ['class' => 'form-control']); !!}
                </td>
                <td>
                    {!! Form::text('description', $movie->description, ['class' => 'form-control']); !!}
                </td>
                <td>
                    {!! Form::text('number_in_stock', $movie->number_in_stock, ['class' => 'form-control']); !!}
                </td>
                <td>
                    {!! Form::text('daily_rental_rate', $movie->daily_rental_rate, ['class' => 'form-control']); !!}
                </td>

                <td>
                    <?php $actors = $array_of_actors[$i]; ?>
                    @foreach ($actors as $actor) 
                    <a href="/actor/{{ $actor->id }}"><span class="badge badge-pill badge-primary">{{ $actor->first_name}}</span></a>
                    @endforeach
                    <?php $i=$i+1; ?>
                </td>
                
                <td class="text-center">
                    {!! Form::submit('Update',["class"=>"btn btn-success"]);!!}
                </td>
            {!! Form::close() !!}
            
            <td class="text-center">
                {!! Form::open(['url' => 'movie/'.$movie->id, 'method' => 'delete']) !!}
                {!! Form::hidden("genre_id",$genre->id) !!}
                {!! Form::submit('Delete',["class"=>"btn btn-danger"]);!!}                        
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>

</div>


@endsection