<?php namespace App\Http\Controllers;

use App\Banner;
use App\Departamento;
use App\Empleado;
use Illuminate\Http\Request;
use App\Noticia;
use App\Zona;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
/*	public function __construct()
	{
		$this->middleware('guest');
	}
*/
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$banners = Banner::all();
		return view('front.index', compact('banners'));
	}

	public function productos(){
		return view('front.productos');
	}

	public function noticias(){
		$noticias = Noticia::select('id', 'updated_at', 'titulo', 'cuerpo')->get();
		return view('front.noticias', compact('noticias'));
	}

	public function vendedores(){
		$departamentos = Departamento::has('zonas')->with('zonas.empleados.telefonos', 'zonas.empleados.correos')->get();
		return view('front.vendedores', compact('departamentos'));
	}

	public function empresa(){
		return view('front.empresa');
	}

	public function trabajeConNosotros(){
		return view('front.trabajeConNosotros');
	}

	public function postTrabajeConNosotros(Request $request){
		Mail::send('emails.trabaje_con_nosotros', $request->only(['nombre', 'nombre_empresa', 'email', 'telefono', 'area_interes', 'mensaje']), function($msg) {
			$msg->to('rd_mauri@hotmail.com', 'Mauricio')->subject('Ocean Quality | Trabaje con nosotros');
		});
		return redirect()->back()->with('message', 'Mensaje enviado con exito!');
	}

	public function contacto(){
		return view('front.contacto');
	}

	public function postContacto(Request $request){
		Mail::send('emails.contacto', $request->only(['nombre', 'email', 'telefono', 'mensaje']), function($msg) {
			$msg->to('rd_mauri@hotmail.com', 'Mauricio')->subject('Ocean Quality | Contacto');
		});
		return redirect()->back()->with('message', 'Mensaje enviado con exito!');
	}

}
