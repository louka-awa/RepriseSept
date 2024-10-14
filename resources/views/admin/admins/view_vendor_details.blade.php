@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Détails du vendeur</h3>
                        <h6 class="font-weight-normal mb-0"><a href="{{ url('admin/admins/vendor') }}">Retour aux vendeurs</a></h6>
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
                        <h4 class="card-title">Informations personnelles</h4>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" value="{{ $vendorDetails['vendor_personal']['email'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_name">Nom</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['name'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_address">Adresse</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['address'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_city">Ville</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['city'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_state">État</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['state'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_country">Pays</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['country'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_pincode">Code postal</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['pincode'] }}" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_mobile">Mobile</label>
                            <input type="text" class="form-control" value="{{ $vendorDetails['vendor_personal']['mobile'] }}" readonly="">
                        </div>
                        @if(!empty($vendorDetails['image']))
                        <div class="form-group">
                            <label for="vendor_image">Photo</label>
                            <br><img style="width: 200px;" src="{{ url('admin/images/photos/'.$vendorDetails['image']) }}">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informations commerciales</h4>
                        <div class="form-group">
                            <label for="vendor_name">Nom du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_name'])) value="{{ $vendorDetails['vendor_business']['shop_name'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_address">Adresse du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_address'])) value="{{ $vendorDetails['vendor_business']['shop_address'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_city">Ville du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_city'])) value="{{ $vendorDetails['vendor_business']['shop_city'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_state">État du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_state'])) value="{{ $vendorDetails['vendor_business']['shop_state'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_country">Pays du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_country'])) value="{{ $vendorDetails['vendor_business']['shop_country'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_pincode">Code postal du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_pincode'])) value="{{ $vendorDetails['vendor_business']['shop_pincode'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_mobile">Mobile du magasin</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_business']['shop_mobile'])) value="{{ $vendorDetails['vendor_business']['shop_mobile'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label>Site Web du magasin</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_business']['shop_website'])) value="{{ $vendorDetails['vendor_business']['shop_website'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label>Email du magasin</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_business']['shop_email'])) value="{{ $vendorDetails['vendor_business']['shop_email'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label>Numéro de licence commerciale</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_business']['business_license_number'])) value="{{ $vendorDetails['vendor_business']['business_license_number'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label>Numéro GST</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_business']['gst_number'])) value="{{ $vendorDetails['vendor_business']['gst_number'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label>Numéro de Pan</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_business']['pan_number'])) value="{{ $vendorDetails['vendor_business']['pan_number'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label>Preuve d'adresse</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_business']['address_proof'])) value="{{ $vendorDetails['vendor_business']['address_proof'] }}" @endif readonly="">
                        </div>
                        @if(!empty($vendorDetails['vendor_business']['address_proof_image']))
                        <div class="form-group">
                            <label for="vendor_image">Photo</label>
                            <br><img style="width: 200px;" src="{{ url('admin/images/proofs/'.$vendorDetails['vendor_business']['address_proof_image']) }}">
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informations bancaires</h4>
                        <div class="form-group">
                            <label>Nom du titulaire du compte</label>
                            <input class="form-control" @if(isset($vendorDetails['vendor_bank']['account_holder_name'])) value="{{ $vendorDetails['vendor_bank']['account_holder_name'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_name">Nom de la banque</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_bank']['bank_name'])) value="{{ $vendorDetails['vendor_bank']['bank_name'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_address">Numéro de compte</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_bank']['account_number'])) value="{{ $vendorDetails['vendor_bank']['account_number'] }}" @endif readonly="">
                        </div>
                        <div class="form-group">
                            <label for="vendor_city">Code IFSC</label>
                            <input type="text" class="form-control" @if(isset($vendorDetails['vendor_bank']['bank_ifsc_code'])) value="{{ $vendorDetails['vendor_bank']['bank_ifsc_code'] }}" @endif readonly="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Informations sur la commission</h4>
                        @if(Session::has('success_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Succès : </strong> {{ Session::get('success_message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Commission par article de commande (%)</label>
                            <form method="post" action="{{ url('admin/update-vendor-commission') }}">
                                @csrf
                                <input type="hidden" name="vendor_id" value="{{ $vendorDetails['vendor_personal']['id'] }}">
                                <input name="commission" class="form-control" @if(isset($vendorDetails['vendor_personal']['commission'])) value="{{ $vendorDetails['vendor_personal']['commission'] }}" @endif required="">
                                <br>
                                <button type="submit">Mettre à jour</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    @include('admin.layout.footer')
    <!-- partial -->
</div>
@endsection
