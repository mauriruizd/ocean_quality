<?php namespace App\Http\Controllers;

use App\Administrador;
use App\Categoria;
use App\Departamento;
use App\Empleado;
use App\Banner;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use URL;

use App\Noticia;
use App\Producto;
use App\Proveedor;
use App\ProveedorProducto;
use App\Subcategoria;
use App\Zona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller {

    public function __construct(){
        $this->middleware('auth', ['except' => ['login', 'loginAttempt'] ]);
    }

    public function login(){
        return view('admin.login');
    }

    public function loginAttempt(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(URL::to('admin/'));
        }
        return view('admin.login');
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }

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
        $zonas = Zona::select('id', 'nombre', 'depto_cod')
            ->with(['departamento' => function($query) {
                $query->select('id', 'nombre');
            }])
            ->paginate(5);
        $departamentos = Departamento::lists('nombre', 'id');
        return view('admin.zona', compact('zonas', 'departamentos'));
    }

    public function empleados() {
        $empleados = Empleado::select('id', 'nombre', 'zona_cod', 'cargo')
            ->with(['zona' => function($query) {
                $query->select('id', 'nombre', 'depto_cod');
            }, 'zona.departamento' => function($query) {
                $query->select('id', 'nombre');
            }, 'telefonos' => function($query) {
                $query->select('id', 'telefono', 'empleado_cod');
            }, 'correos' => function($query) {
                $query->select('id', 'correo', 'empleado_cod');
            }])
            ->paginate(5);
        $zonas = Zona::with('departamento')->select('nombre', 'id', 'depto_cod')->get();
        return view('admin.empleado', compact('empleados', 'zonas'));
    }

    public function noticias(){
        $noticias = Noticia::with('imagenes')->paginate(5);
        return view('admin.noticia', compact('noticias'));
    }

    public function banners(){
        $banners = Banner::paginate(5);
        return view('admin.banner', compact('banners'));
    }

}
