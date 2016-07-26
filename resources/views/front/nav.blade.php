<div class="navbar-wrapper">
    <div class="container">
        <nav class="yamm navbar navbar-inverse navbar-static-top menu-principal">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Navegación</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <!-- <a class="navbar-brand" href="http://getbootstrap.com/examples/carousel/#">Project name</a> -->
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <form class="submit_busca" action="{{ url('busqueda') }}" method="get">
                                <input type="text" class="form-control input" id="buscar-input" placeholder="Busqueda">
                                <input type="submit" name="btn-buscar" value="OK">
                            </form>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active1"><a href="{{ url('/') }}">Home |</a></li>
                        <li><a href="{{ url('empresa') }}">Empresa |</a></li>
                        <li><a href="{{ url('news') }}">Noticias |</a></li>
                        <li class="dropdown">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                Productos
                                <i class="caret"></i>
                                |
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul {!! !$categorias[0]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                                        <li class="titulo"><a href="#"><img src="{{ URL::to('img/semilla.png') }}">  {{ $categorias[0]->nombre }}</a></li>
                                        @foreach($categorias[0]->subcategorias as $subcategoria)
                                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                                            @if(!$subcategoria->subcategoriasHijas->isEmpty())
                                                <ul class="subcatlist-l2">
                                                    @foreach($subcategoria->subcategoriasHijas as $subcategoriaHija)
                                                        <li><a href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoriaHija->id) }}">▸ {{ $subcategoriaHija->nombre }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <ul {!! !$categorias[1]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                                        <li class="titulo "><a href=""><img src="{{ URL::to('img/fertilizante.png') }}"> {{ $categorias[1]->nombre }}</a></li>
                                        @foreach($categorias[1]->subcategorias as $subcategoria)
                                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[1]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                                            @if(!$subcategoria->subcategoriasHijas->isEmpty())
                                                <ul class="subcatlist-l2">
                                                    @foreach($subcategoria->subcategoriasHijas as $subcategoriaHija)
                                                        <li><a href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoriaHija->id) }}">▸ {{ $subcategoriaHija->nombre }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <ul {!! !$categorias[2]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                                        <li class="titulo"><a href=""><img src="{{ URL::to('img/sistema.png') }}"> {{ $categorias[2]->nombre }}</a></li>
                                        @foreach($categorias[2]->subcategorias as $subcategoria)
                                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[2]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                                            @if(!$subcategoria->subcategoriasHijas->isEmpty())
                                                <ul class="subcatlist-l2">
                                                    @foreach($subcategoria->subcategoriasHijas as $subcategoriaHija)
                                                        <li><a href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoriaHija->id) }}">▸ {{ $subcategoriaHija->nombre }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <ul {!! !$categorias[3]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                                        <li class="titulo "><a href=""><img src="{{ URL::to('img/agro.png') }}"> {{ $categorias[3]->nombre }}</a></li>
                                        @foreach($categorias[3]->subcategorias as $subcategoria)
                                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[3]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                                            @if(!$subcategoria->subcategoriasHijas->isEmpty())
                                                <ul class="subcatlist-l2">
                                                    @foreach($subcategoria->subcategoriasHijas as $subcategoriaHija)
                                                        <li><a href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoriaHija->id) }}">▸ {{ $subcategoriaHija->nombre }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>

                                    <ul {!! !$categorias[4]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                                        <li class="titulo"><a href=""><img src="{{ URL::to('img/semilla.png') }}"> {{ $categorias[4]->nombre }}</a></li>
                                        @foreach($categorias[4]->subcategorias as $subcategoria)
                                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[4]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                                            @if(!$subcategoria->subcategoriasHijas->isEmpty())
                                                <ul class="subcatlist-l2">
                                                    @foreach($subcategoria->subcategoriasHijas as $subcategoriaHija)
                                                        <li><a href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoriaHija->id) }}">▸ {{ $subcategoriaHija->nombre }}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </li>

                        <li><a href="{{ url('vendedores') }}">Vendedores |</a></li>
                        <li><a href="{{ url('contacto') }}">Contacto </a></li>
                    </ul>
                </div>
            </div>
        </nav>

    </div>
</div>