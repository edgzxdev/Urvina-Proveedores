<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use DateTime;

class ConsultasCController extends Controller
{
    public function index(){
        session_start();
        $departamentos = DB::select(
            "EXEC spDepartamentosApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );
        ////////////// Vista Consultas del Cliente /////////////
        if(isset($_SESSION['usuario'])){
            return view('consultasc')->with('departamentos',$departamentos);
        }else {
            return redirect()->route('login', app()->getLocale());
        }
        //////////////////////////////////////////////////////

    }

    public function ReporteConsulta(Request $request){
        session_start();
        $departamentos = DB::select(
            "EXEC spDepartamentosApp :id",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
            ]
        );
        if(isset($request->desde) || isset($request->hasta)){
            $datefrom  = new \DateTime($request->desde);
            $dateto  = new \DateTime($request->hasta);

        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
                "type" => $request->tipo,
                "department" => $request->departamento,
                "item" => $request->articulo,
                "reference" => $request->equipo,
                "from" => date_format($datefrom, 'Ymd'),
                "to" => date_format($dateto,'Ymd'),
            ]
        );
        if($request->tipo == "Consumo"){
            return view('reportes.consumos')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
        if($request->tipo == "Departamento"){
            return view('reportes.departamento')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
        if($request->tipo == "Equipo"){
            return view('reportes.equipo')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
        if($request->tipo == "Anual"){
            return view('reportes.anual')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
    }else{
        $datehasta = Carbon::now()->format('Ymd');
        $dataConsulta = DB::select(
            "EXEC spReportesApp :id,:type,:department,:item,:reference,:from,:to",
            [
                "id" => $_SESSION['usuario']->UsuarioCteCorp,
                "type" => $request->tipo,
                "department" => $request->departamento,
                "item" => $request->articulo,
                "reference" => $request->equipo,
                "from" => '20000101',
                "to" => $datehasta,
            ]
        );
        if($request->tipo == "Consumo"){
            return view('reportes.consumos')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
        if($request->tipo == "Departamento"){
            return view('reportes.departamento')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
        if($request->tipo == "Equipo"){
            return view('reportes.equipo')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }
        if($request->tipo == "Anual"){
            return view('reportes.anual')->with('dataConsulta',$dataConsulta)->with('departamentos',$departamentos);
        }

    }


    }
}
