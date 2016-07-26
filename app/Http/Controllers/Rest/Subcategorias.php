<?php namespace App\Http\Controllers\Rest;

use App\Categoria;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Subcategorias extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Subcategoria::all();
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
		Subcategoria::create($request->all());
		return new Response('Subcategoria creada con exito', 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Subcategoria::find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$subcategoria = Subcategoria::select('id', 'nombre', 'cat_cod', 'subcat_padre_cod')->find($id);
		$categorias = Categoria::lists('nombre', 'id');
		$subcategorias = Subcategoria::padre()
			->select('id', 'nombre', 'subcat_padre_cod')
			->where('cat_cod', '=', $subcategoria->cat_cod)
			->where('id', '<>', $id)
			->get();
		$listaSubcategorias = [];
		foreach ($subcategorias as $item) {
			$listaSubcategorias[$item->id] = $item->nombre;
		}
		return view('admin.forms.subcategoria', compact('subcategoria', 'categorias', 'listaSubcategorias'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$datos = $request->only(['nombre', 'cat_cod', 'subcat_padre_cod']);
		if ($datos['subcat_padre_cod'] == 0) {
			$datos['subcat_padre_cod'] = null;
		}
		Subcategoria::where('id', $id)->update($datos);
		return new Response('Subcategoria actualizada con exito', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Subcategoria::destroy($id);
		return new Response('Subcategoria eliminada con exito', 200);
	}

}
