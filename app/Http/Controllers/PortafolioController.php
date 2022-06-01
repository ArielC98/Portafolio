<?php

namespace App\Http\Controllers;
use App\Models\Portafolio;
use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portafolios = Portafolio::all();

        return view('portafolio.index',compact('portafolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('portafolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Portafolio::create([
            'nombre'=> request('nombre'),
            'descripcion'=> request('descripcion'),
            'categoria'=> request('categoria'),
            'imagen'=> request('imagen'),
            'url'=> request('video')
        ]);

        return redirect()->route('portafolio');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portafolio = Portafolio::find($id);

        return view('portafolio.show',compact('portafolio'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portafolio = Portafolio::find($id);

        return view('portafolio.edit',compact('portafolio'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Portafolio $portafolio)
    {
        $portafolio->update([
            'nombre'=> request('nombre'),
            'descripcion'=> request('descripcion'),
            'categoria'=> request('categoria'),
            'imagen'=> request('imagen'),
            'url'=> request('video')
        ]);

        return redirect()->route('show',$portafolio);
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function destroy(Portafolio $portafolio)
        {
            $portafolio ->delete();
            return redirect()->route('portafolio');
        }
    
    
}

