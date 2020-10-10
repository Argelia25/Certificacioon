<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\Libro;
use Illuminate\Http\Request;


class LibrosController extends Controller
{
      

       //Funcion para mostrar el inicio 
    public function index(Request $request)
    {
          /**
         * Se guardan los datos de los libros en la variable de "libros" que sale de la tabla libros
         * a la cual se le aplica un join con la tabla editorial,
         * otro join con la tabla autores, y un ultimo join con la tabla categorias,
         * luego se seleccionan los datos que se quieren guardar en la variable
         */

        $libros = DB::table('libros')
        ->join('editorials', 'editorials.id', '=', 'libros.Editorial_id')
        ->join('autores', 'autores.id', '=', 'libros.Autor_id')
        ->join('ctegorias', 'ctegorias.id', '=', 'libros.Categoria_id')
        ->select('libros.id','libros.Titulo', 'editorials.Editorial as edit', 'autores.Nombre as Autor',  'ctegorias.Categoria as cat',
        'libros.paginas', 'libros.Disponibles', 'libros.Idioma','Libros.Foto')
        ->get();

       
        //Se redirige a la pagina de index con los datos de libros
        return view('libros.index',  compact('libros'));
    }

    
      //La funcion de crear redirige al usuario a la pagina con el formulario de creacion, en este caso con datos
    public function create()
    {
        //Se mandan los datos de la tabla Editoriales para su uso en un select del formulario de creacion
        $dato1 = DB::table('editorials')->get();
        //Se mandan los datos de la tabla Autores para su uso en un select del formulario de creacion
        $dato2 = DB::table('autores')->get();
        //Se mandan los datos de la tabla categorias para su uso en un select del formulario de creacion
        $dato3 = DB::table('ctegorias')->get();

         //Se redirecciona al formulario de creacion con los datos de 3 tablas para usarlos en selects del formulario
        return view('libros.create', ['editoriales'=> $dato1,'autores' => $dato2,'ctegorias'=> $dato3]);
    }

    //La funcion store es la encargada de recibir los datos y almacenarlos dentro de la base de datos
    public function store(Request $request)
    {
         //Guardamos los datos que se nos envio desde el formulario si pasaron la validacion(En el formulario) en la variable datoslibro exceptuando el token
        $requestData = $request->except('_token');
                if ($request->hasFile('Foto')) {
            $requestData['Foto'] = $request->file('Foto')
                ->store('uploads', 'public');
        }
   /**
         * Si se cumplio con las instrucciones anteriores se procede a la tabla Libros de la base de datos y
         * se inserta los datos de la variable datosLibro, luego se redirecciona a la pagina de index con el mensaje
         * de Libro agregado con exito
         */
        Libro::insert($requestData);
        return redirect('libros')->with('Mensaje', 'El libro se agrego con exito');
    }


    //La funcion show se utiliza para mostrar informacion de un registro si es extensa, este no es el caso
    public function show($id)
    {
        $libro = Libro::findOrFail($id);

        return view('libros.show', compact('libro'));
    }
 
     //La funcion edit busca un registro especifico de la base de datos y actualiza sus datos con los
    // del formulario de edicion
    public function edit($id)
    {
       
         //Se mandan los datos de la tabla Editoriales para su uso en un select del formulario de creacion
        $dato1 = DB::table('editorials')->get();
         //Se mandan los datos de la tabla Autores para su uso en un select del formulario de creacion
        $dato2 = DB::table('autores')->get();
         //Se mandan los datos de la tabla Categorias para su uso en un select del formulario de creacion
        $dato3 = DB::table('ctegorias')->get();
         /**
         * Luego de buscar los datos para los select que se mostraran a la hora de editar en el formulario
         * Se buscara el registro en la base de datos con el ID que se mando del formulario 
         */
        $libro = Libro::findOrFail($id);
       //Cuando se encontro el registro se compactan los datos y se redireciona a la pagina de edicion
        return view('libros.edit',  ['editoriales'=> $dato1,'autores' => $dato2,  'ctegorias'=> $dato3], compact('libro'));
    }

  //Luego de editar los datos se mandan a la funcion de actualizacion que recibe los datos del  formualrio y el Id del registro a actualizar
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('Foto')) {
            $requestData['Foto'] = $request->file('Foto')
                ->store('uploads', 'public');
        }

        $libro = Libro::findOrFail($id);
        $libro->update($requestData);

        return redirect('libros')->with('flash_message', 'Libro updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Libro::destroy($id);

        return redirect('libros')->with('flash_message', 'Libro deleted!');
    }
}
