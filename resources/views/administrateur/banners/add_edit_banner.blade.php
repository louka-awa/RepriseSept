@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h4 class="card-title">Bannières de la page d'accueil</h4>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Aujourd'hui (10 Jan 2021)
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
                  <h4 class="card-title">{{ $title }}</h4>
                  @if(Session::has('error_message'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erreur : </strong> {{ Session::get('error_message')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                  @endif

                  @if(Session::has('success_message'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Succès : </strong> {{ Session::get('success_message')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                    <button type="button" class="close" data-dismiss="alert" aria-label="Fermer">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif
                  
                  <form class="forms-sample" @if(empty($banner['id'])) action="{{ url('admin/add-edit-banner') }}" @else action="{{ url('admin/add-edit-banner/'.$banner['id']) }}" @endif method="post" enctype="multipart/form-data">@csrf
                    
                    <div class="form-group">
                      <label for="link">Type de bannière</label>
                      <select class="form-control" id="type" name="type" required="">
                        <option value="">Sélectionner</option>
                        <option @if(!empty($banner['type'])&& $banner['type']=="Slider") selected="" @endif value="Slider">Diaporama</option>
                        <option @if(!empty($banner['type'])&& $banner['type']=="Fix") selected="" @endif value="Fix">Fixe</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="admin_image">Image de la bannière</label>
                      <input type="file" class="form-control" id="image" name="image">
                      @if(!empty($banner['image']))
                        <a target="_blank" href="{{ url('front/images/banner_images/'.$banner['image']) }}">Voir l'image</a>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="link">Lien de la bannière</label>
                      <input type="text" class="form-control" id="link" placeholder="Entrez le lien de la bannière" name="link" @if(!empty($banner['link'])) value="{{ $banner['link'] }}" @else value="{{ old('link') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="title">Titre de la bannière</label>
                      <input type="text" class="form-control" id="title" placeholder="Entrez le titre de la bannière" name="title" @if(!empty($banner['title'])) value="{{ $banner['title'] }}" @else value="{{ old('title') }}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="alt">Texte alternatif de la bannière</label>
                      <input type="text" class="form-control" id="alt" placeholder="Entrez le texte alternatif de la bannière" name="alt" @if(!empty($banner['alt'])) value="{{ $banner['alt'] }}" @else value="{{ old('alt') }}" @endif>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
                    <button type="reset" class="btn btn-light">Annuler</button>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
    </div>
    <!-- fin du wrapper de contenu -->
    <!-- partiel :partials/_footer.html -->
    @include('admin.layout.footer')
    <!-- partiel -->
</div>
@endsection
