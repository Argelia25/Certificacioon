@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="estilorepo.css">
@section('content')
    <div class="container">
        <div class="row">
         
            @include('admin.sidebar')
            <div class="col-md-9">
              
                    <Center>
                        <h1>Editoriales</h1>
                     </Center
                    <div class="card-body">
                        <div>
                        <a href="{{ url('/editorial/create') }}" class="btn btn-success btn-sm" title="Nueva Editorial">
                            <i class="material-icons">add</i>Nuevo
                        </a></div>

                
                        <br/>
                        <div style="background-color:rgb(193, 243, 193)"class="table-responsive">
                            <table id="customers">
                                <thead  style="background-color:rgb(76, 160, 76)" class="table-success">
                                    <tr>
                                        <th>Id</th>
                                        <th>Editorial</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($editorial as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Editorial }}</td>
                                        <td>
                                            <a href="{{ url('/editorial/' . $item->id . '/edit') }}" title="Edit Editorial"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><i class="material-icons">edit</i></button></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('/editorial' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Editorial" onclick="return confirm('Esta seguro de eliminar el dato?')"><i class="fa fa-trash-o" aria-hidden="true"></i> <i class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $editorial->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
               
            </div>
        </div>
    </div>
@endsection
