
    <!-- Footer-area start -->
    <footer class="footer-area bg-img bg-s-cover" data-bg-image="{{ asset('assets/front/images/footer-bg-1.jpg') }}">
        <div class="overlay opacity-70"></div>
        <div class="footer-top pt-100 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="footer-widget" data-aos="fade-up">
                            <div class="navbar-brand">
                                <a href="{{ url('/')}}">
                                    <img class="lazyload" src="{{ asset('assets/front/images/placeholder.png') }}" data-src="{{ asset('assets/front/images/logo/logo.png') }}" alt="Select Cars Auto">
                                </a>
                            </div>
                            <p>Chez Select Cars, nous comprenons l'importance de trouver le véhicule parfait qui répond à vos besoins et à votre budget.</p>
                            
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm">
                        <div class="footer-widget" data-aos="fade-up">
                            <h4>Navigation</h4>
                            <ul class="footer-links">
                                <li>
                                    <a href="{{ url('/') }}">Accueil</a>
                                </li>
                                <li>
                                    <a href="{{ route('faq') }}">Politique de vente</a>
                                </li>
                               
                                <li>
                                    <a href="{{ route('categories') }}">Catégories</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3 col-sm">
                        <div class="footer-widget" data-aos="fade-up">
                            <h4>Marques</h4>
                            <ul class="footer-links">
                                @php
                                    $marque = \App\Models\Marque::where('status',1)->take(6)->get();
                                    
                                @endphp
                                @foreach ($marque as $list_marque )
                                <li>
                                    <a href="{{ route('search')}}?marque={{ $list_marque->id}}">{{ $list_marque->titre}}</a>
                                </li>
                                    
                                @endforeach
                               
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-widget" data-aos="fade-up">
                            <h4>Contacts</h4>
                            <ul class="info-list">
                            @php
                                    $adresse = \App\Models\Lieu::get();
                                    
                                @endphp
                                @foreach ($adresse as $list_adresse )
                                <li>
                                    <i class="fal fa-map-marker-alt"></i>
                                    <span>{{ $list_adresse->titre}}</span>
                                </li>
                                @endforeach
                                
                                <li>
                                    <i class="fal fa-headset"></i>
                                    <a href="tel:0033075109866">00 33 0 75 10 98 66</a>
                                </li>
                                <li>
                                    <i class="fal fa-headset"></i>
                                  
                                    <a href="tel:0033676318489">00 33 6 76 31 84 89</a>
                                </li>
                                <li>
                                    <i class="fal fa-envelope"></i>
                                    <a href="mailto:info@selectcarsauto.fr">info@selectcarsauto.fr</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="copy-right-area border-top">
            <div class="container">
                <div class="copy-right-content">
                    <span>
                        Copyright <i class="fal fa-copyright"></i><span id="footerDate"></span> <a href="{{ url('/')}}" class="color-primary">SelectCarsAuto</a>. Tous droits réservés. Powred by : <a href="https://myopendigital.com/" target="_blank" class="color-primary">MyOpenDigital</a>
                    </span>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-area end-->
