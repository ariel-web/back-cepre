<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Postulante;
use Illuminate\Http\Request;

class ColegioController extends Controller
{
    protected $response;
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
        $colegio = Colegio::create([
            'cod_modular' => $request->cod_modular,
            'nombre' => $request->nombre,
            'ubigeo' => $request->ubigeo,
            'cod_ugel' => $request->cod_ugel,
            'cod_local' => $request->cod_local,
            'direccion' => $request->direccion,
            'nivel_modalidad' => $request->nivel_modalidad,
            'gestion' => $request->gestion,
            'dependencia' => $request->dependencia,
          ]);
  
          $this->response['estado'] = true;
          $this->response['datos'] = $colegio;
          $this->response['mensaje'] = 'Colegio registrado';
          return response()->json($this->response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function show(Colegio $colegio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function edit(Colegio $colegio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $colegio = Colegio::find($request->id);
        $colegio->update([
            'cod_modular' => $request->cod_modular,
            'nombre' => $request->nombre,
            'ubigeo' => $request->ubigeo,
            'cod_ugel' => $request->cod_ugel,
            'cod_local' => $request->cod_local,
            'direccion' => $request->direccion,
            'nivel_modalidad' => $request->nivel_modalidad,
            'gestion' => $request->gestion,
            'dependencia' => $request->dependencia,
        ]);
  
        $this->response['estado'] = true;
        $this->response['datos'] = $colegio;
        $this->response['mensaje'] = 'Colegio Modificado';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Colegio  $colegio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $colegio = Postulante::find($id);
        $colegio->delete();

        $this->response['estado'] = true;
        $this->response['datos'] = $colegio;
        $this->response['mensaje'] = 'Colegio Eliminado';
        return response()->json($this->response, 200);
    }

    public function getColegios(Request $request)
    {
        $res = Colegio::select('*')
            ->where(function ($query) use ($request) {
                return $query
//                    ->orWhere('dni', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('nombre', 'LIKE', '%' . $request->term . '%');
            })->paginate(10);

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

}
