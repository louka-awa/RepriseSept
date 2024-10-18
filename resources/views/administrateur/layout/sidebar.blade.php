<nav class="sidebar sidebar-offcanvas" id="sidebar">

<ul class="nav">
<li class="nav-item">
    <a @if(Session::get('page')=="dashboard") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" href="{{ url('administrateur/dashboard')}}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Tableau de bord</span>
    </a>
</li>
@if(Auth::guard('administrateur')->user()->type=="vendor")
<li class="nav-item">
    <a @if(Session::get('page')=="update_personal_details" || Session::get('page')=="update_business_details" || Session::get('page')=="update_bank_details") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-vendors" aria-expanded="false" aria-controls="ui-vendors">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Détails du vendeur</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-vendors">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="update_personal_details") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/update-vendor-details/personal') }}">Détails personnels</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="update_business_details") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/update-vendor-details/business') }}">Détails de l'entreprise</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="update_bank_details") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/update-vendor-details/bank') }}">Détails bancaires</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="sections" || Session::get('page')=="categories" || Session::get('page')=="products") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion du catalogue</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-catalogue">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;"> 
            <li class="nav-item"> <a @if(Session::get('page')=="products") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/products') }}">Produits</a></li>  
            <li class="nav-item"> <a @if(Session::get('page')=="coupons") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/coupons') }}">Coupons</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="orders") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des commandes</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-orders">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="orders") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/orders') }}">Commandes</a></li>   
        </ul>
    </div>
</li>
@else
<li class="nav-item">
    <a @if(Session::get('page')=="update_administrateur_password" || Session::get('page')=="update_administrateur_details") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false" aria-controls="ui-settings">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Paramètres</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-settings">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="update_administrateur_password") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/update-administrateur-password') }}">Modifier le mot de passe</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="update_administrateur_details") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/update-administrateur-details') }}">Modifier les détails</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="view_admins" || Session::get('page')=="view_subadmins"  || Session::get('page')=="view_vendors"  || Session::get('page')=="view_all") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-admins" aria-expanded="false" aria-controls="ui-admins">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des administrateurs</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-admins">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="view_admins") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/administrateurs/administrateur') }}">Administrateurs</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="view_subadmins") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/administrateurs/subadministrateur') }}">Sous-administrateurs</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="view_vendors") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/administrateurs/vendor') }}">Vendeurs</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="view_all") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/administrateurs') }}">Tous</a></li>
        </ul>
    </div>
</li>


        
        
<li class="nav-item">
    <a @if(Session::get('page')=="sections" || Session::get('page')=="categories" || Session::get('page')=="products" || Session::get('page')=="coupons" || Session::get('page')=="filters") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-catalogue" aria-expanded="false" aria-controls="ui-catalogue">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion du catalogue</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-catalogue">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="sections") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/sections') }}">Sections</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="categories") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/categories') }}">Catégories</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="brands") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/brands') }}">Marques</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="products") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/products') }}">Produits</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="coupons") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/coupons') }}">Coupons</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="filters") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/filters') }}">Filtres</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="orders") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-orders" aria-expanded="false" aria-controls="ui-orders">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des commandes</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-orders">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="orders") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/orders') }}">Commandes</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="ratings") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-ratings" aria-expanded="false" aria-controls="ui-ratings">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des évaluations</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-ratings">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="ratings") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/ratings') }}">Évaluations et avis</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="users" || Session::get('page')=="subscribers") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-users" aria-expanded="false" aria-controls="ui-users">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des utilisateurs</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-users">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="users") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/users') }}">Utilisateurs</a></li>
            <li class="nav-item"> <a @if(Session::get('page')=="subscribers") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/subscribers') }}">Abonnés</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="banners") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-banners" aria-expanded="false" aria-controls="ui-banners">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des bannières</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-banners">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="banners") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/banners') }}">Bannières de la page d'accueil</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="cmspages") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-cms" aria-expanded="false" aria-controls="ui-cms">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des pages</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-cms">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="cmspages") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/cms-pages') }}">Pages CMS</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="shipping") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-shipping" aria-expanded="false" aria-controls="ui-shipping">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des expéditions</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-shipping">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="shipping") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/shipping-charges') }}">Frais de port</a></li>
        </ul>
    </div>
</li>
<li class="nav-item">
    <a @if(Session::get('page')=="currencies") style="background:#4B49AC !important; color: #fff !important;" @endif class="nav-link" data-toggle="collapse" href="#ui-currencies" aria-expanded="false" aria-controls="ui-currencies">
        <i class="icon-layout menu-icon"></i>
        <span class="menu-title">Gestion des devises</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="collapse" id="ui-currencies">
        <ul class="nav flex-column sub-menu" style="background: #fff !important; color: #4B49AC !important;">
            <li class="nav-item"> <a @if(Session::get('page')=="currencies") style="background:#4B49AC !important; color: #fff !important;" @else style="background:#fff !important; color: #4B49AC !important;" @endif class="nav-link" href="{{ url('administrateur/currencies') }}">Devises</a></li>
        </ul>
    </div>
</li>
@endif
</ul>
</nav>
