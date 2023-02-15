<?php

namespace App\Http\Controllers;

use App\Models\Constancia;
use Illuminate\Http\Request;
use PDF;
use Dompdf\Options;
use Illuminate\Support\Facades\File;

class ConstanciaController extends Controller
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
        $constancia = Constancia::create([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'url' => $request->url,
            'id_postulante' => $request->id_postulante,
          ]);
  
          $this->response['estado'] = true;
          $this->response['datos'] = $constancia;
          $this->response['mensaje'] = 'Constancia registrada';
          return response()->json($this->response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Constancia  $constancia
     * @return \Illuminate\Http\Response
     */
    public function show(Constancia $constancia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Constancia  $constancia
     * @return \Illuminate\Http\Response
     */
    public function edit(Constancia $constancia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Constancia  $constancia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $constancia = Constancia::find($request->id);
        $constancia->update([
            'codigo' => $request->codigo,
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'url' => $request->url,
            'id_postulante' => $request->id_postulante,
        ]);
  
        $this->response['estado'] = true;
        $this->response['datos'] = $constancia;
        $this->response['mensaje'] = 'Constancia Modificada';
        return response()->json($this->response, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Constancia  $constancia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $constancia = Constancia::find($id);
        $constancia->delete();

        $this->response['estado'] = true;
        $this->response['datos'] = $constancia;
        $this->response['mensaje'] = 'Colegio Eliminado';
        return response()->json($this->response, 200);
    }

    // public function constanciaMedica()
    // {
    //     $data = [
    //         'title' => 'Welcome to CodeSolutionStuff.com',
    //         'date' => date('m/d/Y')
    //     ];
    //     $ldate = date('Y-m-d');

    //     $pdf = PDF::loadView('Medico/constancia', $data);

    //     //return $pdf->stream('CM-'.$ldate.'.pdf');
    //     return $pdf->download('CM-'.$ldate.'.pdf');
    // }


    public function guardarTemp(Request $request){

        $r = '';
        if($request->hasFile("archivo")){
            $file=$request->file("archivo");
            
            $nombre = "pdf_".time().".".$file->guessExtension();

            $ruta = public_path("temporal/".$nombre);
            $r = "temporal/".$nombre;

            if($file->guessExtension()=="pdf"){
                copy($file, $ruta);
            }else{
                dd("NO ES UN PDF");
            }
        }
        return $r;

    }

    public function eliminarTemp(Request $request){
        $url = public_path($request->url);
        //return $url;
        // File::delete($url);
        File::delete($url);
    }

    public function getCosntancias(Request $request)
    {

        $query_where = [];
        if ($request->dni) array_push($query_where, [DB::raw('substr(id_area, 1, 2)'), '=', $request->dni]);
        if ($request->dependencia) array_push($query_where, [DB::raw('substr(id_area, 1, 2)'), '=', $request->dependencia]);
        if ($request->responsable) array_push($query_where, [DB::raw('id_usuario'), '=', $request->responsable]);
        if ($request->tipo) array_push($query_where, [DB::raw('area_persona.tipo'), '=', $request->tipo]);
        if ($request->estado) array_push($query_where, [DB::raw('area_persona.estado'), '!=', $request->estado]);
        //DB::raw("CONCAT( hor_inicio , ' - ' , hor_fin) as horario")
        $res = Constancia::select(
            'constancias.*',
            'postulantes.id as p_id',
            'postulantes.dni as p_dni',
            'postulantes.nombres as p_nombres',
            'postulantes.paterno as p_paterno',
            'postulantes.materno as p_materno'
        )
            ->join('postulantes', 'postulantes.id', '=', 'constancias.id_postulante')
            ->where($query_where)
            ->where(function ($query) use ($request) {
                return $query
                    ->orWhere('constancias.codigo', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('postulantes.nombres', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('postulantes.paterno', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('postulantes.materno', 'LIKE', '%' . $request->term . '%')
                    ->orWhere('postulantes.dni', 'LIKE', '%' . $request->term . '%');
            })->orderBy('constancias.id', 'DESC')
            ->paginate(1000);

        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }


}