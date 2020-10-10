<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use App\Prestamo;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class PrestamoController extends Controller
{
    public function index(Request $request)
    {
        $prestamo = DB::table('prestamos')
        ->join('usuarios', 'usuarios.id', '=', 'prestamos.Usuario')
        ->join('libros', 'libros.id', '=', 'prestamos.Libro')
        ->select('prestamos.id', 'usuarios.Nombre as Nombre', 'usuarios.Apellido as Apellido',  'libros.Titulo  as Titulo',
        'prestamos.Fsalida','prestamos.Fentrada')
        ->where('prestamos.Entregado', '=', 1)
        ->get();

        return view('prestamo.index', compact('prestamo'));
    }
vz<g
  
    public function create()
    {
        $dato1 = DB::table('usuarios')->get();
        $dato2 = DB::table('libros')->get();
        return view('prestamo.create', ['usuarios'=> $dato1,'libros' => $dato2]);
    }

    public function store(Request $request)
    {
        
        
        $datosPrestamo=request()->except('_token');
        $lib=request()->get('Libro');
        
        /**
         * Antes de guardar el registro del prestamo, se busca el libro que
         *  se presta en la base de datos y se le resta una unidad, luego de hacer
         * este procedimiento se registra el prestamo en la base de datos, luego
         * de esto se redirecciona a la pagina de index con el mensaje de Prestamo
         * acreditado exitosamente
         */
        if(DB::table('libros')->where('id', '=', $lib)->decrement('Disponibles', 1)){
            Prestamo::insert($datosPrestamo);
        } 
        return redirect('prestamo')->with('flash_message', 'Prestamo Registrado con Exito');
    }


    public function show($id)
    {
        $prestamo = Prestamo::findOrFail($id);

        return view('prestamo.show', compact('prestamo'));
    }


    public function edit($id)
    {
        $dato1 = DB::table('Usuarios')->get();
         $dato2 = DB::table('Libros')->get();
        $prestamo = Prestamo::findOrFail($id);

        return view('prestamo.edit', ['usuarios'=> $dato1,'libros' => $dato2], compact('prestamo'));
    }

  
    public function update(Request $request, $id)
    {
        $Prestamo=request()->except(['_token','_method']);
        Prestamo::where('id', '=', $id)->update($Prestamo);
      

        return redirect('prestamo')->with('flash_message', 'Prestamo Actualizado!');
    }

    public function destroy($id)
    {
        if($info=(Prestamo::findOrFail($id))){
            //Luego de econtrar el registro, se incremente el numero de disponibles del libro
            DB::table('libros')->where('id', '=', $info->Libro)->increment('Disponibles', 1);

            //Luego de aumentar el numero de libros, se desactivara el registro de prestamos
            DB::table('prestamos')->where('id', '=', $info->id)->decrement('Entregado', 1);
        }
     

        return redirect('prestamo')->with('flash_message', 'Prestamo cocluidoS!');
    }
}
