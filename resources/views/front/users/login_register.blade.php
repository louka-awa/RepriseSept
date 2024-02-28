@extends('front.layout.layout')
@section('content')
    <!-- En-tête de page -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>Compte</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">Accueil</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">Compte</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- En-tête de page /- -->
    <!-- Page de compte -->
    <div class="page-account u-s-p-t-80">
        <div class="container">
            @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès : </strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
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
                    <strong>Erreur : </strong> <?php echo implode('', $errors->all('<div>:message</div>')); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
            <div class="row">
                <!-- Connexion -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Connexion</h2>
                        <h6 class="account-h6 u-s-m-b-30">Bienvenue ! Connectez-vous à votre compte.</h6>
                        <p id="login-error"></p>
                        <form id="loginForm" action="javascript:;" method="post">@csrf
                            <div class="u-s-m-b-30">
                                <label for="user-email">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="users-email" class="text-field" placeholder="Email">
                                <p id="login-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-password">Mot de passe
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="users-password" class="text-field" placeholder="Mot de passe">
                                <p id="login-password"></p>
                            </div>
                            <div class="group-inline u-s-m-b-30">
                                <!-- <div class="group-1">
                                    <input type="checkbox" class="check-box" id="remember-me-token">
                                    <label class="label-text" for="remember-me-token">Se souvenir de moi</label>
                                </div> -->
                                <div class="group-2 text-right">
                                    <div class="page-anchor">
                                        <a href="{{ url('user/forgot-password') }}">
                                            <i class="fas fa-circle-o-notch u-s-m-r-9"></i>Mot de passe oublié?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">Connexion</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Connexion /- -->
                <!-- Inscription -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">Inscription</h2>
                        <h6 class="account-h6 u-s-m-b-30">S'inscrire sur ce site vous permet d'accéder à l'état et à l'historique de vos commandes.</h6>
                        <p id="register-success"></p>
                        <form id="registerForm" action="javascript:;" method="post">@csrf
                            <div class="u-s-m-b-30">
                                <label for="username">Nom
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-name" name="name" class="text-field" placeholder="Nom d'utilisateur">
                                <p id="register-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">Mobile
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="user-mobile" name="mobile" class="text-field" placeholder="Mobile de l'utilisateur">
                                <p id="register-mobile"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">Email
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="user-email" name="email" class="text-field" placeholder="Email de l'utilisateur">
                                <p id="register-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">Mot de passe
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="user-password" name="password" class="text-field" placeholder="Mot de passe de l'utilisateur">
                                <p id="register-password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">J'ai lu et j'accepte les
                                    <a href="terms-and-conditions.html" class="u-c-brand">termes et conditions</a>
                                </label>
                                <p id="register-accept"></p>
                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">Inscription</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Inscription /- -->
            </div>
        </div>
    </div>
    <!-- Page de compte /- -->
@endsection
