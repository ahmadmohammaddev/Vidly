
@extends('master')

@section('content')


<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading text-center">
            <h1>Managing Genres</h1> 
        </div>

        <div class="panel-body">
            <div class="text-center">
                <h2 ><br/> Creating new Genre</h2>
            </div>
            <hr/>

            {{-- Creating New Genre Form --}}
            
            {!! Form::open(['url' => 'genre', 'files' => true]) !!}
            <div class="row">
                <div class="col-6">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="">Name of Genre</span>
                        </div>
                        {!!   Form::text('genre_name', '',['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="col-6">
                    <div class="input-group">
                        <div class="custom-file">                  
                          {!! Form::file('image',['class' => 'custom-file-input', 'type' => 'file', 'id' => 'inputGroupFile04']); !!}
                          <label class="custom-file-label" for="inputGroupFile04">Upload an image</label>
                        </div>
                        <div class="input-group-append">
                          {!! Form::submit('Create',["class"=>"btn btn-info"]);!!}
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}


        </div>{{-- end of body --}}
        <hr/>
        <br/>
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
                    {!! Form::open(['url' => 'genre/'.$genre->id, 'method' => 'put']) !!}
                        <td>
                            {!! Form::text('genre_name', $genre->name); !!}
                        </td>
                        <td>
                            <span class="label label-default">{{ $genre->movies_total }}</span>
                        </td>
                        <td>
                            {!! Form::submit('Update',["class"=>"btn btn-success"]);!!}
                        </td>
                    {!! Form::close() !!}

                        <td>
                            {!! Form::open(['url' => 'genre/'.$genre->id, 'method' => 'delete']) !!}
                                {!! Form::submit('Delete',["class"=>"btn btn-danger"]);!!}                        
                            {!! Form::close() !!}
                        </td>
                </tr>
        
                @endforeach
            </table>
        @endif
            


    </div>
</div>


@endsection