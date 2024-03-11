<?php
use App\Models\Product;
use App\Models\Currency;
?>

@extends('front.layout.layout')

@section('content')
<!-- Carrousel Principal -->
<div class="default-height ph-item">
    <div class="slider-main owl-carousel">
        @foreach($sliderBanners as $banner)
        <div class="bg-image">
            <div class="slide-content">
                <h1><a @if(!empty($banner['link'])) href="{{ url($banner['link']) }}" @else href="javascript:;" @endif><img title="{{ $banner['title'] }}" alt="{{ $banner['title'] }}" src="{{ asset('front/images/banner_images/'.$banner['image']) }}"></a></h1>
                <h2>{{ $banner['title'] }}</h2>
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- Carrousel Principal /- -->

@if(isset($fixBanners[0]['image']))
<!-- Couche de la Bannière -->
<div class="banner-layer">
    <div class="container">
        <div class="image-banner">
            <a target="_blank" rel="nofollow" href="{{ url($fixBanners[0]['link']) }}" class="mx-auto banner-hover effect-dark-opacity">
                <img class="img-fluid" src="{{ asset('front/images/banner_images/'.$fixBanners[0]['image']) }}" alt="{{ $fixBanners[0]['alt'] }}" title="{{ $fixBanners[0]['title'] }}">
            </a>
        </div>
    </div>
</div>
<!-- Couche de la Bannière /- -->
@endif



<!-- Collection Top -->
<section class="section-maker">
    <div class="container">
        <div class="sec-maker-header text-center">
            <h3 class="sec-maker-h3">TOP COLLECTION</h3>
            <ul class="nav tab-nav-style-1-a justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#men-latest-products">Nouveautés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">Meilleures ventes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#discounted-products">Produits en promotion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#men-featured-products">Produits vedettes</a>
                </li>
            </ul>
        </div>
        <div class="wrapper-content">
            <div class="outer-area-tab">
                <div class="tab-content">
                    <div class="tab-pane active show fade" id="men-latest-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($newProducts as $product)
                                <?php // echo "<pre>"; print_r($product); die; ?>
                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Produit">
                                            @else
                                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Produit">
                                            @endif
                                        </a>
                                        <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Aperçu rapide</a>
                                            <a class="item-mail" href="javascript:void(0)">Courriel</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Ajouter à la liste de souhaits</a>
                                            <a class="item-addCart" href="javascript:void(0)">Ajouter au panier</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li>
                                                    <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 sur 5 - basé sur 0 avis">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                        @if(isset($_GET['cy'])&&$_GET['cy']!="F CFA")
                                            @php
                                                $getCurrency = Currency::where('currency_code',$_GET['cy'])->first()->toArray();
                                            @endphp
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($getDiscountPrice/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                                <div class="item-old-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $getDiscountPrice }} F CFA
                                                </div>
                                                <div class="item-old-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="tag new">
                                        <span>NOUVEAU</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane show fade" id="men-best-selling-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($bestSellers as $product)
                                <?php // echo "<pre>"; print_r($product); die; ?>
                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Produit">
                                            @else
                                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Produit">
                                            @endif
                                        </a>
                                        <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Aperçu rapide</a>
                                            <a class="item-mail" href="javascript:void(0)">Courriel</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Ajouter à la liste de souhaits</a>
                                            <a class="item-addCart" href="javascript:void(0)">Ajouter au panier</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li>
                                                    <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 sur 5 - basé sur 0 avis">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                        @if(isset($_GET['cy'])&&$_GET['cy']!="F CFA")
                                            @php
                                                $getCurrency = Currency::where('currency_code',$_GET['cy'])->first()->toArray();
                                            @endphp
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($getDiscountPrice/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                                <div class="item-old-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $getDiscountPrice }} F CFA
                                                </div>
                                                <div class="item-old-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="tag new">
                                        <span>NOUVEAU</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="discounted-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                                @foreach($discountedProducts as $product)
                                <?php // echo "<pre>"; print_r($product); die; ?>
                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Produit">
                                            @else
                                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Produit">
                                            @endif
                                        </a>
                                        <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Aperçu rapide</a>
                                            <a class="item-mail" href="javascript:void(0)">Courriel</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Ajouter à la liste de souhaits</a>
                                            <a class="item-addCart" href="javascript:void(0)">Ajouter au panier</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li>
                                                    <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 sur 5 - basé sur 0 avis">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                        @if(isset($_GET['cy'])&&$_GET['cy']!="F CFA")
                                            @php
                                                $getCurrency = Currency::where('currency_code',$_GET['cy'])->first()->toArray();
                                            @endphp
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($getDiscountPrice/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                                <div class="item-old-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $getDiscountPrice }} F CFA
                                                </div>
                                                <div class="item-old-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="tag new">
                                        <span>NOUVEAU</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="men-featured-products">
                        <div class="slider-fouc">
                            <div class="products-slider owl-carousel" data-item="4">
                            @foreach($featuredProducts as $product)
                                <?php // echo "<pre>"; print_r($product); die; ?>
                                <?php $product_image_path = 'front/images/product_images/small/'.$product['product_image']; ?>
                                <div class="item">
                                    <div class="image-container">
                                        <a class="item-img-wrapper-link" href="{{ url('product/'.$product['id']) }}">
                                            @if(!empty($product['product_image']) && file_exists($product_image_path))
                                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="Produit">
                                            @else
                                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="Produit">
                                            @endif
                                        </a>
                                        <div class="item-action-behaviors">
                                            <a class="item-quick-look" data-toggle="modal" href="#quick-view">Aperçu rapide</a>
                                            <a class="item-mail" href="javascript:void(0)">Courriel</a>
                                            <a class="item-addwishlist" href="javascript:void(0)">Ajouter à la liste de souhaits</a>
                                            <a class="item-addCart" href="javascript:void(0)">Ajouter au panier</a>
                                        </div>
                                    </div>
                                    <div class="item-content">
                                        <div class="what-product-is">
                                            <ul class="bread-crumb">
                                                <li>
                                                    <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_code'] }}</a>
                                                </li>
                                            </ul>
                                            <h6 class="item-title">
                                                <a href="{{ url('product/'.$product['id']) }}">{{ $product['product_name'] }}</a>
                                            </h6>
                                            <div class="item-stars">
                                                <div class='star' title="0 sur 5 - basé sur 0 avis">
                                                    <span style='width:0'></span>
                                                </div>
                                                <span>(0)</span>
                                            </div>
                                        </div>
                                        <?php $getDiscountPrice = Product::getDiscountPrice($product['id']); ?>
                                        @if(isset($_GET['cy'])&&$_GET['cy']!="F CFA")
                                            @php
                                                $getCurrency = Currency::where('currency_code',$_GET['cy'])->first()->toArray();
                                            @endphp
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($getDiscountPrice/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                                <div class="item-old-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                    {{$_GET['cy']}} {{ round($product['product_price']/$getCurrency['exchange_rate'],2) }}
                                                </div>
                                            </div>
                                            @endif
                                        @else
                                            @if($getDiscountPrice>0)
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $getDiscountPrice }} F CFA
                                                </div>
                                                <div class="item-old-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @else
                                            <div class="price-template">
                                                <div class="item-new-price">
                                                     {{ $product['product_price'] }} F CFA
                                                </div>
                                            </div>
                                            @endif
                                        @endif
                                    </div>
                                    <div class="tag new">
                                        <span>NOUVEAU</span>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin Collection Top /- -->


@if(isset($fixBanners[1]['image']))
<!-- Calque de la bannière -->
<div class="banner-layer">
    <div class="container">
        <div class="image-banner">
            <a target="_blank" rel="nofollow" href="{{ url($fixBanners[1]['link']) }}" class="mx-auto banner-hover effect-dark-opacity">
                <img class="img-fluid" src="{{ asset('front/images/banner_images/'.$fixBanners[1]['image']) }}" alt="{{ $fixBanners[1]['alt'] }}" title="{{ $fixBanners[1]['title'] }}">
            </a>
        </div>
    </div>
</div>
<!-- /Calque de la bannière -->
@endif
<!-- Priorités du site -->
<section class="app-priority">
    <div class="container">
        <div class="priority-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-star"></i>
                        </div>
                        <h2>
                            Excellent rapport qualité-prix
                        </h2>
                        <p>Nous proposons des prix compétitifs sur notre gamme de produits de plus de 100 millions</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-cash"></i>
                        </div>
                        <h2>
                            Achetez en toute confiance
                        </h2>
                        <p>Notre protection couvre votre achat de la commande à la livraison</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-ios-card"></i>
                        </div>
                        <h2>
                            Paiement sécurisé
                        </h2>
                        <p>Payez avec les méthodes de paiement les plus populaires et sécurisées au monde</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <div class="single-item-wrapper">
                        <div class="single-item-icon">
                            <i class="ion ion-md-contacts"></i>
                        </div>
                        <h2>
                            Centre d'aide 24/7
                        </h2>
                        <p>Assistance en continu pour une expérience d'achat fluide</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Priorités du site -->
@endsection

