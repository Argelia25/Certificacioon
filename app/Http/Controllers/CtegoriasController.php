<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Ctegoria;
use Illuminate\Http\Request;

class CtegoriasController extends Controller
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
            $ctegorias = Ctegoria::where('Categoria', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ctegorias = Ctegoria::latest()->paginate($perPage);
        }

        return view('ctegorias.index', compact('ctegorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ctegorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Ctegoria::create($requestData);

        return redirect('ctegorias')->with('flash_message', 'Ctegoria added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $ctegoria = Ctegoria::findOrFail($id);

        return view('ctegorias.show', compact('ctegoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $ctegoria = Ctegoria::findOrFail($id);

        return view('ctegorias.edit', compact('ctegoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $ctegoria = Ctegoria::findOrFail($id);
        $ctegoria->update($requestData);

        return redirect('ctegorias')->with('flash_message', 'Ctegoria updated!');
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
        Ctegoria::destroy($id);

        return redirect('ctegorias')->with('flash_message', 'Ctegoria deleted!');
    }
}
