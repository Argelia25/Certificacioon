@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
     

            <div class="col-md-9">
                <div class="card">
                    <div style="background-color:rgb(103, 241, 103)" class="card-header"><h3>Crear nuevo</h3></div>
                    <div style="background-color:rgb(193, 243, 193)" class="card-body">
                     

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/libros') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('libros.form', ['formMode' => 'create'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
