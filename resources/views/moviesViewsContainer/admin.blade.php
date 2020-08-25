
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

                        <td class="text-center">
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