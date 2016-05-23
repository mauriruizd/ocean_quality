<div class="menu">
    <nav>
        <ul class="menu_mayor">
            <li><a href="{{ URL::to('/') }}"><i class="glyphicon glyphicon-home"></i> |</a></li>
            <li><a href="#">Productos |</a>

                <div>

                    <ul {!! !$categorias[0]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                        <li class="titulo"><a href="#"><img src="{{ URL::to('img/semilla.png') }}">  {{ $categorias[0]->nombre }}</a></li>
                        @foreach($categorias[0]->subcategorias as $subcategoria)
                                <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[0]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                        <!--<li><a href="">• Categoria #2</a></li>
                        <li><a href="">• Categoria #3</a></li>
                        <li><a href="">• Categoria #4</a></li>
                        <li><a href="">• Categoria #5</a></li>
                        <li><a href="">• Categoria #5</a></li>
                        <li><a href="">• Categoria #5</a></li>-->
                    </ul>

                    <ul {!! !$categorias[1]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                        <li class="titulo "><a href=""><img src="{{ URL::to('img/fertilizante.png') }}"> {{ $categorias[1]->nombre }}</a></li>
                        @foreach($categorias[1]->subcategorias as $subcategoria)
                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[1]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>

                    <ul {!! !$categorias[2]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                        <li class="titulo"><a href=""><img src="{{ URL::to('img/sistema.png') }}"> {{ $categorias[2]->nombre }}</a></li>
                        @foreach($categorias[2]->subcategorias as $subcategoria)
                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[2]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>

                    <ul {!! !$categorias[3]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                        <li class="titulo "><a href=""><img src="{{ URL::to('img/agro.png') }}"> {{ $categorias[3]->nombre }}</a></li>
                        @foreach($categorias[3]->subcategorias as $subcategoria)
                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[3]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>

                    <ul {!! !$categorias[4]->subcategorias->isEmpty() ?: 'style="display : none"' !!}>
                        <li class="titulo"><a href=""><img src="{{ URL::to('img/semilla.png') }}"> {{ $categorias[4]->nombre }}</a></li>
                        @foreach($categorias[4]->subcategorias as $subcategoria)
                            <li><a class="subcatlist" href="{{ URL::to('productos/'.$categorias[4]->id.'/'.$subcategoria->id) }}">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </li>
            <li><a href="{{ URL::to('news') }}">Noticias y Eventos |</a></li>
            <li><a href="{{ URL::to('vendedores') }}">Vendedores |</a></li>
            <li><a href="{{ URL::to('empresa') }}">Empresa |</a></li>
            {{--<li><a href="{{ URL::to('trabaje_con_nosotros') }}">Trabaje con nosotros |</a></li>--}}
            <li><a href="{{ URL::to('contacto') }}">Contacto</a></li>
        </ul>
    </nav>
    <div class="search">
        <form action="{{ URL::to('busqueda') }}" class="box01" method="GET">
            <input name="q" type="text" class="box02" placeholder="Digite aqui o que procura">
            <div><input type="submit" value="OK" class="btOKBuscar"></div>
        </form>

    </div><!--search-->
</div>