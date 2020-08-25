
@extends('master')

@section('content')


<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Managing Genres
        </div>

        <div class="panel-body">
            <h2><br/> Creating new Genre</h2> <hr/>

            {{-- Creating New Genre --}}
            <form action="genre" method="POST" enctype="multipart/form-data">
                {!! csrf_field() !!}
                Enter the name of the Genre:<input type="text" name="genre_name" /><br />
                Upload an image : <input type="file" name="image" />
                <br />
                <button class="btn btn—default" type="submit">
                    <img src="{{asset('/images/add.ico')}}" width="25px" height="25px" />Create
                </button>
            </form>
        </div>{{-- end of body --}}
        
        @if($genres != null)
            <table c1ass="table">
                <tr>
                    <th><h3>Genre Name</h3></th>
                    <th><h3>Total Movies</h3></th>
                    <th><h3>Update</h3></th>
                    <th><h3>Delete</h3></th>
                </tr>
                    
                @foreach($genres as $genre)
                <!-- TabLe -->
                <tr>
                    {{-- Updating Existing Genre --}}
                    <form action="genre/{{$genre->id}}" method="POST">
                        {!! csrf_field() !!}
                        {{ method_field('PUT') }}
                        <td>
                            <input type="text" name="genre_name" value="{{ $genre->name}}">
                        </td>
                        <td>
                            <span class="label label-default">{{ $genre->movies_total }}</span>
                        </td>

                        
                        <td>
                            <button name="action" class="btn btn—default" type="submit"><img src="{{asset('/images/update.png')}}" width="25px" height="25px" alt="blue"></button>
                        </td>
                    </form>

                    <td>
                    {{-- Deleting Genre --}}
                    <form action="genre/{{$genre->id}}" method="POST">
                        {!! csrf_field() !!}
                        {{ method_field('DELETE') }}
                        <button name="action" class="btn btn—default" type="submit"><img src="{{asset('/images/delete.png')}}" width="25px" height="25px" alt="blue"></button>
                    </form>
                    </td>
                </tr>
        
                @endforeach
            </table>
        @endif
            


    </div>
</div>


@endsection