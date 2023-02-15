<?php

namespace App\Http\Controllers;

use App\Models\DetalleExamenVocacional;
use App\Models\Pregunta;
use App\Models\Respuesta;
use App\Models\ExamenVocacional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PreguntaController extends Controller
{
    protected $response;
    public function getPreguntasPrograma($id)
    {
        $programa = $id;
        $preguntas = [];

        $res = DB::select('SELECT preguntas.id, preguntas.url, preguntas.pregunta, respuestas.id as ide, respuestas.respuesta, respuestas.valor FROM preguntas
        JOIN respuestas WHERE respuestas.id_pregunta = preguntas.id 
        AND preguntas.id_programa = '.$programa.';');

        $alternativas = [];
        $temp = $res[0]->id;
        $cont = 0;
        $preguntas[0]['id'] = $temp; 
        $preguntas[0]['pregunta'] = $res[0]->pregunta;
        $preguntas[0]['url'] = $res[0]->url;

        // $alternativas[0] = $res[0]->respuesta; 
        foreach ($res as $key => $registro) {
            if($temp !== $registro->id ){
                $preguntas[$cont]['respuestas'] = $alternativas;  
                $temp = $registro->id;
                $cont++;
                $preguntas[$cont]['id'] = $registro->id; 
                $preguntas[$cont]['pregunta'] = $registro->pregunta;
                $preguntas[$cont]['url'] = $registro->url;
                $alternativas = [];
                $item = new Respuesta();
                $item['respuesta'] = $registro->respuesta;
                $item['valor'] = $registro->valor;
                $item['ide'] = $registro->ide;
                $item['ideP'] = $registro->id;
                array_push($alternativas,$item);
                // $alternativas[$key] = $registro->respuesta;
            }
            else{
                $item = new Respuesta();
                $item['respuesta'] = $registro->respuesta;
                $item['valor'] = $registro->valor;
                $item['ide'] = $registro->ide;
                $item['ideP'] =$registro->id;
                array_push($alternativas,$item);
                $preguntas[$cont]['respuestas'] = $alternativas;  
            }
        }
        $this->response['estado'] = true;
        $this->response['datos'] = $preguntas;
        return response()->json($this->response, 200);
    }

    public function guardarExamen(Request $request){

        // $this->response['nota'] = $request->respuestas;
        // $this->response['estado'] = true;
        // return response()->json($this->response, 200);



        $nota = 0;
       //$respuestas = [];
       //array_push($respuestas,$request->res1,$request->res2,$request->res3,$request->res4);
       //array_push($respuestas,$request->res5,$request->res6,$request->res7,$request->res8);
       //array_push($respuestas,$request->res9,$request->res10);

        foreach($request->respuestas as $res ) {
            if($res != null){
                $nota = $nota + $res['valor'];
            }
        }

        try {
            $trans = DB::transaction(function () use ($request,$nota) {

                foreach($request->respuestas as $res ) {
                    if($res != null){
                        $respuesta = DetalleExamenVocacional::create([ 
                            'id_pregunta' => $res['ide'],
                            'id_pregunta' => $res['ideP'],
                            'codigo_pre' => $request->codigo,
                            // 'dni' => null,   
                            // 'id_examen' => , 
                        ]);
                    }
                }

                $this->response['nota'] = $nota;
                $this->response['estado'] = true;
                return response()->json($this->response, 200);

            });
        } catch (\Throwable $th) {
            $this->response['mensaje'] = 'Ocurrió un error, vuelva a intentarlo. ' .  $th->getMessage();
            $this->response['estado'] = false;
            return response()->json($this->response, 200);
        }

    }

    private function existe($id, $array) {
        $cont = 0;
        foreach ($array as $key => $item) {
           if($id  === $item->id){
            $cont = $key;
           }
        }
        return $cont;
    }


}
