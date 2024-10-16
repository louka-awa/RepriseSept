@extends('admin.layout.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Update Vendor Details</h3>
                        <!-- <h6 class="font-weight-normal mb-0">Update Admin Password</h6> -->
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="justify-content-end d-flex">
                            <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <i class="mdi mdi-calendar"></i> Today (10 Jan 2021)
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                                    <a class="dropdown-item" href="#">January - March</a>
                                    <a class="dropdown-item" href="#">March - June</a>
                                    <a class="dropdown-item" href="#">June - August</a>
                                    <a class="dropdown-item" href="#">August - November</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
@if($slug=="personal")
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Mettre à jour les informations personnelles</h4>
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
          
          <form class="forms-sample" action="{{ url('admin/update-vendor-details/personal') }}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
              <label>Nom d'utilisateur / Email du fournisseur</label>
              <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
            </div>
            <div class="form-group">
              <label for="vendor_name">Nom</label>
              <input type="text" class="form-control" id="vendor_name" placeholder="Entrez le nom" name="vendor_name" value="{{ Auth::guard('admin')->user()->name }}">
            </div>
            <div class="form-group">
              <label for="vendor_address">Adresse</label>
              <input type="text" class="form-control" id="vendor_address" placeholder="Entrez l'adresse" name="vendor_address" value="{{ $vendorDetails['address'] }}">
            </div>
            <div class="form-group">
              <label for="vendor_city">Ville</label>
              <input type="text" class="form-control" id="vendor_city" placeholder="Entrez la ville" name="vendor_city" value="{{ $vendorDetails['city'] }}">
            </div>
            <div class="form-group">
              <label for="vendor_state">État</label>
              <input type="text" class="form-control" id="vendor_state" placeholder="Entrez l'état" name="vendor_state" value="{{ $vendorDetails['state'] }}">
            </div>
            <div class="form-group">
              <label for="vendor_country">Pays</label>
              <select class="form-control" id="vendor_country" name="vendor_country" style="color: #495057;">
                <option value="">Sélectionnez un pays</option>
                @foreach($countries as $country)
                  <option value="{{ $country['country_name'] }}" @if($country['country_name']==$vendorDetails['country']) selected @endif>{{ $country['country_name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="vendor_pincode">Code postal</label>
              <input type="text" class="form-control" id="vendor_pincode" placeholder="Entrez le code postal" name="vendor_pincode" value="{{ $vendorDetails['pincode'] }}">
            </div>
            <div class="form-group">
              <label for="vendor_mobile">Mobile</label>
              <input type="text" class="form-control" id="vendor_mobile" placeholder="Entrez le numéro de mobile à 10 chiffres" name="vendor_mobile" value="{{ Auth::guard('admin')->user()->mobile }}" required="" maxlength="10" minlength="10">
            </div>
            <div class="form-group">
              <label for="vendor_image">Photo</label>
              <input type="file" class="form-control" id="vendor_image" name="vendor_image">
              @if(!empty(Auth::guard('admin')->user()->image))
                <a target="_blank" href="{{ url('admin/images/photos/'.Auth::guard('admin')->user()->image) }}">Voir l'image</a>
                <input type="hidden" name="current_vendor_image" value="{{ Auth::guard('admin')->user()->image }}">
              @endif
            </div>
            <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
            <button type="reset" class="btn btn-light">Annuler</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
@elseif($slug=="business")

<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Mettre à jour les informations commerciales</h4>
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
          
          <form class="forms-sample" action="{{ url('admin/update-vendor-details/business') }}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
              <label>Nom d'utilisateur / Email du fournisseur</label>
              <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
            </div>
            <div class="form-group">
              <label for="shop_name">Nom du magasin</label>
              <input type="text" class="form-control" id="shop_name" placeholder="Entrez le nom du magasin" name="shop_name" @if(isset($vendorDetails['shop_name'])) value="{{ $vendorDetails['shop_name'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="shop_address">Adresse du magasin</label>
              <input type="text" class="form-control" id="shop_address" placeholder="Entrez l'adresse du magasin" name="shop_address" @if(isset($vendorDetails['shop_address'])) value="{{ $vendorDetails['shop_address'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="shop_city">Ville du magasin</label>
              <input type="text" class="form-control" id="shop_city" placeholder="Entrez la ville du magasin" name="shop_city" @if(isset($vendorDetails['shop_city'])) value="{{ $vendorDetails['shop_city'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="shop_state">État du magasin</label>
              <input type="text" class="form-control" id="shop_state" placeholder="Entrez l'état du magasin" name="shop_state" @if(isset($vendorDetails['shop_state'])) value="{{ $vendorDetails['shop_state'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="shop_country">Pays du magasin</label>
              <select class="form-control" id="shop_country" name="shop_country" style="color: #495057;">
                <option value="">Sélectionnez un pays</option>
                @foreach($countries as $country)
                  <option value="{{ $country['country_name'] }}" @if(isset($vendorDetails['shop_country']) && $country['country_name']==$vendorDetails['shop_country']) selected @endif>{{ $country['country_name'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="shop_pincode">Code postal du magasin</label>
              <input type="text" class="form-control" id="shop_pincode" placeholder="Entrez le code postal du magasin" name="shop_pincode" @if(isset($vendorDetails['shop_pincode'])) value="{{ $vendorDetails['shop_pincode'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="shop_mobile">Mobile du magasin</label>
              <input type="text" class="form-control" id="shop_mobile" placeholder="Entrez le numéro de mobile à 10 chiffres" name="shop_mobile" @if(isset($vendorDetails['shop_mobile'])) value="{{ $vendorDetails['shop_mobile'] }}" @endif required="" maxlength="10" minlength="10">
            </div>
            <div class="form-group">
              <label for="business_license_number">Numéro de licence commerciale</label>
              <input type="text" class="form-control" id="business_license_number" placeholder="Entrez le numéro de licence commerciale" name="business_license_number" @if(isset($vendorDetails['business_license_number'])) value="{{ $vendorDetails['business_license_number'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="gst_number">Numéro GST</label>
              <input type="text" class="form-control" id="gst_number" placeholder="Entrez le numéro GST" name="gst_number" @if(isset($vendorDetails['gst_number'])) value="{{ $vendorDetails['gst_number'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="pan_number">Numéro PAN</label>
              <input type="text" class="form-control" id="pan_number" placeholder="Entrez le numéro PAN" name="pan_number" @if(isset($vendorDetails['pan_number'])) value="{{ $vendorDetails['pan_number'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="address_proof">Preuve d'adresse</label>
              <select class="form-control" name="address_proof" id="address_proof">
                <option value="Passport" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="Passport") selected @endif>Passeport</option>
                <option value="Voting Card" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="Voting Card") selected @endif>Carte électorale</option>
                <option value="PAN" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="PAN") selected @endif>PAN</option>
                <option value="Driving License" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="Driving License") selected @endif>Permis de conduire</option>
                <option value="Aadhar card" @if(isset($vendorDetails['address_proof']) && $vendorDetails['address_proof']=="Aadhar Card") selected @endif>Carte Aadhar</option>
              </select>
            </div>
            <div class="form-group">
              <label for="address_proof_image">Image de la preuve d'adresse</label>
              <input type="file" class="form-control" id="address_proof_image" name="address_proof_image">
              @if(!empty($vendorDetails['address_proof_image']))
                <a target="_blank" href="{{ url('admin/images/proofs/'.$vendorDetails['address_proof_image']) }}">Voir l'image</a>
                <input type="hidden" name="current_address_proof" value="{{ $vendorDetails['address_proof_image'] }}">
              @endif
            </div>
            <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
            <button type="reset" class="btn btn-light">Annuler</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
@elseif($slug=="bank")
<div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Mettre à jour les informations bancaires</h4>
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
          
          <form class="forms-sample" action="{{ url('admin/update-vendor-details/bank') }}" method="post" enctype="multipart/form-data">@csrf
            <div class="form-group">
              <label>Nom d'utilisateur / Email du fournisseur</label>
              <input class="form-control" value="{{ Auth::guard('admin')->user()->email }}" readonly="">
            </div>
            <div class="form-group">
              <label for="account_holder_name">Nom du titulaire du compte</label>
              <input type="text" class="form-control" id="account_holder_name" placeholder="Entrez le nom du titulaire du compte" name="account_holder_name" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['account_holder_name'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="bank_name">Nom de la banque</label>
              <input type="text" class="form-control" id="bank_name" placeholder="Entrez le nom de la banque" name="bank_name" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['bank_name'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="account_number">Numéro de compte</label>
              <input type="text" class="form-control" id="account_number" placeholder="Entrez le numéro de compte" name="account_number" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['account_number'] }}" @endif>
            </div>
            <div class="form-group">
              <label for="bank_ifsc_code">Code IFSC de la banque</label>
              <input type="text" class="form-control" id="bank_ifsc_code" placeholder="Entrez le code IFSC de la banque" name="bank_ifsc_code" @if(isset($vendorDetails['account_holder_name'])) value="{{ $vendorDetails['bank_ifsc_code'] }}" @endif>
            </div>
            <button type="submit" class="btn btn-primary mr-2">Soumettre</button>
            <button type="reset" class="btn btn-light">Annuler</button>
          </form>
        </div>
      </div>
    </div>
    
  </div>
@endif
</div>
<!-- fin du wrapper de contenu -->
<!-- partiel :partials/_footer.html -->
@include('admin.layout.footer')
<!-- partiel -->
</div>
@endsection
