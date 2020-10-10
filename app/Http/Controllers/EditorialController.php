<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Editorial;
use Illuminate\Http\Request;

class EditorialController extends Controller
{
   
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $editorial = Editorial::where('Editorial', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $editorial = Editorial::latest()->paginate($perPage);
        }

        return view('editorial.index', compact('editorial'));
    }

    
    public function create()
    {
        return view('editorial.create');
    }

    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        Editorial::create($requestData);

        return redirect('editorial')->with('flash_message', 'Editorial added!');
    }

    public function show($id)
    {
        $editorial = Editorial::findOrFail($id);

        return view('editorial.show', compact('editorial'));
    }

   
    public function edit($id)
    {
        $editorial = Editorial::findOrFail($id);

        return view('editorial.edit', compact('editorial'));
    }

    
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $editorial = Editorial::findOrFail($id);
        $editorial->update($requestData);

        return redirect('editorial')->with('flash_message', 'Editorial updated!');
    }

   
    public function destroy($id)
    {
        Editorial::destroy($id);

        return redirect('editorial')->with('flash_message', 'Editorial deleted!');
    }
}
