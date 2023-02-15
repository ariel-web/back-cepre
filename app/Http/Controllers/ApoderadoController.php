<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use Illuminate\Http\Request;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $apoderado = Apoderado::create([
            'dni' => $request->dni,
            'carnet_ext' => $request->carnet_ext,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'nombres' => $request->nombres,
            'id_postulante' => $request->id_postulante
          ]);
  
          $this->response['estado'] = true;
          $this->response['datos'] = $apoderado;
          $this->response['mensaje'] = 'Apoderado registrado';
          return response()->json($this->response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function show(Apoderado $apoderado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function edit(Apoderado $apoderado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $apod = Apoderado::find($request->id);
        $apod->update([
            'dni' => $request->dni,
            'carnet_ext' => $request->carnet_ext,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'nombres' => $request->nombres,
            'id_postulante' => $request->id_postulante
        ]);
  
        $this->response['estado'] = true;
        $this->response['datos'] = $apod;
        $this->response['mensaje'] = 'Apoderado Modificado';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $apoderado = Apoderado::find($id);
        $apoderado->delete();

        $this->response['estado'] = true;
        $this->response['datos'] = $apoderado;
        $this->response['mensaje'] = 'Apoderado Eliminado';
        return response()->json($this->response, 200);
    }

    public function getApoderados(Request $request)
    {
        $res = Apoderado::select('*')
            ->where(function ($query) use ($request) {
                return $query
                    ->orWhere('dni', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('nombres', 'LIKE', '%' . $request->term . '%');
            })->paginate(10);

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

}
