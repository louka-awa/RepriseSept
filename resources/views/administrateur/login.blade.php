<!DOCTYPE html>
<html lang="fr">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Panneau d'administration Loukaawa</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ url('administrateur/vendors/feather/feather.css')}}">
  <link rel="stylesheet" href="{{ url('administrateur/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ url('administrateur/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ url('administrateur/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('administrateur/images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <!-- <div class="brand-logo">
                <img src="{{ url('administrateur/images/logo.svg') }}" alt="logo">
              </div> -->
              <h4>Bonjour ! Commençons</h4>
              <h6 class="font-weight-light">Connectez-vous pour continuer.</h6>
              @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur : </strong> {{ Session::get('error_message')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

              <form class="pt-3" action="{{ url('administrateur/login') }}" method="post">@csrf
                <div class="form-group">
                  <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Nom d'utilisateur" required="">
                </div>
                <div class="form-group">
                  <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Mot de passe" required="">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SE CONNECTER</button>
                </div>
                <!-- <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Rester connecté
                    </label>
                  </div>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ url('administrateur/vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ url('administrateur/js/off-canvas.js') }}"></script>
  <script src="{{ url('administrateur/js/hoverable-collapse.js') }}"></script>
  <script src="{{ url('administrateur/js/template.js') }}"></script>
  <script src="{{ url('administrateur/js/settings.js') }}"></script>
  <script src="{{ url('administrateur/js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>
