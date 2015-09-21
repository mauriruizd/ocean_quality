<?php namespace App\Http\Controllers\Rest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ImagenNoticia;
use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Noticias extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Noticia::with('imagenes')->get();
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('api.noticias.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$noticia = Noticia::create($request->all());
		foreach($request->imagen_url as $imagen){
			ImagenNoticia::create([
				'img_url' => $imagen,
				'noticia_cod' => $noticia->id
			]);
		}
		return new Response('Noticia creada con exito', 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Noticia::with('imagenes')->find($id);
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
		Noticia::where('id', $id)->update($request->all());
		return new Response('Noticia actualizada con exito', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$noticia = Noticia::with('imagenes')->find($id);
		foreach($noticia->imagenes as $imagen){
			$imagen->delete();
		}
		Noticia::destroy($id);
	}

}
