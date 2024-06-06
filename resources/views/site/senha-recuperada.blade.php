<!-- resources/views/auth/display-password.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/logo_suky.png') }}">
    <title>Senha Recuperada</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
    <link id="pagestyle" href="{{ asset('dashboard/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
</head>
<body class="">
  <nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3 navbar-transparent mt-4">
    <div class="container">
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon mt-2">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </span>
      </button>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7 w-100">
          <li class="nav-item">
            <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="{{ route('login') }}">
              <i class="fa fa-user opacity-6  me-1"></i>
              Voltar ao Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <main class="main-content  mt-0">
    <section class="min-vh-100 mb-8">
      <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('dashboard/img/banner/sorvete_banner.png');">
        <span class="mask bg-gradient-dark opacity-6"></span>
      </div>
      <div class="container">
        <div class="row mt-lg-n10 mt-md-n11 mt-n10">
          <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
            <div class="card z-index-0">
                <div class="text-center pt-2">
                    <img src="img/logo_suky.png" class="w-40" alt="Logotipo da Sorveteria Suky, é um sorvete de casca com o nome SUKY centralizado">
                    <h5 class="font-weight-bolder text-info text-gradient">Recuperação de senha</h5>
                </div>
                <div class="card-body">
                <div class="mb-3">
                    <label for="password">Senha:</label>
                    <input type="text" id="password" class="form-control" value="{{ $usuarioSenha }}" readonly>
                </div>
                <div class="text-center">
                    <a href="{{ route('login') }}" class="btn bg-gradient-primary w-100 mt-4 mb-0">Voltar ao Login</a>
                </div>
                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<script src="{{ asset('dashboard/js/core/popper.min.js') }}"></script>
<script src="{{ asset('dashboard/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('dashboard/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('dashboard/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>
</html>
