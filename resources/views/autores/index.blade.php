@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="estilorepo.css">
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                xgh
                    <Center>
                        <h1>Autores</h1>
                     </Center>

                
                        <a href="{{ url('/autores/create') }}" class="btn btn-success btn-sm" title="Add New Autore">
                            <i class="material-icons">add</i>Nuevo
                        </a>

                        <form method="GET" action="{{ url('/autores') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i "material-icons"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div style="background-color:rgb(193, 243, 193)" class="table-responsive">
                            <table id="customers">
                                <thead  style="background-color:rgb(76, 160, 76)" class="table-success">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($autores as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Nombre }}</td>
                                        <td>{{ $item->Apellido }}</td>
                                        <td>
                                             <a href="{{ url('/autores/' . $item->id . '/edit') }}" title="Edit Autore"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <i class="material-icons">edit</i></button></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('/autores' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Autore" onclick="return confirm('ESta seguro de eliminar este dato?')"><i class="fa fa-trash-o" aria-hidden="true"></i> <i class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $autores->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    
            </div>
        </div>
    </div>
@endsection
