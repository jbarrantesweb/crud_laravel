<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $alumnos = Alumno::All();
        return view("alumno.listado",['alumnos'=>$alumnos]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("alumno.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo "<h1>Estoy en store</h1>";
       
//        dd ($_POST);
//        dd($request);
//        dd($request->input());
        $alumno = new Alumno($request->input());
        $alumno->save();
        $alumnos = Alumno::all();

        return view("alumno.listado",["msj"=> "El alumno $alumno->nombre se ha guardado", "alumnos"=>$alumnos]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {


        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {

        return view("alumno.edit",['alumno'=>$alumno]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->fill($request->input())->saveOrFail();
        $alumnos = Alumno::all();

        return view("alumno.listado",["msj"=> "El alumno $alumno->nombre se ha actualizado", "alumnos"=>$alumnos]);


        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        // echo "<h1>Estoy en destroy</h1>";
    
        $alumno->delete();
        $alumnos = Alumno::all();
        return view("alumno.listado",["msj"=> "El alumno $alumno->nombre se ha borrado", "alumnos"=>$alumnos]);

    }
}
