<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
            <li class="active">
                <a class="" href="{{ route('/') }}">
                    <i class="icon_house_alt"></i>
                    <span>Main</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_document_alt"></i>
                    <span>Licitaciones</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('tender.index') }}">Lista</a></li>
                    <li><a class="" href="{{ route('tender.new') }}">Nueva Licitacion</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_chat"></i>
                    <span>Clientes</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('clients.index') }}">Lista</a></li>
                    <li><a class="" href="{{ route('clients.new') }}">Nuevo Cliente</a></li>
                    {{--<li><a class="" href="grids.html">Grids</a></li>--}}
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_desktop"></i>
                    <span>Productos</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="{{ route('products.index') }}">Lista</a></li>
                    <li><a class="" href="{{ route('products.new') }}">Nuevo Producto</a></li>
                    {{--<li><a class="" href="grids.html">Grids</a></li>--}}
                </ul>
            </li>
            <li>
                <a class="" href="widgets.html">
                    <i class="icon_genius"></i>
                    <span>Stock</span>
                </a>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" class="">
                    <i class="icon_table"></i>
                    <span>Compras</span>
                    <span class="menu-arrow arrow_carrot-right"></span>
                </a>
                <ul class="sub">
                    <li><a class="" href="general.html">Lista</a></li>
                    <li><a class="" href="buttons.html">Nuevo Producto</a></li>
                    {{--<li><a class="" href="grids.html">Grids</a></li>--}}
                </ul>
            </li>
        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->