<section class="banner" role="banner" id="banner">
    <header id="header">
      <div class="header-content clearfix"> <span class="logo"><a href="index.html">#RELOAD</a></span>
        <nav class="navigation" role="navigation">
          <ul class="primary-nav">
            <li><a href="#banner">Inicio</a></li>
            <li><a href="#intro">Radio Visual EFXs</a></li>
            <li><a href="#services">Noticias</a></li>
            <li><a href="#Playlist">Programas</a></li>
            <li><a href="#contact">Contactos</a></li>
            @auth
            <li  class="dropdown"><a href="{{ route('dashboard') }}"><img class="rounded-circle" width="32" height="32" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" /></a></li>
            @else
            <li><a href="{{ route('login') }}">Iniciar Sesion</a></li>
            <li><a href="{{ route('register') }}">Registro</a></li> 
            @endauth
            {{-- <li><a href="#contact">Contact</a></li> --}}
          </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a> </div>
    </header>
    <!-- banner text -->
    <div class="container">
      <div class="col-md-10">
        <div class="banner-text text-center">
          <h1>eFXs Music</h1>
          <p>Bienvenido a la Radio</p></div>
        <!-- banner text --> 
      </div>
    </div>
  </section>