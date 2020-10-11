<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="estilorepo.css">
@extends('layouts.app')

@section('content')
           


   <div style=" position: absolute; top: 15%; left: 16px;  font-size: 18px;">@include('admin.sidebar')</div>

    <div  style=" position: absolute; top: 15%;  right: 16px; font-size: 18px;" class="container">
   
        
        <div class="row">
         
xzdbfgb
            <div class="col-md-12">
               <Center>
                  <h1>Libros</h1>
               </Center>

                       <div style="right:16px;"> <a href="{{ url('/libros/create') }}" class="btn btn-success btn-sm" title="Nuevo Libro">
                            <i class="material-icons">add</i>Nuevo
                        </a></div>

                        <br/>
                        <div  style="background-color:rgb(193, 243, 193)"class="table-responsive">
                            <table  id="customers">
                                <thead  style="background-color:rgb(76, 160, 76)" class="table-success">
                                    <tr>
                                        <th>Id</th>
                                         <th>Imagen</th>
                                        <th>Titulo</th>
                                        <th>Autor</th>
                                        <th>Editorial</th>
                                         <th>Categoria</th>
                                        <th>Paginas</th>
                                        <th>Disponibles</th>
                                         <th>Idioma</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($libros as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="http://localhost/Certificacion/storage/app/public{{'/'.$item->Foto}}" class="img-thumbnail img-fluid" height="60" width="60" >
                                        <td>{{ $item->Titulo }}</td>
                                        <td>{{ $item->Autor}}</td>
                                        <td>{{ $item->edit }}</td>
                                        <td>{{ $item->cat }}</td>
                                        <td>{{ $item->paginas }}</td>
                                        <td>{{ $item->Disponibles }}</td>
                                        <td>{{ $item->Idioma }}</td>
                                        <td>
                                            <a href="{{ url('/libros/' . $item->id . '/edit') }}" title="Edit Libro"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></i><i class="material-icons">edit</i></button></a>
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ url('/libros' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Libro" onclick="return confirm(Esta seguro de eliminar el dato?)"><i class="fa fa-trash-o" aria-hidden="true"></i></i><i class="material-icons">deletes</i></button>
                                            </form>
                                        </td>
                                    </tr>
                                     
                                @endforeach
                                </tbody>
                            </table>

                        </div>

                    
                
            </div>
        </div>
    </div>
@endsection
