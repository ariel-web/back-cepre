<?php

namespace App\Http\Controllers;

use App\Models\Apoderado;
use App\Models\CepreEstudiante;
use App\Models\Comprobante;
use App\Models\Constancia;
use App\Models\Postulante;
use App\Models\PreIsncripcion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PDF;
use Dompdf\Options;

class PreIsncripcionController extends Controller
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
    public function create() //protected $response;
    {
        //
    }

    public function getCodigo()
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzAVCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code_u = substr(str_shuffle($permitted_chars), 0, 6);

        $existe = PreIsncripcion::where('codigo_seguridad', $code_u)->first();

        if ($existe) {
            $this->codigo();
        } else {
            return $code_u;
        }
    }

    public function iniciarPreInscripcion($dni)
    {
        $postulante = CepreEstudiante::where('nro_doc', $dni)->first();

        if ($postulante) {

            if ($postulante->estado == '0') {
                $codigo = $this->getCodigo();
                $this->response['estado'] = true;
                $this->response['codigo'] = $codigo;
                return response()->json($this->response, 200);
            } else {
                $this->response['estado'] = false;
                $this->response['mensaje'] = 'El número de documento ya se encuntra registrado.';
                return response()->json($this->response, 200);
            }
        } else {

            $this->response['estado'] = false;
            $this->response['mensaje'] = 'Estudiante no encontrado.';
            return response()->json($this->response, 200);
        }
    }

    public function guardarPreInscripcion(Request $request)
    {

        try {
            DB::transaction(function () use ($request) {

                $personales = json_decode($request->datos_personales);
                $programa = json_decode($request->datos_programa);
                $estudios = json_decode($request->datos_estudios);

                $postulante = CepreEstudiante::where('nro_doc', $request->dni)->first();

                if ($postulante->estado == '0') {
                    if ($request->file('foto_postulante')) {
                        $foto_postulante = $request->codigo . '-' . $request->dni . '.' . $request->foto_postulante->extension();
                        $request->foto_postulante->move(public_path('uploads/foto'), $foto_postulante);
                    }


                    $data_postulante  = [
                        'tipo_doc' =>  $request->tipo_doc,
                        'foto_url' =>  'uploads/foto/' . $foto_postulante, //AUMENTAR EN LA BD
                        'nro_doc' => $request->dni,
                        'primer_apellido' => $personales->primer_ap,
                        'segundo_apellido' => $personales->segundo_ap,
                        'apellido_casada' => $personales->casada_ap,
                        'nombres' => $personales->nombres,
                        'sexo' => $personales->sexo,
                        'fec_nacimiento' => $personales->fecha_nacimiento,
                        'ubigeo_nacimiento' => $personales->numero_ubigeo,
                        'ubigeo_residencia' => $personales->distrito,
                        //'discapacidad' => $personales,
                        //'tipo_discapacidad' => $personales,
                        'celular' => $personales->celular,
                        'email' => $personales->correo,
                        'estado_civil' => $personales->estado_civil,

                        'direccion' => $personales->direccion,
                        'anio_egreso' => $estudios->egreso,
                        //'correo_institucional' => ,
                        //'cod_orcid' => ,
                        //'observaciones' => ,
                        'id_colegio' => $estudios->colegio,
                    ];

                    $res_post = Postulante::create($data_postulante);

                    $tutores = $personales->padres;

                    foreach ($tutores as $key => $value) {
                        $data_apoderado = [
                            'tipo_doc' => $value->tipo_doc,
                            'nro_documento' => $value->num_doc,
                            'tipo' => 'P',
                            //'carnet_ext' =>  $value[''],
                            'paterno' =>  $value->primer_ap,
                            'materno' =>  $value->segundo_ap,
                            'nombres' =>  $value->nombres,
                            'id_postulante' => $res_post->id,
                        ];

                        Apoderado::create($data_apoderado);
                    }

                    $data_preinscripcion = [
                        'id_postulante' => $res_post->id,
                        'id_programa_estudios' => $programa->programa_estudios,
                        'id_proceso' => 1, //SE TIENE QUE  CAMBIAR
                        'codigo_seguridad' => $request->codigo,
                    ];

                    PreIsncripcion::create($data_preinscripcion);

                    $data_comprobantes = [
                        'nro_operacion' => $personales->voucher_pago->secuencia,
                        'fecha' => $personales->voucher_pago->fecha,
                        'hora' => $personales->voucher_pago->hora,
                        'monto' => $personales->voucher_pago->monto,
                        //'id_postulante'  => $res_post->id,
                        //'id_proceso' => 1,
                        'codigo_seguridad_pre' => $request->codigo,
                    ];
                    Comprobante::create($data_comprobantes);

                    if ($programa->voucher_pago_medico->secuencia != null) {
                        $data_comprobante_medico = [
                            'nro_operacion' => $programa->voucher_pago_medico->secuencia,
                            'fecha' => $programa->voucher_pago_medico->fecha,
                            'hora' => $programa->voucher_pago_medico->hora,
                            'monto' => $programa->voucher_pago_medico->monto,
                            'codigo' => '39',
                            //'id_postulante'  => $res_post->id,
                            //'id_proceso' => 1,
                            'codigo_seguridad_pre' => $request->codigo,
                        ];
                        Comprobante::create($data_comprobante_medico);
                    }

                    if ($request->file('pdf_certificado')) {
                        $pdf_certificado = $request->codigo . '-' . $request->dni . '.' . $request->pdf_certificado->extension();
                        $request->pdf_certificado->move(public_path('uploads/cerfiticado'), $pdf_certificado);

                        $data_constancia = [
                            'codigo' => $programa->constancia_codigo,
                            'id_postulante'  => $res_post->id,
                            'tipo' => 'CE-E',
                            'codigo_seguridad_pre' => $request->codigo,
                            'url' => '/uploads/cerfiticado/' . $pdf_certificado,
                        ];
                        Constancia::create($data_constancia);
                    }


                    $postulante->estado = 1;
                    $postulante->save();
                } else {
                    throw ("ESTUDIANTE YA REGISTRADO");
                }
            });

            $this->response['estado'] = true;
            $this->response['mensaje'] = 'Registro Existoso';

            return response()->json($this->response, 200);
        } catch (\Throwable $th) {
            $this->response['estado'] = false;
            $this->response['mensaje'] = 'Ocurrion un error, vuleva a intertar ma tarde.';
            $this->response['error'] = $th->getMessage();

            return response()->json($this->response, 200);
        }
    }


    public function validarPasoUno(Request $request)
    {

        $correo = Postulante::where('email', $request->correo)->first();
        if ($correo) {
            $this->response['estado'] = false;
            $this->response['mensaje'] = 'El correo ingresado ya se encuentra regitrado.';
            return response()->json($this->response, 200);
        } else {

            $celular = Postulante::where('celular', $request->celular)->first();
            if ($celular) {
                $this->response['estado'] = false;
                $this->response['mensaje'] = 'El número de celular ingresado ya se encuentra regitrado.';
                return response()->json($this->response, 200);
            }
            $this->response['estado'] = true;
            return response()->json($this->response, 200);
        }
    }


    public function constanciaPreInscripcion($dni)
    {

        $res = DB::select('SELECT  programa_de_estudios.nombre AS programa, 
        postulantes.nro_doc, postulantes.primer_apellido, postulantes.segundo_apellido, postulantes.nombres, postulantes.foto_url
        FROM pre_inscripcion
        JOIN programa_de_estudios ON programa_de_estudios.id = pre_inscripcion.id_programa_estudios 
        JOIN postulantes ON pre_inscripcion.id_postulante = postulantes.id
        WHERE postulantes.nro_doc = ' . $dni . ';');

        $fecha = date('d-m-Y');
        $datos = $res[0];

        $pdf = PDF::loadView('/PreInscripcion/constancia', compact('datos', 'fecha'));
        // $pdf->stream($codigo);
        // $pdf->output();
        $pdf->setPaper('A4', 'portrait');
        //$output = $pdf->output();
        return $pdf->download('mi-constancia-de-inscripcion.pdf');
    }
}
