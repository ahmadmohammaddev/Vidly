@extends('layouts.app')

@section('content')
    
<<div class="container">

    <div class="text-center">
        <h1> Summary</h1>
    </div>

    <table class="table">
        <tr>
            <th><h5>Genre</h5></th>
            <th class="text-center"><h5>Movie Title</h5></th>
            <th class="text-center"><h5>Movie Description</h5></th>
            <th class="text-center"><h5>Number in stock</h5></th>
            <th class="text-center"><h5>Daily rental rate</h5></th>
            <th class="text-center"><h5>Main Actors</h5></th>
        </tr>
        
        @foreach($results as $movieModel)
        <tr>
            <td>
                <a href="/genre/{{ $movieModel->genre->id }}"><span class="badge badge-pill badge-primary">{{ $movieModel->genre->name}}</span></a>
            </td>
            <td class="text-center">
                {{ $movieModel->title}}
            </td>
            <td class="text-center">
                {{ $movieModel->description}}
            </td>
            <td class="text-center">
                {{ $movieModel->number_in_stock}}
            </td>
            <td class="text-center">
                {{ $movieModel->daily_rental_rate}}
            </td>

            <td class="text-center">
                <?php $actors = $movieModel->actors; ?>
                @foreach ($actors as $actor) 
                <a href="/actor/{{ $actor->id }}"><span class="badge badge-pill badge-primary">{{ $actor->first_name}} {{ $actor->last_name}}</span></a>
                @endforeach
            </td>

        </tr>
        @endforeach

    </table>

</div>

@endsection