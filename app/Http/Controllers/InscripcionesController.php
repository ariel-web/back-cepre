<?php

namespace App\Http\Controllers;

use App\Models\Inscripciones;
use App\Models\PreIsncripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;
use Dompdf\Options;


class InscripcionesController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function show(Inscripciones $inscripciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Inscripciones $inscripciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inscripciones $inscripciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inscripciones  $inscripciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inscripciones $inscripciones)
    {
        //
    }

    public function getPostulantebyDNI($dni){
        $res = DB::select('select * from postulantes 
        JOIN pre_inscripcion ON postulantes.id = pre_inscripcion.id_postulante
        LEFT JOIN programa_de_estudios ON pre_inscripcion.id_programa_estudios = programa_de_estudios.id
        where nro_doc = '.$dni.' ;');

        $this->response['estado'] = false;
        $this->response['datos'] = $res;
        $this->response['error'] = $th->getMessage();

    }
    
    public function constanciaInscripcion($dni){

        $res = DB::select('SELECT pre_inscripcion.id as prei, programa_de_estudios.id as idp, programa_de_estudios.nombre AS programa, 
        postulantes.id as ide, postulantes.nro_doc, postulantes.primer_apellido, postulantes.segundo_apellido, postulantes.nombres, postulantes.foto_url
        FROM pre_inscripcion
        JOIN programa_de_estudios ON programa_de_estudios.id = pre_inscripcion.id_programa_estudios 
        JOIN postulantes ON pre_inscripcion.id_postulante = postulantes.id 
        WHERE postulantes.nro_doc = '.$dni.';');

        $q=[];

        $q = DB::select('SELECT inscripciones.id_postulante FROM inscripciones
        WHERE inscripciones.id_postulante IN (SELECT id FROM postulantes WHERE nro_doc = '.$dni.');');


        if(count($q) === 0 ){
            $inscribir = Inscripciones::create([
                'id_postulante' => $res[0]->ide,
                'id_programa' => $res[0]->idp,
                'id_usuario' => 1,
                'estado' => 1,
            ]);
    
            $pre = PreIsncripcion::find($res[0]->prei);
            $pre['estado'] = 1; 

            $pre->save();
        } 




        $fecha = date('d-m-Y');
        $datos = $res[0];


        $pdf = PDF::loadView('/Inscripciones/constancia', compact('datos','fecha'));
        // $pdf->stream($codigo);
        // $pdf->output();
        $pdf->setPaper('A4', 'portrait');
        //$output = $pdf->output();
        return $pdf->download('mi-constancia-de-inscripcion.pdf');
    
    }


    public function constanciaInscripcion2($dni){

        $res = DB::select('SELECT pre_inscripcion.id as prei, programa_de_estudios.id as idp, programa_de_estudios.nombre AS programa, 
        postulantes.id as ide, postulantes.nro_doc, postulantes.primer_apellido, postulantes.segundo_apellido, postulantes.nombres, postulantes.foto_url
        FROM pre_inscripcion
        JOIN programa_de_estudios ON programa_de_estudios.id = pre_inscripcion.id_programa_estudios 
        JOIN postulantes ON pre_inscripcion.id_postulante = postulantes.id 
        WHERE postulantes.nro_doc = '.$dni.';');

        $q=[];

        $q = DB::select('SELECT inscripciones.id_postulante FROM inscripciones
        WHERE inscripciones.id_postulante IN (SELECT id FROM postulantes WHERE nro_doc = '.$dni.');');


        if(count($q) === 0 ){
            $inscribir = Inscripciones::create([
                'id_postulante' => $res[0]->ide,
                'id_programa' => $res[0]->idp,
                'id_usuario' => 1,
                'estado' => 1,
            ]);
    
            $pre = PreIsncripcion::find($res[0]->prei);
            $pre['estado'] = 1; 

            $pre->save();
        } 




        $fecha = date('d-m-Y');
        $datos = $res[0];

        $pdf = PDF::loadView('/inscripciones/constancia', compact('datos','fecha'));
        //$pdf->stream($codigo);
        //$pdf->output();
        $pdf->setPaper('A4', 'portrait');
        //$output = $pdf->output();
        return $pdf->download('mi-constancia-de-inscripcion.pdf');
    
    }


    // public function Postulantes{


    //     SELECT modalidades.nombre AS modalidades, programa_de_estudios.nombre AS programa, 
	// 	postulantes.nro_doc, postulantes.primer_apellido, postulantes.segundo_apellido, postulantes.nombres, postulantes.foto_url
    //     FROM inscripciones
    //     JOIN programa_de_estudios ON programa_de_estudios.id = inscripciones.id_programa 
    //     JOIN modalidades ON inscripciones.id = modalidades.id
    //     JOIN postulantes ON inscripciones.id_postulante = postulantes.id 
    //     WHERE postulantes.nro_doc = '70757838';
    //}

    public function getInscritos($request) {
        // $query_where = [];
        // if ($request->rol) array_push($query_where, ['users.rol', '=', $request->rol]);
        // if ($request->oficina) array_push($query_where, ['oficina.iduoper', '=', $request->oficina]);
        //if ($request->area) array_push($query_where, ['area.id', '=', $request->area]);
        //DB::raw("CONCAT( hor_inicio , ' - ' , hor_fin) as horario")
        $res = Inscripciones::select(
            'modalidades.nombre AS modalidades','programa_de_estudios.nombre AS programa', 'postulantes.nro_doc', 'postulantes.primer_apellido', 'postulantes.segundo_apellido', 'postulantes.foto_url', 'inscripciones.estado'  
        )
            ->leftjoin('programa_de_estudios', 'programa_de_estudios.id', '=', 'inscripciones.id_programa')
            ->leftjoin('modalidades', 'inscripciones.id', '=', 'modalidades.id')
            ->leftjoin('postulantes', 'inscripciones.id_postulante', '=', 'postulantes.id')
            //->where('bienk.id_area', $request->area)
           // ->where($query_where)
            ->where(function ($query) use ($request) {
                return $query
                    ->orWhere('postulantes.nombres', 'LIKE', '%' . $request. '%')
                    ->orWhere('postulantes.primer_apellido', 'LIKE', '%' . $request . '%')
                    ->orWhere('postulantes.segundo_apellido', 'LIKE', '%' . $request . '%')
                    ->orWhere('postulantes.nro_doc', 'LIKE', '%' . $request . '%');
            })
            ->paginate(10);

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }


    public function inscribir(Request $request) {

        $inscribir = Inscripciones::create([
            'id_postulante' => $request->id_postulante,
            'id_programa' => $request->id_programa,
            'id_usuario' => 1,
          ]);
  
          $this->response['estado'] = true;
          $this->response['datos'] = $inscribir;
          $this->response['mensaje'] = 'Postulante registrado';
          return response()->json($this->response, 200);

    }


    public function getPostulantesInscritos(Request $request){

        $res = PreIsncripcion::select(
            'programa_de_estudios.nombre as programa',
            'postulantes.nro_doc',
            'postulantes.primer_apellido',
            'postulantes.segundo_apellido',
            'postulantes.nombres',
            'pre_inscripcion.estado'
        )
            ->join('programa_de_estudios', 'programa_de_estudios.id', '=', 'pre_inscripcion.id_programa_estudios')
            ->join('postulantes', 'pre_inscripcion.id_postulante', '=', 'postulantes.id')
            ->where(function ($query) use ($request) {
                return $query
                    ->orWhere('postulantes.nro_doc', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('postulantes.nombres', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('postulantes.primer_apellido', 'LIKE', '%' . $request->term . '%');
                })->orderBy('pre_inscripcion.id', 'DESC')
                ->paginate(10);

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }


    public function constanciaIngresante($dni)
    {

        $res = DB::select('select * from ingresantes where dni =' . $dni . ';');

        $fecha = date('d-m-Y');
        $datos = $res[0];

        $pdf = PDF::loadView('/PreInscripcion/constancia', compact('datos', 'fecha'));
        $pdf->setPaper('A4', 'portrait');
        //$output = $pdf->output();
        
        $pdf->output();
        $output = $pdf->output();
        file_put_contents(public_path().'/documentos/ingresantes/'.$dni.'.pdf', $output);
        return $pdf->download('mi-constancia-de-inscripcion.pdf');

    }





    public function getPostulantesInscritosDni($dni){

        return $res =DB::insert('SELECT  
        programa_de_estudios.nombre AS programa, 
        postulantes.nro_doc, postulantes.primer_apellido, postulantes.segundo_apellido, postulantes.nombres,
        pre_inscripcion.estado
        FROM pre_inscripcion
        JOIN programa_de_estudios ON programa_de_estudios.id = pre_inscripcion.id_programa_estudios 
        JOIN postulantes ON pre_inscripcion.id_postulante = postulantes.id 
        WHERE postulantes.nro_doc = '.$dni.';');

        $this->response['estado'] = true;
        $this->response['datos'] = $res[0];
        return response()->json($this->response, 200);
    }



    public function getPuntaje($dni){
        $res = DB::select('SELECT dni, paterno, materno, nombres, puntaje, apto as ingreso, programa FROM resultados WHERE dni = '.$dni.';');

        $this->response['estado'] = true;
        $this->response['datos'] = $res[0];
        return response()->json($this->response, 200);
    }

    
    public function getPuntajeCepre($dni){
        $res = DB::select('SELECT dni, paterno, materno, nombres, puntaje, apto as ingreso, programa FROM resultados WHERE dni = '.$dni.';');

        $this->response['estado'] = true;
        $this->response['datos'] = $res[0];
        return response()->json($this->response, 200);
    }


}