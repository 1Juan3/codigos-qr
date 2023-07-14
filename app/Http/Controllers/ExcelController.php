<?php

namespace App\Http\Controllers;
use App\Exports\DatosExport;
use App\Imports\DatosImport;
use App\Models\Graduando;
use App\Models\Historico;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function subirExcel(Request $request)
    {
        $file = $request->file('archivo_excel');// extraigo el excel donde lo sube 
        Excel::import(new DatosImport, $file);
        $informacion_graduando = Graduando::all();
        foreach ($informacion_graduando as $graduando) {

            $historico = New Historico();
            $historico->cedula= $graduando->cedula;
            $historico->nombres= $graduando->nombres;
            $historico->apellidos= $graduando->apellidos;
            $historico->titulo= $graduando->titulo;
            $historico->nombre_invitados= $graduando->cedula;
            $historico->id_qr= $graduando->id_qr;
            $historico->numero_entradas = $graduando->numero_entradas;
            $historico->nombre_evento= $graduando->nombre_grupo;
            $historico -> save();

          

        }

        return back()->with('status', 'Importacion Exitosa');//mensaje de exito
    }
    
    public function index(){

        return view('qrtoperson');// para maejar la vista para la subida del archivo 
    }
    
    public function index1(){

        return view('qrtoperson'); // la vista para descargar el archivo
    }

    public function descargarExcel(Request $request)
    {
        $nombre_grupo = $request->input('grupo'); // ponemos el nombre del grupo que queremos descargar la informacion o nombre evento
        return Excel::download(new DatosExport($nombre_grupo), 'datos-graduando.xlsx'); 
    }
    


} 