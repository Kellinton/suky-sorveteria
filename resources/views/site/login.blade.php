<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="dashboard/img/apple-icon.png">
  <link rel="icon" type="image/png" href="img/favicon_suky.png">
  <title>
    Login - Suky Sorveteria
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Ícones Nucleo -->
  <link href="dashboard/css/nucleo-icons.css" rel="stylesheet" />
  <link href="dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Ícones Font Awesome -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="dashboard/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Arquivos CSS -->
  <link id="pagestyle" href="dashboard/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha é uma ferramenta de análise web fácil de usar. Sem cookies e totalmente compatível com GDPR, CCPA e PECR. -->
  <script defer data-site="SEU_DOMÍNIO_AQUI" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4 w-100 w-lg-65">
          <div class="container-fluid pe-0">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
              <i class="fa fa-home opacity-6 text-dark me-1"></i>
              Acessar Site
            </a>
            <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
              <ul class="navbar-nav mx-auto ms-xl-auto me-xl-7">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center me-2 active" aria-current="page" href="../pages/dashboard.html">
                    <i class="fa fa-instagram opacity-6 text-dark me-1"></i>
                    Instagram
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/profile.html">
                    <i class="fa fa-linkedin-square opacity-6 text-dark me-1"></i>
                    LinkedIn
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link me-2" href="../pages/sign-in.html">
                    <i class="fa fa-envelope-o opacity-6 text-dark me-1"></i>
                    suky@gmail.com
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-75">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto mt-8">
              <div class="card-header d-flex justify-content-center pb-0 text-left bg-transparent">
                <img src="img/logo_suky.png" class="w-35">
              </div>
              <div class="card card-plain mt-2">
                <div class="card-header pb-0 text-left bg-transparent">
                  <h3 class="font-weight-bolder text-info text-gradient">Bem-vindo!</h3>
                  <p class="mb-0">Digite seu e-mail e senha para entrar</p>
                </div>
                <div class="card-body">
                  <form action="{{ route('login.autenticar') }}" role="form" method="POST">
                    @csrf
                    <label>Email</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon"  value="{{ old('email') }}">
                      {{ $errors->has('email') ? $errors->first('email') : '' }}
                    </div>
                    <label>Senha</label>
                    <div class="mb-3">
                      <input type="password" class="form-control" placeholder="Senha" aria-label="Senha" aria-describedby="password-addon"  value="{{ old('senha') }}">
                      {{ $errors->has('password') ? $errors->first('password') : '' }}
                    </div>
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                      <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Entrar</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  {{-- <p class="mb-4 text-sm mx-auto">
                    Não tem uma conta?
                    <a href="javascript:;" class="text-info text-gradient font-weight-bold">Registre-se</a>
                  </p> --}}
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('dashboard/img/banner/banner_login1.jpg')"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <footer class="footer py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mb-4 mx-auto text-center">
          <a href="{{ url('/') }}" target="_blank" class="text-secondary me-xl-5 me-3 mb-sm-0 mb-2">
          <i class="fa fa-home opacity-6 text-dark me"></i>
           Acessar Site
          </a>
          <a href="https://github.com/CodeForgeGroup" target="_blank" class="text-secondary me-xl-4 me-4">
            <span class="text-lg fab fa-github"></span>
            Code Forge
          </a>
        </div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto text-center mt-1">
          <p class="mb-0 text-secondary">
            Direitos autorais © <script>
              document.write(new Date().getFullYear())
            </script> Code Forge
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
  <!--   Arquivos JS Principais   -->
  <script src="dashboard/js/core/popper.min.js"></script>
  <script src="dashboard/js/core/bootstrap.min.js"></script>
  <script src="dashboard/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="dashboard/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator
