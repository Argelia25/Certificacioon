@extends('layouts.app')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="estilorepo.css">
@section('content')

<div style=" position: absolute; top: 15%; left: 16px;  font-size: 18px;">@include('admin.sidebar')</div>
    <div  style=" position: absolute; top: 15%;  right: 16px; font-size: 18px;"class="container">
        <div class="row">
           

            <div class="col-md-12">
                
                    <center>
                   <h1>Prestamo</h1></center>
                 
    
                    <div class="card-body">
                        <a href="{{ url('/prestamo/create') }}" class="btn btn-success btn-sm" title="Nuevo Prestamo">
                            <i class="material-icons">add</i>Nuevo
                        </a>
                        <a type="button"  href="{{ Route('descargarpdf')}}" class="btn-info btn-sm"><img style="width:30px" src="{{asset('imagenes/impri.png')}}">Informe</a>
                       <br>
                       <br>
            
           
                        <div  style="background-color:rgb(193, 243, 193)"class="table-responsive">
                            <table id="customers">
                                <thead  style="background-color:rgb(76, 160, 76)" class="table-success">
                                    <tr>
                                        <th>Id</th>
                                       <th>Usuario</th>
                                        <th>Libro</th>
                                        <th>Fecha de salida</th>
                                        <th>Fecha de entrada</th>
                                        <th>Editar</th>
                                        <th>Devolucion</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($prestamo as $item)

                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{  $item->Nombre }} {{  $item->Apellido }}</td>
                                      
                                        <td>{{  $item->Titulo }} </td>
                                        <td>{{ $item->Fsalida }} </td>
                                        <td>{{ $item->Fentrada }}</td>
                                      

                                        <td>
                                        <a href="{{ url('/prestamo/' . $item->id . '/edit') }}" title="Edit Prestamo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> <i class="material-icons">edit</i></button></a>
                                        </td>   
                                        <td>
                                            <form method="POST" action="{{ url('/prestamo' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit"  title="Delete Prestamo" onclick="return confirm('Esta seguro de borrar el registro?')"><i class="fa fa-trash-o" aria-hidden="true"></i> <img style="width:30px" src="{{asset('imagenes/devo.png')}}"> </button>
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
        </div>
    </div>
@endsection
