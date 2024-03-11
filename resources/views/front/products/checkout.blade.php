<?php use App\Models\Product;
use App\Models\Currency;
?>
@extends('front.layout.layout')
@section('content')
<!-- En-tête de la page -->
<div class="page-style-a">
    <div class="container">
        <div class="page-intro">
            <h2>Validation de la commande</h2>
            <ul class="bread-crumb">
                <li class="has-separator">
                    <i class="ion ion-md-home"></i>
                    <a href="index.html">Accueil</a>
                </li>
                <li class="is-marked">
                    <a href="checkout.html">Validation de la commande</a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- En-tête de la page /- -->
<!-- Page de validation de la commande -->
<div class="page-checkout u-s-p-t-80">
    <div class="container">
        @if(Session::has('error_message'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Erreur : </strong> <?php echo Session::get('error_message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <!-- Détails de facturation et de livraison -->
                        <div class="col-lg-6" id="deliveryAddresses">
                            @include('front.products.delivery_addresses')
                        </div>
                        <!-- Détails de facturation et de livraison /- -->
                        <!-- Validation de la commande -->
                        <div class="col-lg-6">
                            <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">@csrf

                                @if(count($deliveryAddresses)>0)
                                    <h4 class="section-h4">Adresses de livraison</h4>
                                    @foreach($deliveryAddresses as $address)
                                        <div class="control-group" style="float:left; margin-right:5px;"><input type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}" shipping_charges="{{ $address['shipping_charges'] }}" total_price="{{ $total_price }}" coupon_amount="{{ Session::get('couponAmount') }}" codpincodeCount="{{ $address['codpincodeCount'] }}" prepaidpincodeCount="{{ $address['prepaidpincodeCount'] }}"></div>
                                        <div><label class="control-label">{{ $address['name'] }}, {{ $address['address'] }}, {{ $address['city'] }}, {{ $address['state'] }}, {{ $address['country'] }} ({{ $address['mobile'] }}) </label>
                                            <a style="float: right; margin-left: 10px;" href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress">Supprimer</a>
                                            <a style="float: right;" href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress">Modifier</a>

                                        </div>
                                    @endforeach<br>
                                @endif

                                <h4 class="section-h4">Votre commande</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total_price = 0 @endphp
                                            @foreach($getCartItems as $item)
                                            <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
                                            ?>
                                            <tr>
                                                <td>
                                                    <a href="{{ url('product/'.$item['product_id'])}}"><img width="50" src="{{ asset('front/images/product_images/small/'.$item['product']['product_image']) }}" alt="Produit">
                                                    <h6 class="order-h6">{{ $item['product']['product_name'] }}<br>{{ $item['size'] }}/{{ $item['product']['product_color'] }}</h6></a>
                                                    <span class="order-span-quantity">x {{ $item['quantity'] }}</span>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">
                                                        @if(isset($_GET['cy'])&&$_GET['cy']!="INR")
                                                            @php
                                                                $getCurrency = Currency::where('currency_code',$_GET['cy'])->first()->toArray();
                                                            @endphp
                                                            {{$_GET['cy']}} {{ round($getDiscountAttributePrice['final_price'] * $item['quantity']/$getCurrency['exchange_rate'],2) }}
                                                        @else
                                                            {{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }} F CFA
                                                        @endif
                                                    </h6>
                                                </td>
                                            </tr>
                                            @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
                                            @endforeach
                                            @if(isset($_GET['cy'])&&$_GET['cy']!="INR")
                                                @php $total_price = round($total_price/$getCurrency['exchange_rate'],2) @endphp
                                            @endif
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Sous-total</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">
                                                        @if(isset($_GET['cy'])&&$_GET['cy']!="INR")
                                                            {{$_GET['cy']}} {{ $total_price }}
                                                        @else
                                                            {{ $total_price }} F CFA
                                                        @endif
                                                    </h3>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">Frais de livraison</h6>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6"><span class="shipping_charges">0 F CFA</span></h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h6 class="order-h6">Remise de coupon</h6>
                                                </td>
                                                <td>
                                                    <h6 class="order-h6">
                                                        @if(isset($_GET['cy'])&&$_GET['cy']!="INR")
                                                            @if(Session::has('couponAmount'))
                                                                <span class="couponAmount">
                                                                    {{$_GET['cy']}} {{ round(Session::get('couponAmount')/$getCurrency['exchange_rate'],2) }}
                                                                </span>
                                                            @else
                                                                {{$_GET['cy']}} 0
                                                            @endif
                                                        @else
                                                            @if(Session::has('couponAmount'))
                                                                <span class="couponAmount">{{ Session::get('couponAmount') }} F CFA</span>
                                                            @else
                                                                0 F CFA
                                                            @endif
                                                        @endif
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h3 class="order-h3">Total général</h3>
                                                </td>
                                                <td>
                                                    <h3 class="order-h3">
                                                        <strong class="grand_total">
                                                            @if(isset($_GET['cy'])&&$_GET['cy']!="INR")
                                                                {{$_GET['cy']}} {{ round($total_price - Session::get('couponAmount')/$getCurrency['exchange_rate'],2) }}
                                                            @else
                                                                {{ $total_price - Session::get('couponAmount') }} F CFA
                                                            @endif
                                                        </strong>
                                                    </h3>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="u-s-m-b-13 codMethod">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="cash-on-delivery" value="COD">
                                        <label class="label-text" for="cash-on-delivery">Paiement à la livraison</label>
                                    </div>
                                    <div class="u-s-m-b-13 prepaidMethod">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="paypal" value="Paypal">
                                        <label class="label-text" for="paypal">Paypal</label>
                                    </div>
                                    <div class="u-s-m-b-13 prepaidMethod">
                                        <input type="radio" class="radio-box" name="payment_gateway" id="iyzipay" value="iyzipay">
                                        <label class="label-text" for="iyzipay">iyzipay</label>
                                    </div>
                                    <div class="u-s-m-b-13">
                                        <input type="checkbox" class="check-box" id="accept" name="accept" value="Yes" title="Veuillez accepter les conditions générales">
                                        <label class="label-text no-color" for="accept">J'ai lu et j'accepte les
                                            <a href="terms-and-conditions.html" class="u-c-brand">conditions générales</a>
                                        </label>
                                    </div>
                                    <button type="submit" id="placeOrder" class="button button-outline-secondary">Passer la commande</button>
                                </div>
                            </form>
                        </div>
                        <!-- Validation de la commande /- -->
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Page de validation de la commande /- -->
@endsection
