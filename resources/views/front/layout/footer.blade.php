<!-- Pied de page -->
<footer class="footer">
    <div class="container">
        <!-- Pied de page externe -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                Pour des offres spéciales et d'autres informations sur les réductions
            </h6>
            <h1>
                Abonnez-vous à notre Newsletter
            </h1>
            <p>
                Abonnez-vous à la liste de diffusion pour recevoir des mises à jour sur les promotions, les nouveautés, les réductions et les coupons.
            </p>
            <form class="newsletter-form">
                <label class="sr-only" for="newsletter-field">Entrez votre adresse e-mail</label>
                <input type="text" placeholder="Votre adresse e-mail" name="subscriber_email" id="subscriber_email" required="">
                <button type="button" class="button" onclick="addSubscriber()">SOUMETTRE</button>
            </form>
        </div>
        <!-- /Pied de page externe -->
        <!-- Pied de page moyen -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>ENTREPRISE</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us')}}">À propos de nous</a>
                            </li>
                            <li>
                                <a href="{{ url('contact')}}">Contactez-nous</a>
                            </li>
                            <li>
                                <a href="{{ url('faq')}}">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COLLECTION</h6>
                        <ul>
                            <li>
                                <a href="{{url('men')}}">Vêtements pour hommes</a>
                            </li>
                            <li>
                                <a href="{{url('women')}}">Vêtements pour femmes</a>
                            </li>
                            <li>
                                <a href="{{url('kids')}}">Vêtements pour enfants</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>COMPTE</h6>
                        <ul>
                            <li>
                                <a href="{{url('user/account')}}">Mon compte</a>
                            </li>
                            <!-- <li>
                                <a href="shop-v1-root-category.html">Mon profil</a>
                            </li> -->
                            <li>
                                <a href="{{url('user/orders')}}">Mes commandes</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>Contact</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>Chaîne YouTube des Loukaawa</span>
                            </li>
                            <li>
                                <a href="tel:+111-222-333">
                                    <i class="fas fa-phone u-s-m-r-9"></i>
                                    <span>+111-222-333</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@sitemakers.in">
                                    <i class="fas fa-envelope u-s-m-r-9"></i>
                                    <span>
                                        info@sitemakers.in</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Pied de page moyen -->
        <!-- Pied de page inférieur -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="https://www.facebook.com/stackdevelopers2">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://twitter.com/stacdevelopers">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://loukaawa.com">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Droits d'auteur &copy; 202
                <a target="_blank" rel="nofollow" href="https://loukaawa.com">Loukaawa</a> | Tous droits réservés</p>
        </div>
    </div>
    <!-- /Pied de page inférieur -->
</footer>
<!-- /Pied de page -->
