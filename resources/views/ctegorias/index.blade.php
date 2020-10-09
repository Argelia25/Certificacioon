@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="estilorepo.css">
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
               
                <Center>
                    <h1>Tipos de categorias</h1>
                 </Center>
  
                    <div class="card-body">
                        <a href="{{ url('/ctegorias/create') }}" class="btn btn-success btn-sm" title="Nueva Categoria">
                            <i class="material-icons">add</i>Nuevo
                        </a>

                        <form method="GET" action="{{ url('/ctegorias') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
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
                                        <th>Categoria</th>
                                       <th>Editar</th>
                                       <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($ctegorias as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->Categoria }}</td>
                                        <td>
                                            <a href="{{ url('/ctegorias/' . $item->id . '/edit') }}" title="Edit Ctegoria"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><i class="material-icons">edit</i></button></a>
                                        </td>
                                            <td>
                                            <form method="POST" action="{{ url('/ctegorias' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Ctegoria" onclick="return confirm('Esta seguro de eliminar el dato?')"><i class="fa fa-trash-o" aria-hidden="true"></i><i class="material-icons">delete</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $ctegorias->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                
            </div>
        </div>
    </div>
@endsection
