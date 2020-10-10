<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Autore;
use Illuminate\Http\Request;

class AutoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $autores = Autore::where('Nombre', 'LIKE', "%$keyword%")
                ->orWhere('Apellido', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $autores = Autore::latest()->paginate($perPage);
        }

        return view('autores.index', compact('autores'));
    }

    
    public function create()
    {
        return view('autores.create');
    }

  
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Autore::create($requestData);

        return redirect('autores')->with('flash_message', 'Autore added!');
    }

  
    public function show($id)
    {
        $autore = Autore::findOrFail($id);

        return view('autores.show', compact('autore'));
    }

  
    public function edit($id)
    {
        $autore = Autore::findOrFail($id);

        return view('autores.edit', compact('autore'));
    }

    
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $autore = Autore::findOrFail($id);
        $autore->update($requestData);

        return redirect('autores')->with('flash_message', 'Autore updated!');
    }

    public function destroy($id)
    {
        Autore::destroy($id);

        return redirect('autores')->with('flash_message', 'Autore deleted!');
    }
}
