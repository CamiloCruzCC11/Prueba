<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    
    public function index()
    {
        $empleados = Empleado::all();
        return $empleados;
    }

    public function store(Request $request)
    {
        $empleado = new Empleado();
        $empleado->documento = $request->documento;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->fecha_nac = $request->fecha_nac;
        $empleado->sexo = $request->sexo;
        $empleado->est_civil = $request->est_civil;
        $empleado->foto = $request->foto;
        $empleado->cargo = $request->cargo;
        $empleado->est_contra = $request->est_contra;
        $empleado->jefe = $request->jefe;
        $empleado->save();
        
        return $empleado;
    }


    public function update(Request $request, $id)
    {
        $type = Empleado::find($id);
        $empleado->documento = $request->documento;
        $empleado->nombres = $request->nombres;
        $empleado->apellidos = $request->apellidos;
        $empleado->fecha_nac = $request->fecha_nac;
        $empleado->sexo = $request->sexo;
        $empleado->est_civil = $request->est_civil;
        $empleado->foto = $request->foto;
        $empleado->cargo = $request->cargo;
        $empleado->est_contra = $request->est_contra;
        $empleado->jefe = $request->jefe;
        $empleado->save();
        
        return $empleado;
    }

    public function destroy($id)
    {
        $empleado  = Empleado::find($id);
        $empleado ->delete();
    }
}
