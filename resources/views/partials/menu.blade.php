<div id="sidemenu" class="menu-collapsed">
    <!-- HEADER -->
    <div id="header">
        <div id="title">
            <span>{{ config('app.name') }}</span>
        </div>
        <div id="menu-btn">
            <div class="btn-hamburger"></div>
            <div class="btn-hamburger"></div>
            <div class="btn-hamburger"></div>

        </div>
    </div>
    <!-- HEADER -->

    <!-- PROFILE -->

    <div id="profile">
        <div id="photo"><img src="{{ asset('images/thumbnails/' . auth()->user()->imagen) }}"
                alt="{{ auth()->user()->nombre }} {{ auth()->user()->apellido }}"></div>

        <div id="name"><span>{{ auth()->user()->nombre }} {{ auth()->user()->apellido }} </span></div>
    </div>

    <!-- PROFILE -->
    <!-- ITEMS -->
    <div id="menu-items">
        <div class="item">
            <a href="{{ route('homeAdmin') }}">
                <div class="icon"><img src="{{ asset('images/home.png') }}" alt="">
                </div>
                <div class="title"><span>Inicio</span></div>
            </a>
        </div>
        <div class="item">
            <a href="">
                <div class="icon"><img src="{{ asset('images/home.png') }}" alt="">
                </div>
                <div class="title"><span>Modulo Proyectos</span></div>
            </a>
        </div>

        <div class="item">
            <a href="{{ route('usuarios.index') }}">
                <div class="icon"><img src="{{ asset('images/home.png') }}" alt="">
                </div>
                <div class="title"><span>Modulo Usuarios</span></div>
            </a>
        </div>

        <div class="item">
            <a href="#" type="button" onclick="document.querySelector('#formulario-logout').submit()">
                <div class="icon"><img src="{{ asset('images/home.png') }}" alt="">
                </div>
                <div class="title"><span>Cerrar Sesión</span></div>

            </a>
            <form action="{{ route('login.logout') }}" method="POST" class="d-none" id="formulario-logout">
                @csrf
            </form>
        </div>
    </div>
</div>

<div id="header-sitio">
    <h2 class="m-0">{{ config('app.name') }}</h2>
</div>
