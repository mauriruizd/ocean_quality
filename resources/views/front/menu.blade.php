<div class="menu">
    <nav>
        <ul class="menu_mayor">
            <li><a href="{{ URL::to('/') }}"><i class="glyphicon glyphicon-home"></i> |</a></li>
            <li><a href="{{ URL::to('productos') }}">Productos |</a>

                <div>

                    <ul>
                        <li class="titulo"><a href="#"><img src="{{ URL::to('img/semilla.png') }}">  {{ $categorias[0]->nombre }}</a></li>
                        @foreach($categorias[0]->subcategorias as $subcategoria)
                                <li><a href="#">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                        <!--<li><a href="">• Categoria #2</a></li>
                        <li><a href="">• Categoria #3</a></li>
                        <li><a href="">• Categoria #4</a></li>
                        <li><a href="">• Categoria #5</a></li>
                        <li><a href="">• Categoria #5</a></li>
                        <li><a href="">• Categoria #5</a></li>-->
                    </ul>

                    <ul>
                        <li class="titulo "><a href=""><img src="{{ URL::to('img/fertilizante.png') }}"> {{ $categorias[1]->nombre }}</a></li>
                        @foreach($categorias[1]->subcategorias as $subcategoria)
                            <li><a href="#">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>

                    <ul>
                        <li class="titulo"><a href=""><img src="{{ URL::to('img/sistema.png') }}"> {{ $categorias[2]->nombre }}</a></li>
                        @foreach($categorias[2]->subcategorias as $subcategoria)
                            <li><a href="#">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>

                    <ul>
                        <li class="titulo "><a href=""><img src="{{ URL::to('img/agro.png') }}"> {{ $categorias[3]->nombre }}</a></li>
                        @foreach($categorias[3]->subcategorias as $subcategoria)
                            <li><a href="#">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>

                    <ul>
                        <li class="titulo"><a href=""><img src="{{ URL::to('img/semilla.png') }}"> {{ $categorias[4]->nombre }}</a></li>
                        @foreach($categorias[4]->subcategorias as $subcategoria)
                            <li><a href="#">• {{ $subcategoria->nombre }}</a></li>
                        @endforeach
                    </ul>
                </div>

            </li>
            <li><a href="{{ URL::to('news') }}">Noticias y Eventos |</a></li>
            <li><a href="{{ URL::to('vendedores') }}">Vendedores |</a></li>
            <li><a href="{{ URL::to('empresa') }}">Empresa |</a></li>
            <li><a href="{{ URL::to('trabaje_con_nosotros') }}">Trabaje con nosotros |</a></li>
            <li><a href="{{ URL::to('contacto') }}">Contacto</a></li>
        </ul>
    </nav>
    <div class="search">
        <form action="busca" class="box01" method="post">
            <input name="busca" type="text" class="box02" placeholder="Digite aqui o que procura">
            <div><input type="submit" value="OK" class="btOKBuscar"></div>
        </form>

    </div><!--search-->
</div>