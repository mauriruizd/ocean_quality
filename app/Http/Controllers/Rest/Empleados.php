<?php namespace App\Http\Controllers\Rest;

use App\Empleado;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CorreoEmpleado;
use App\TelefonoEmpleado;
use App\Zona;
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
		$empleado = Empleado::create($request->only('nombre', 'zona_cod'));
		$this->saveTelefonos($request->telefonos, $empleado->id);
		$this->saveCorreos($request->correos, $empleado->id);

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
		$empleado = Empleado::select('id', 'nombre', 'zona_cod', 'cargo')
			->find($id);
		$correos = CorreoEmpleado::where('empleado_cod', '=', $id)->lists('correo');
		$telefonos = TelefonoEmpleado::where('empleado_cod', '=', $id)->lists('telefono');
		$zonas = Zona::with('departamento')->select('nombre', 'id', 'depto_cod')->get();
		return view('admin.forms.empleado', compact('empleado', 'zonas', 'correos', 'telefonos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		Empleado::where('id', $id)->update($request->only(['nombre', 'zona_cod']));
		CorreoEmpleado::where('empleado_cod', '=', $id)->delete();
		TelefonoEmpleado::where('empleado_cod', '=', $id)->delete();
		$this->saveTelefonos($request->telefonos, $id);
		$this->saveCorreos($request->correos, $id);
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
		TelefonoEmpleado::where('empleado_cod', '=', $id)->delete();
		CorreoEmpleado::where('empleado_cod', '=', $id)->delete();
		Empleado::destroy($id);
		return new Response('Empleado eliminado con exito', 200);
	}

	private function saveTelefonos($telefonos, $empId) {
		$telefonos = explode(',', str_replace(' ', '', $telefonos));

		foreach($telefonos as $telefono){
			TelefonoEmpleado::create([
				'telefono'		=> $telefono,
				'empleado_cod'	=> $empId
			]);
		}
	}

	private function saveCorreos($correos, $empId) {
		$correos = explode(',', str_replace(' ', '', $correos));

		foreach($correos as $correo){
			CorreoEmpleado::create([
				'correo'		=> $correo,
				'empleado_cod'	=> $empId
			]);
		}
	}

}
