<?php namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Producto;
use App\Proveedor;
use App\ProveedorProducto;
use App\Subcategoria;
use App\Zona;
use Illuminate\Http\Request;

class AdminController extends Controller {

    public function index(){
        return view('admin.dashboard');
    }

    public function categorias(){
        $categorias = Categoria::select('id', 'nombre')->orderBy('id', 'ASC')->paginate(5);
        return view('admin.categoria', compact('categorias'));
    }

    public function subcategorias(){
        $subcategorias = Subcategoria::select('id', 'nombre', 'cat_cod')->with(['categoria' => function($query) {
                $query->select('id', 'nombre');
            }])
            ->orderBy('id', 'ASC')->paginate(5);
        $categorias = Categoria::lists('nombre', 'id');
        return view('admin.subcategoria', compact('subcategorias', 'categorias'));
    }

    public function proveedores(){
        $proveedores = Proveedor::select('id', 'nombre')->paginate(5);
        return view('admin.proveedor', compact('proveedores'));
    }

    public function productos(){
        $productos = Producto::select('id', 'nombre', 'descripcion', 'epoca', 'ciclo_promedio', 'segmento', 'envase', 'cat_cod', 'subcat_cod')
            ->with(['categoria' => function($scope) {
                $scope->select('id', 'nombre');
            }, 'subcategoria' => function($scope) {
                $scope->select('id', 'nombre');
            }, 'imagenes' => function($scope) {
                $scope->select('img_url', 'producto_cod');
            }, 'proveedorProducto' => function($scope) {
                $scope->select('id', 'cod_producto', 'cod_proveedor');
            }, 'proveedorProducto.proveedor' => function($scope) {
                $scope->select('id', 'nombre');
            }])
            ->orderBy('id', 'ASC')->paginate(5);
        $subcategorias = Subcategoria::with('categoria')->orderBy('cat_cod', 'DESC')->get();
        $categorias = Categoria::lists('nombre', 'id');
        $proveedores = Proveedor::lists('nombre', 'id');
        return view('admin.producto', compact('productos', 'subcategorias', 'categorias', 'proveedores'));
    }

    public function zonas(){
        $zonas = Zona::select('id', 'nombre', 'depto_cod')->get();
        return view('admin.zona', compact('zonas'));
    }

}
