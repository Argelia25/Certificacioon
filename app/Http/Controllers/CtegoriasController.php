<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Ctegoria;
use Illuminate\Http\Request;

class CtegoriasController extends Controller
{
   
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ctegorias = Ctegoria::where('Categoria', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ctegorias = Ctegoria::latest()->paginate($perPage);
        }

        return view('ctegorias.index', compact('ctegorias'));
    }

  
    public function create()
    {
        return view('ctegorias.create');
    }

  
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Ctegoria::create($requestData);

        return redirect('ctegorias')->with('flash_message', 'Ctegoria added!');
    }

   
    public function show($id)
    {
        $ctegoria = Ctegoria::findOrFail($id);

        return view('ctegorias.show', compact('ctegoria'));
    }

  
    public function edit($id)
    {
        $ctegoria = Ctegoria::findOrFail($id);

        return view('ctegorias.edit', compact('ctegoria'));
    }

    
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $ctegoria = Ctegoria::findOrFail($id);
        $ctegoria->update($requestData);

        return redirect('ctegorias')->with('flash_message', 'Ctegoria updated!');
    }

 
    public function destroy($id)
    {
        Ctegoria::destroy($id);

        return redirect('ctegorias')->with('flash_message', 'Ctegoria deleted!');
    }
}
