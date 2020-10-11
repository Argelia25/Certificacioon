<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\Prestamo;

class reporteController extends Controller {

    public function PDFprestamo() {
 
        $prestamo= prestamo :: select('prestamos.id', 'usuarios.Nombre as Nombre', 'usuarios.Apellido as Apellido', 'libros.Titulo  as Titulo',
        'prestamos.Fsalida','prestamos.Fentrada')
        ->join('usuarios', 'usuarios.id', '=', 'prestamos.Usuario')
        ->join('libros', 'libros.id', '=', 'prestamos.Libro')
        ->get();
        $pdf = PDF ::loadView('reporte', compact('prestamo'));
       return $pdf->stream('reporte.pdf');
        
    } 
 
}
cvyhkvyih