<?php namespace App\Http\Controllers\Rest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Banner extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \App\Banner::orderBy('id', 'DESC')->take(5)->get();
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
		\App\Banner::create([
			'titulo'	=> $request->titulo,
			'link'		=> $request->link,
			'adm_cod'	=> Auth::user()->id,
			'img_url'	=> $this->uploadImage($request->file('image'))
		]);
		return new Response('Banner creado con exito', 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return \App\Banner::find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$banner = \App\Banner::find($id);
		return view('admin.forms.banner', compact('banner'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		$toUpdate = [
			'titulo'	=> $request->titulo,
			'link'		=> $request->link,
			'adm_cod'	=> Auth::user()->id
		];

		if($request->hasFile('imagen')){
			$toUpdate['img_url'] = $this->uploadImage($request->file('image'));
		}

		\App\Banner::where('id', $id)
			->update($toUpdate);
		return new Response('Banner actualizado con exito', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		\App\Banner::destroy($id);
		return new Response('Banner eliminado con exito', 200);
	}

	private function uploadImage($image){
		$filename = $image->getClientOriginalName();
		$path = 'banners';
		$image->move($path, $filename);
		return $path.'/'.$filename;
	}

}
