<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests\AreaTrabajoRequest;
use App\Models\AreaTrabajo;

use Illuminate\Http\Request;

class AreaTrabajoController extends Controller
{
  public function index()
  {
  //
     $datos['areaTrabajos']=AreaTrabajo::paginate(5);

      return view('area_trabajo.index', $datos);
  }
  
  /**
   *Muestra el formulario para crear un nuevo recurso
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      //
      $areaTrabajos= AreaTrabajo::orderBy('descripcion', 'ASC')->get();
      return view('area_trabajo.create')->with(['areaTrabajos' => $areaTrabajos]);
  }

  /**
  * Almacene un recurso recién creado en el almacenamiento.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
      public function store(AreaTrabajoRequest $request)
  {
      //Esta linea responde en un formato json toda la informafion de datos de AreaTrabajo
      //$datosArea= request()->all();
      $datosArea= request()->except('_token');
      AreaTrabajo::insert($datosArea);

      //return response()->json($datosArea);
      return redirect('area_trabajo')->with('mensaje','Area Agregada con exito');
  }

  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
      public function show($id)
  {

  }

  /**
  * 
  *Muestra el formulario para editar el resource especificado.
  *
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
      public function edit($id)
  {
      //
      $area=AreaTrabajo::findOrFail($id);

      return view('area_trabajo.edit', compact('area'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\Models\Empleado  $empleado
  * @return \Illuminate\Http\Response
  */
      public function update(AreaTrabajoRequest $request, $id)
  {
      //
      $datosArea = request()->except(['_token','_method']);
      AreaTrabajo::where('id', '=',$id)->update($datosArea);

      $area=AreaTrabajo::findOrFail($id);
      return view('area_trabajo.edit', compact('area'));
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\Models\Empleado  $empleado
  * @return \Illuminate\Http\Response
  */
      public function destroy($id)
  {
      // se tiene que enviar el mismo paramentro por eso se coloca 2 veces el id
      AreaTrabajo::destroy($id);
      return redirect('area_trabajo')->with('mensaje','Area Eliminado con exito');
  }

  
}

