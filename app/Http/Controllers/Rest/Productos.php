<?php namespace App\Http\Controllers\Rest;

use App\Categoria;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ImagenProducto;
use App\Producto;
use App\Proveedor;
use App\ProveedorProducto;
use App\Subcategoria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class Productos extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Producto::all();
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
		$producto = Producto::create([
			'nombre' => $request->nombre,
			'cat_cod' => $request->cat_cod,
			'subcat_cod' => $request->subcat_cod,
			'descripcion' => $request->descripcion,
			'adm_cod' => 1
		]);

		foreach($request->proveedores as $proveedor) {
			ProveedorProducto::create([
				'cod_producto' => $producto->id,
				'cod_proveedor' => $proveedor
			]);
		}

		if($request->hasFile('imagenes')) {
			$files = $request->file('imagenes');
			foreach($files as $imagen) {
				$filename = $imagen->getClientOriginalName();
				$path = 'productos';
				$imagen->move($path, $filename);

				ImagenProducto::create([
					'img_url' => $path.'/'.$filename,
					'producto_cod' => $producto->id
				]);
			}
		}

		return new Response('Producto creado con exito', 200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return Producto::find($id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$producto = Producto::with('categoria', 'subcategoria', 'imagenes')
			->find($id);
		$proveedoresProd = ProveedorProducto::where('cod_producto', '=', $id)->lists('cod_producto');
		$categorias = Categoria::lists('nombre', 'id');
		$subcategorias = Subcategoria::select('id', 'nombre')->get();
		$proveedores = Proveedor::lists('nombre', 'id');
		return view('admin.forms.producto', compact('producto', 'categorias', 'subcategorias', 'proveedores', 'proveedoresProd'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		ProveedorProducto::where('cod_producto', '=', $id)->delete();

		foreach($request->proveedores as $proveedor) {
			ProveedorProducto::create([
				'cod_producto' => $id,
				'cod_proveedor' => $proveedor
			]);
		}

		Producto::where('id', $id)->update($request->only([
			'nombre', 'cat_cod', 'subcat_cod', 'descripcion', 'epoca', 'ciclo_promedio', 'segmento', 'envase'
		]));
		return new Response('Producto actualizado con exito', 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		ProveedorProducto::where('cod_producto', '=', $id)->delete();
		Producto::destroy($id);
		return new Response('Producto eliminado con exito', 200);
	}

}
