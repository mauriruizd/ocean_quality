<?php namespace App\Providers;

use App\Banner;
use App\Categoria;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->share('categorias', Categoria::with(['subcategorias' => function($q) {
				$q->padre()->with(['subcategoriasHijas' => function($q) {
					$q->orderBy('nombre', 'ASC');
				}])->orderBy('nombre', 'ASC');
			}])
			->orderBy('id', 'ASC')
			->get());
		view()->share('imagenesNav', [
			'semillas' => 'semilla',
			'fertilizantes' => 'fertilizante',
			'agroquimicos' => 'agro',
			'sistemas-de-riego' => 'sistema',
			'ambientes-protegidos' => 'semilla'
		]);
		view()->share('banner', Banner::orderByRaw("RAND()")->select('img_url', 'link')->first());
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
