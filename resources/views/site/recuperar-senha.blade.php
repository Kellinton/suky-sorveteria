<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('dashboard/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('img/logo_suky.png') }}">
  <title>
    Recuperar Senha
  </title>
  <!-- tag CSRF do token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="{{ asset('dashboard/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('dashboard/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('dashboard/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <!-- Navbar -->
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
              <i class="fa fa-home opacity-6  me-1"></i>
              Voltar ao Login
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
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
                <form action="{{ route('recuperar-senha.validar') }}" role="form" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" required class="form-control" placeholder="Informe o Email" aria-label="Email" aria-describedby="email-addon"  value="{{ old('email') }}">

                  @if($errors->has('email'))
                      <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                          <span class="alert-text text-light"><strong>Erro! </strong>{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                   @endif

                  </div>
                  <div class="mb-3">
                    <label>Token</label>
                    <input type="text" name="token" required class="form-control" placeholder="Informe o Token" aria-label="Token" aria-describedby="token-addon"  value="{{ old('token') }}">

                  @if($errors->has('token'))
                      <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                          <span class="alert-text text-light"><strong>Erro! </strong>{{ $errors->has('token') ? $errors->first('token') : '' }}</span>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                   @endif

                  </div>

                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 mt-4 mb-0">Recuperar Senha</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>
  <!--   Core JS Files   -->
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
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('dashboard/js/soft-ui-dashboard.min.js?v=1.0.7') }}"></script>
</body>

</html>
