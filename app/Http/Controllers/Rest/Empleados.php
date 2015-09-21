<?php namespace App\Http\Controllers\Rest;

use App\Empleado;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CorreoEmpleado;
use App\TelefonoEmpleado;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Empleados extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Empleado::with('telefonos', 'correos')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$empleado = Empleado::create($request->all());

		foreach($request->telefonos as $telefono){
			TelefonoEmpleado::create([
				'telefono'		=> $telefono,
				'empleado_cod'	=> $empleado->id
			]);
		}

		foreach($request->correos as $correo){
			CorreoEmpleado::create([
				'correo'		=> $correo,
				'empleado_cod'	=> $empleado->id
			]);
		}
		return new Response('Empleado creado con exito', 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Empleado::with('telefonos', 'correos')->find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		Empleado::where('id', $id)->update($request->all());
		return new Response('Empleado actualizado con exito', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Empleado::destroy($id);
		return new Response('Empleado eliminado con exito', 200);
	}

}
