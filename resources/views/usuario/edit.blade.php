@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div style="background-color:rgb(103, 241, 103)"  class="card-header"><h1>Editar Usuario #{{ $usuario->id  }}</h1></div>

                    <d
                    <div  style="background-color:rgb(193, 243, 193)"class="card-body">
                        <form method="POST" action="{{ url('/usuario/' . $usuario->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('usuario.form', ['formMode' => 'editar'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
