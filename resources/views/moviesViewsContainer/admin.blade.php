
@extends('adminMaster')

@section('content')


<div class="container">

    <div class="panel panel-default">
        <div class="panel-heading text-center mt-1">
            <h1>Managing Genres</h1> 
        </div>

        <div class="panel-body">
            <div class="text-center">
                <h2> Creating new Genre</h2>
            </div>
            <hr/>

            {{-- SHowing Errors for input fields if any --}}
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

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

        <div class="text-center mt-5">
            <h2> Editing Existing Genre</h2>
        </div>
        <br/>
        @if($genres != null)
            <table class="table">
                <tr>
                    <th><h3>Genre Name</h3></th>
                    <th class="text-center"><h3>Total Movies</h3></th>
                    <th class="text-center"><h3>Update</h3></th>
                    <th class="text-center"><h3>Delete</h3></th>
                    <th class="text-center"></th>
                </tr>
                    
                @foreach($genres as $genre)
                <!-- TabLe -->
                @if($genre->trashed())
                    <tr style="background-color:#CA3C3C">
                @else
                    <tr style="background-color:#fff">
                @endif
                    {!! Form::open(['url' => 'genre/'.$genre->id, 'method' => 'put']) !!}
                        <td>
                            {!! Form::text('genre_name', $genre->name, ['class' => 'form-control']); !!}
                        </td>
                        <td class="text-center">
                            <span class="label label-default">{{ $genre->movies_total }}</span>
                        </td>
                        <td class="text-center">
                            {!! Form::submit('Update',["class"=>"btn btn-success"]);!!}
                        </td>
                    {!! Form::close() !!}

                        @if($genre->trashed())
                            <td class="text-center">
                                {!! Form::open(['url' => 'genre/delete-forever/'.$genre->id]) !!}
                                    {!! Form::submit('Delete forever',["class"=>"btn btn-danger"]);!!}                        
                                {!! Form::close() !!}
                            </td>
                        @else
                            <td class="text-center">
                                {!! Form::open(['url' => 'genre/'.$genre->id, 'method' => 'delete']) !!}
                                    {!! Form::submit('Delete',["class"=>"btn btn-danger"]);!!}                        
                                {!! Form::close() !!}
                            </td>

                            <td class="text-center">
                                <a href="genre/{{$genre->id}}" class="btn btn-light">Show</a>
                            </td>
                        @endif

                        @if($genre->trashed())
                            <td class="text-center">
                                {!! Form::open(['url' => 'genre/restore/'.$genre->id]) !!}
                                    {!! Form::submit('Restore',["class"=>"btn btn-light"]);!!}                        
                                {!! Form::close() !!}
                            </td>                        
                        @endif


                </tr>
        
                @endforeach
            </table>
        @endif
            


    </div>
</div>


@endsection