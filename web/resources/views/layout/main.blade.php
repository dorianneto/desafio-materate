@include('layout.include.header')

  <section id="container" >
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Alternar navegação"></div>
      </div>

      <!--logo start-->
      <a href="{{ url('/') }}" class="logo"><b>DESAFIO MATERATE</b></a>
      <!--logo end-->

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="{{ route('auth.logout') }}">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered">
            <a href="https://github.com/dorianneto" target="_blank">
              <img src="https://avatars0.githubusercontent.com/u/3408931?v=3&s=460" class="img-circle" width="60">
            </a>
          </p>
          <h5 class="centered">Dorian Neto</h5>
          <li class="mt">
            <a href="{{ url('/') }}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>Usuários</span>
            </a>
            <ul class="sub">
              <li><a href="{{ route('users.index') }}">Visualizar todos</a></li>
              <li><a href="{{ route('users.trash') }}">Lixeira</a></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

      <!--main content start-->
      <section id="main-content">
        <section class="wrapper">
          @yield('content')
        </section><!--/wrapper -->
      </section><!-- /MAIN CONTENT -->
      <!--main content end-->

@include('layout.include.footer')