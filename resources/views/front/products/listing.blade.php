@extends('front.layout.layout')
@section('content')
<!-- En-tête de page -->
<div class="page-style-a">
<div class="container">
    <div class="page-intro">
        <h2>Boutique</h2>
        <ul class="bread-crumb">
            <li class="has-separator">
                <i class="ion ion-md-home"></i>
                <a href="/">Accueil</a>
            </li>
            <li class="is-marked">
                <a href="{{route('recherche')}}">Boutique</a>
            </li>
        </ul>
    </div>
</div>
</div>
<!-- En-tête de page /- -->
<!-- Page Boutique -->
<div class="page-shop u-s-p-t-80">
<div class="container">
    <!-- Introduction de la boutique -->
    <div class="shop-intro">
        <ul class="bread-crumb">
            <li class="has-separator">
                <a href="{{ url('/') }}">Accueil</a>
            </li>
            <?php echo $categoryDetails['breadcrumbs']; ?>
        </ul>
    </div>
    <!-- Introduction de la boutique /- -->
    <div class="row">
        <!-- Barre latérale gauche de la boutique -->
        @include('front.products.filters')
        <!-- Barre latérale gauche de la boutique /- -->
        <!-- Contenu principal de la boutique -->
        <div class="col-lg-9 col-md-9 col-sm-12">
            <!-- Barre de page -->
            <div class="page-bar clearfix">
                <!-- Tri des produits -->
                @if(!isset($_REQUEST['search']))
                <!-- Trieur de barre d'outils 1  -->
                <form name="sortProducts" id="sortProducts">
                    <input type="hidden" name="url" id="url" value="{{ $url }}">
                    <div class="toolbar-sorter">
                        <div class="select-box-wrapper">
                            <label class="sr-only" for="sort-by">Trier par</label>
                            <select name="sort" id="sort" class="select-box">
                                <!-- <option selected="selected" value="">Trier par : Meilleures ventes</option> -->
                                <option selected="" value="">Sélectionner</option>
                                <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort']=="product_latest") selected="" @endif>Trier par : Plus récent</option>
                                <option value="price_lowest" @if(isset($_GET['sort']) && $_GET['sort']=="price_lowest")selected="" @endif>Trier par : Prix le plus bas</option>
                                <option value="price_highest" @if(isset($_GET['sort']) && $_GET['sort']=="price_highest") selected="" @endif>Trier par : Prix le plus élevé</option>
                                <option value="name_a_z" @if(isset($_GET['sort']) && $_GET['sort']=="name_a_z") selected="" @endif>Trier par : Nom A - Z</option>
                                <option value="name_z_a" @if(isset($_GET['sort']) && $_GET['sort']=="name_z_a") selected="" @endif>Trier par : Nom Z - A</option>
                                <!-- <option value="">Trier par : Meilleure note</option> -->
                            </select>
                        </div>
                    </div>
                </form>
                <!-- // Fin Trieur de barre d'outils 1  -->
                @endif
                <!-- Trieur de barre d'outils 2  -->
                <div class="toolbar-sorter-2">
                    <div class="select-box-wrapper">
                        <label class="sr-only" for="show-records">Afficher les enregistrements par page</label>
                        <select class="select-box" id="show-records">
                            <option selected="selected" value="">Affichage : {{ count($categoryProducts) }}</option>
                            <option value="">Affichage : Tous</option>
                        </select>
                    </div>
                </div>
                <!-- // Fin Trieur de barre d'outils 2  -->
            </div>
            <!-- Barre de page /- -->
            <!-- Conteneur de produits -->
            <div class="filter_products">
                @include('front.products.ajax_products_listing')
            </div>
            @if(!isset($_REQUEST['search']))
                <!-- Pagination -->
                @if(isset($_GET['sort']))
                    <div>{{ $categoryProducts->appends(['sort'=>$_GET['sort']])->links() }}</div>
                @else
                    <div>{{ $categoryProducts->links() }}</div>
                @endif
            @endif
            <div>&nbsp;</div>
            <div>{{ $categoryDetails['categoryDetails']['description'] }}</div>
        </div>
        <!-- Contenu principal de la boutique /- -->

        <!-- Pagination de la boutique -->
        <?php /* <div class="pagination-area">
            <div class="pagination-number">
                <ul>
                    <li style="display: none">
                        <a href="shop-v1-root-category.html" title="Précédent">
                            <i class="fa fa-angle-left"></i>
                        </a>
                    </li>
                    <li class="active">
                        <a href="shop-v1-root-category.html">1</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">2</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">3</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">...</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html">10</a>
                    </li>
                    <li>
                        <a href="shop-v1-root-category.html" title="Suivant">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div> */ ?>
        <!-- Pagination de la boutique /- -->
    </div>
</div>
</div>
<!-- Page Boutique /- -->
@endsection
