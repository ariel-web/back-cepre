<?php

namespace App\Http\Controllers;

use App\Models\Colegio;
use App\Models\Departamento;
use App\Models\Distrito;
use App\Models\Pais;
use App\Models\ProgramaDeEstudios;
use App\Models\Provincia;
use Illuminate\Http\Request;

class SelectDataController extends Controller
{

    protected $response;


    protected $pais;
    protected $departamento;
    protected $provincia;
    protected $distrito;
    protected $programaEstudio;
    protected $colegio;

    public function __construct()
    {
        $this->pais = new Pais();
        $this->departamento = new Departamento();
        $this->provincia = new Provincia();
        $this->distrito = new Distrito();
        $this->programaEstudio = new ProgramaDeEstudios();
        $this->colegio = new Colegio();
    }

    public  function getPaises()
    {
        $res = $this->pais->getPaises();
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

    public  function getColegiosPorUbigeo($ubigeo)
    {
        $res = $this->colegio->getColegiosPorUbigeo($ubigeo)->map(function ($item) {
            return [
                'value' => $item->id,
                'label' => $item->nombre,
            ];
        });
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

    public  function getDepartamentos()
    {
        $res = $this->departamento->getDepartamentos()->map(function ($item) {
            return [
                'value' => $item->codigo,
                'label' => $item->nombre,
            ];
        });
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

    public  function getProvinciasPorDepartamento($departamento)
    {
        $res = $this->provincia->getProvinciasPorDepartamento($departamento)->map(function ($item) {
            return [
                'value' => $item->codigo,
                'label' => $item->nombre,
            ];
        });
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

    public  function getDistritosPorProvincia($provincia)
    {
        $res = $this->distrito->getDistritosPorProvincia($provincia)->map(function ($item) {
            return [
                'value' => $item->codigo,
                'label' => $item->nombre,
            ];
        });
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }

    public  function getProgramaDeEstudios()
    {
        $res = $this->programaEstudio->getProgramaDeEstudios()->map(function ($item) {
            return [
                'value' => $item->id,
                'label' => $item->nombre,
            ];
        });
        $this->response['estado'] = true;
        $this->response['datos'] = $res;
        return response()->json($this->response, 200);
    }
}
