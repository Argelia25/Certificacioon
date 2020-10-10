<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
   <link rel="stylesheet" href="estilorepo.css">
</head>
<body>
    <header>
        <img style="width:30%" src="{{asset('imagenes/L1.png')}}">
    </header>
  
    <center>
    <div class="container">
       <h3> Reporte de prestamo</h3>
        <table id="customers">
            <thead style="background-color:rgb(76, 160, 76)"class="table-success">
                <tr>
                    <th>Id</th>
                   <th>Lector</th>
                    <th>Libro</th>
                    <th>Fecha de salida</th>
                    <th>Fecha de entrada</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($prestamo  as $prestamo)

                    <tr>
                        <td>{{ $prestamo->id }}</td>
                        <td>{{  $prestamo->Nombre }} {{  $prestamo->Apellido }} </td>
                        <td>{{  $prestamo->Titulo }} </td>
                        <td>{{ $prestamo->Fsalida }} </td>
                        <td>{{ $prestamo->Fentrada }}</td>
                        
                    </tr>
                   
                @endforeach
                </tbody>
        </table>
    </div>
</center>
<footer>
    <p>San <Label>uis Jilotepeque, Jalapa</Label></p>
</footer>
</body>
</html>