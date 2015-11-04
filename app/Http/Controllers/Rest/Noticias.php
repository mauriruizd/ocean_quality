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
		$noticia = Noticia::create([
			'titulo' => $request->titulo,
			'cuerpo' => $request->cuerpo,
			'adm_cod' => 1
		]);
		if($request->hasFile('imagenes')) {
			$this->uploadImages($request->file('imagenes'), $noticia->id);
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
		$noticia = Noticia::with('imagenes')->find($id);
		return view('admin.forms.noticia', compact('noticia'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$imagenes_antiguas = $request->has('imagenes_antiguas') ? $request->imagenes_antiguas : [];

		ImagenNoticia::where('noticia_cod', '=', $id)->whereNotIn('id', $imagenes_antiguas)->delete();
		if($request->hasFile('imagenes')) {
			$this->uploadImages($request->file('imagenes'), $id);
		}
		Noticia::where('id', $id)->update($request->only(['titulo', 'cuerpo']));

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

	private function uploadImages($imagenes, $noticiaId) {
		$files = $imagenes;
		foreach($files as $imagen) {
			$filename = $imagen->getClientOriginalName();
			$path = 'noticias';
			$imagen->move($path, $filename);

			ImagenNoticia::create([
				'img_url' => $path.'/'.$filename,
				'noticia_cod' => $noticiaId
			]);
		}
	}

}
