@extends('administrateur.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Paramètres</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Mettre à jour le mot de passe de l'administrateur</h6> -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Aujourd'hui (10 janv. 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">Janvier - Mars</a>
                                    <a class="dropdown-item" href="#">Mars - Juin</a>
                                    <a class="dropdown-item" href="#">Juin - Août</a>
                                    <a class="dropdown-item" href="#">Août - Novembre</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Mettre à jour les détails de l'administrateur</h4>
                  @if(Session::has('error_message'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur : </strong> {{ Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif

                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès : </strong> {{ Session::get('success_message')}}
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

                  <form class="forms-sample" action="{{ url('administrateur/update-administrateur-details') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="form-group">
                      <label>Nom d'utilisateur/Email de l'administrateur</label>
                      <input class="form-control" value="{{ Auth::guard('administrateur')->user()->email }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label>Type d'administrateur</label>
                      <input class="form-control" value="{{ Auth::guard('administrateur')->user()->type }}" readonly="">
                    </div>
                    <div class="form-group">
                      <label for="admin_name">Nom</label>
                      <input type="text" class="form-control" id="admin_name" placeholder="Entrez le nom" name="admin_name" value="{{ Auth::guard('administrateur')->user()->name }}">
                    </div>
                    <div class="form-group">
                      <label for="admin_mobile">Mobile</label>
                      <input type="text" class="form-control" id="admin_mobile" placeholder="Entrez le numéro de mobile à 10 chiffres" name="admin_mobile" value="{{ Auth::guard('administrateur')->user()->mobile }}" required="" maxlength="10" minlength="10">
                    </div>
                    <div class="form-group">
                      <label for="admin_image">Photo de l'administrateur</label>
                      <input type="file" class="form-control" id="admin_image" name="admin_image">
                      @if(!empty(Auth::guard('administrateur')->user()->image))
                        <a target="_blank" href="{{ url('administrateur/images/photos/'.Auth::guard('administrateur')->user()->image) }}">Voir l'image</a>
                        <input type="hidden" name="current_admin_image" value="{{ Auth::guard('administrateur')->user()->image }}">
                      @endif
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
                    <button type="reset" class="btn btn-light">Annuler</button>
                  </form>
                </div>
              </div>
            </div>

          </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    @include('administrateur.layout.footer')
    <!-- partial -->
</div>
@endsection
