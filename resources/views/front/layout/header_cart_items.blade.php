<?php
use App\Models\Product;
$getCartItems = getCartItems();
?>
<!-- Mini Panier -->
<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            VOTRE PANIER
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list">
            @php $total_price = 0 @endphp
            @foreach($getCartItems as $item)
            <?php $getDiscountAttributePrice = Product::getDiscountAttributePrice($item['product_id'],$item['size']);
            ?>
            <li class="clearfix">
                <a href="{{ url('product/'.$item['product_id'])}}">
                    <img src="{{ asset('front/images/product_images/small/'.$item['product']['product_image']) }}" alt="Produit">
                    <span class="mini-item-name">{{ $item['product']['product_name'] }}</span>
                    <span class="mini-item-price">Rs.{{ $getDiscountAttributePrice['final_price'] }}</span>
                    <span class="mini-item-quantity"> x {{ $item['quantity'] }} </span>
                </a>
            </li>
            @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach
        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left">Total:</span>
            <span class="mini-total-price float-right">Rs.{{ $total_price }}</span>
        </div>
        <div class="mini-action-anchors">
            <a href="{{url('cart')}}" class="cart-anchor">Voir le panier</a>
            <a href="{{url('checkout')}}" class="checkout-anchor">Passer à la caisse</a>
        </div>
    </div>
</div>
<script>
    /* $('#mini-cart-close').on('click', function () {
        $('.mini-cart-wrapper').removeClass('mini-cart-open');
    }); */
</script>
