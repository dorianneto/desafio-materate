@include('layout.include.header')

    <div id="login-page">
      <div class="container">
        <form class="form-login" action="{{ route('auth.authenticate') }}" method="post">
          {{ csrf_field() }}

          <h2 class="form-login-heading">Desafio MateRate</h2>
          <div class="login-wrap">
            @if (session()->has('notice'))
              <div class="alert alert-{{ session('notice')['alert'] }}">
                <p>{{ session('notice')['message'] }}</p>
              </div>
            @endif
            <input type="email" name="email" class="form-control" placeholder="Seu email" autofocus>
            <br>
            <input type="password" name="password" class="form-control" placeholder="Sua senha">
            <br>
            <button class="btn btn-theme btn-block" href="index.html" type="submit"><i class="fa fa-lock"></i> ACESSAR</button>
          </div>
        </form>
      </div>
    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="assets/js/jquery.backstretch.min.js"></script>
    <script>
    $.backstretch("assets/img/login-bg.jpg", {speed: 500});
    </script>
  </body>
</html>
