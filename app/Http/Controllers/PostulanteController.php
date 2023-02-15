<?php

namespace App\Http\Controllers;

use App\Models\Postulante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "HELLOW";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $postulante = Postulante::create([
            'tipo_doc' => $request->tipo_doc,
            'dni' => $request->dni,
            'carnet_ext' => $request->carnet_ext,
            'paterno' => $request->paterno,
            'materno' => $request->materno,
            'nombres' => $request->nombres,
            'celular' => $request->celular,
            'estado_civil' => $request->estado_civil,
            'direccion' => $request->direccion,
            'fec_nacimiento' => $request->fec_nacimiento,
            'ubigeo_nacimiento' => $request->ubigeo_nacimiento,
            'ubigeo_residencia' => $request->ubigeo_residencia,
            'anio_egreso' => $request->anio_egreso,
            'id_colegio' => $request->id_colegio,
            'id_apoderado' => $request->id_apoderado,
            'clave_seguridad'=> $request->clave_seguridad
          ]);
  
          $this->response['estado'] = true;
          $this->response['datos'] = $postulante;
          $this->response['mensaje'] = 'Postulante registrado';
          return response()->json($this->response, 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function show(Postulante $postulante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function edit(Postulante $postulante)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $postulante)
    {
        $post = Postulante::find($postulante->id);
        $post->update([
            'nombres' => $postulante->nombres
        ]);
  
        $this->response['estado'] = true;
        $this->response['datos'] = $postulante;
        $this->response['mensaje'] = 'Postulante Modificado';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Postulante  $postulante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $postulante = Postulante::find($id);

        $postulante->delete();

        $this->response['estado'] = true;
        $this->response['datos'] = $postulante;
        $this->response['mensaje'] = 'Postulante Eliminado';
        return response()->json($this->response, 200);
    }


    public function getPostulantes(Request $request)
    {
        $res = Postulante::select('*')
            ->where(function ($query) use ($request) {
                return $query
                    ->orWhere('dni', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('nombres', 'LIKE', '%' . $request->term . '%');
            })->paginate(10);

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

    public function getPostulanteDdni($dni){
        $comprobantes = DB::select('SELECT * FROM comprobantes WHERE comprobantes.codigo_seguridad_pre IN (SELECT codigo_seguridad FROM pre_inscripcion 
        WHERE id_postulante  IN (SELECT id FROM postulantes WHERE nro_doc = '.$dni.'));');
        $res = DB::select('SELECT postulantes.*, colegios.nombre AS colegio, colegios.id AS idC from postulantes
        JOIN colegios ON colegios.id = postulantes.id_colegio where nro_doc = '.$dni);
        $apoderados = DB::select('SELECT * from apoderados
        WHERE id_postulante IN ( SELECT id FROM postulantes where postulantes.nro_doc = '.$dni.')');
        $residencia = DB::select('SELECT postulantes.direccion, ubigeo_residencia AS ubigeo,
        SUBSTRING(ubigeo_residencia,1,2) AS dep, 
        SUBSTRING(ubigeo_residencia,3,2) AS prov
        FROM postulantes where postulantes.nro_doc = '.$dni.';');

        $this->response['estado'] = true;
        $this->response['datos'] = $res[0];
        $this->response['apoderados'] = $apoderados;
        $this->response['comprobantes'] = $comprobantes;
        $this->response['residencia'] = $residencia[0];
        return response()->json($this->response, 200);
        
    }

}
