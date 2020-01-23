<nav class="navbar navbar-expand-lg navbar-light navigation">
    <a class="navbar-brand" href="#"><span class="masp"></span></a>
    <button class="navbar-toggler cabecalho" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link navigation__link" href="http://masp.museu">Início</a></li>
            @foreach($menus as $menu)
                @if (!$menu->parent && $menu->endereco != '#')
                    <li class="nav-item">
                        <a class="nav-link navigation__link" href="{{ explode(':', $menu->endereco)[0] == 'http' ? $menu->endereco : "http://masp.museu$menu->endereco" }}" id="{{ 'id_' . $menu->cod_menu }}">{{ $menu->nome }}</a>
                    </li>
                @elseif (!$menu->parent)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle navigation__link" href="{{ explode(':', $menu->endereco)[0] == 'http' ? $menu->endereco : "http://masp.museu$menu->endereco" }}" id="{{ 'id_' . $menu->cod_menu }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $menu->nome }}</a>
                        <div class="dropdown-menu" aria-labelledby="{{ 'id_' . $menu->cod_menu }}">
                            @foreach ($menus ?? '' as $submenu)
                                @if ($menu->cod_menu == $submenu->parent)
                                    <a class="dropdown-item navigation__link-sub" href="{{ "http://masp.museu$submenu->endereco" }}">{{ $submenu->nome }}</a>
                                @endif
                            @endforeach
                        </div>
                    </li>
                @endif
            @endforeach
        </ul>
        @if (auth()->check())
        <div class="navbar-brand">
            <div class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                    @if(auth()->user()->avatar)
                    <img class="img-avatar" src="{{ auth()->user()->avatar != null ? auth()->user()->avatar : null  }}" alt="{{ auth()->user()->nome }}">
                    @else
                    <span>{{ auth()->user()->nome }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item">Usuário ativo</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item">{{ auth()->user()->nome }}</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</nav>
