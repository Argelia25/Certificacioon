@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="estilorepo.css">
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                
                    <Center>
                        <h1>Usuario</h1>
                     </Center>
                    <div class="card-body">
                        <a href="{{ url('/usuario/create') }}" class="btn btn-success btn-sm" title="Agregar nuevo Usuario">
                            <i class="material-icons">add</i>Nuevo
                        </a>
                         <br/>
                        <br/>
                        <div style="background-color:rgb(193, 243, 193)" class="table-responsive">
                            <table  id="customers">
                                <thead  style="background-color:rgb(76, 160, 76)" class="table-success">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Editar</th>
                                         <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuario as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Nombre }}</td>
                                        <td>{{ $item->Apellido }}</td>
                                        <td>{{ $item->Correo }}</td>
                                        <td>
                                        <a href="{{ url('/usuario/' . $item->id . '/edit') }}" title="Editar Usuario"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><i class="material-icons">edit</i></button></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('/usuario' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Usuario" onclick="return confirm('Esta seguro de borrar el registro?')"><i class="fa fa-trash-o" aria-hidden="true"></i><i class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $usuario->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                
            </div>
        </div>
    </div>
@endsection
