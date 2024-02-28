<?php use App\Models\Product;
use App\Models\Currency;
?>
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
                    <a href="#">Merci</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Enveloppe d'introduction de la page /- -->
<!-- Page du panier -->
<div class="page-cart u-s-p-t-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center">
                <h3>VOTRE COMMANDE A ÉTÉ PASSÉE AVEC SUCCÈS</h3>
                <p>
                    Votre numéro de commande est {{ Session::get('order_id') }} et le montant total est
                    @if(isset($_GET['cy'])&&$_GET['cy']!="INR")
                        @php
                            $getCurrency = Currency::where('currency_code',$_GET['cy'])->first()->toArray();
                        @endphp
                        {{$_GET['cy']}} {{ round(Session::get('grand_total')/$getCurrency['exchange_rate'],2) }}
                    @else
                        INR {{ Session::get('grand_total') }}
                    @endif
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Page du panier /- -->
@endsection

<?php
    Session::forget('grand_total');
    Session::forget('order_id');
    Session::forget('couponCode');
    Session::forget('couponAmount');
?>
