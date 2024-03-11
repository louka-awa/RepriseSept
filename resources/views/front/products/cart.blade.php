<?php use App\Models\Product; ?>
@extends('front.layout.layout')
@section('content')
<!-- Enveloppe d'introduction de la page -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Panier</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="index.html">Accueil</a>
                </li>
                <li class="is-marked">
                    <a href="cart.html">Panier</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Enveloppe d'introduction de la page /- -->
<!-- Page du Panier -->
<div class="page-cart u-s-p-t-80">
    <div class="container">
        @if(Session::has('error_message'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Erreur : </strong> <?php echo Session::get('error_message'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
          @endif

          @if(Session::has('success_message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succès : </strong> <?php echo Session::get('success_message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
        <div class="row">
            <div class="col-lg-12">
                <div id="appendCartItems">
                    @include('front.products.cart_items')
                </div>
                <!-- Coupon -->
                <div class="coupon-continue-checkout u-s-m-b-60">
                    <div class="coupon-area">
                        <h6>Entrez votre code de coupon si vous en avez un.</h6>
                        <div class="coupon-field">
                            <form id="ApplyCoupon" method="post" action="javascript:void(0);" @if(Auth::check()) user="1" @endif>@csrf
                            <div class="coupon-field">
                                <label class="sr-only" for="coupon-code">Appliquer le coupon</label>
                                <input name="code" id="code" type="text" class="text-field" placeholder="Entrez le code du coupon">
                                <button type="submit" class="button">Appliquer le coupon</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="button-area">
                        <a href="{{ url('/') }}" class="continue">Continuer vos achats</a>
                        <a href="{{ url('/checkout') }}" class="checkout">Procéder au paiement</a>
                    </div>
                </div>
                <!-- Coupon /- -->
            </div>
        </div>
    </div>
</div>
<!-- Page du Panier /- -->
@endsection
