@extends('front.app')

@Push('css') 
<style>
.cover-ribbon {
  height: 115px;
  width: 115px;
  position: absolute;
  right: -1px;
  top: -8px;
  z-index: 99;
  overflow: hidden;
}
.cover-ribbon .cover-ribbon-inside {
  background: #ff002d;
  color: #FFF;
  transform: rotate(45deg);
  position: absolute;
  right: -35px;
  top: 15px;
  padding: 10px;
  min-width: 127px;
  text-align: center;
}



</style>
@endpush

@section('content')


 <!-- Home-area start-->
 <section class="hero-banner hero-banner-1">
        <div class="container">
            <div class="swiper home-slider" id="home-slider-1">
                <div class="swiper-wrapper">
                @foreach ($banner as $imagebanner )
                <div class="swiper-slide" data-aos="fade-up">
                        <div class="banner-content" data-swiper-parallax="-300">
                            <h1 class="title color-white mb-20">{!! $imagebanner->titre!!}</h1>
                        </div>
                    </div>

                @endforeach
                    
                </div>
            </div>
            <div class="row">
                <div class="col-xl-10">
                    <div class="banner-filter-form mt-40" data-aos="fade-up" data-aos-delay="100">
                        <p class="text font-lg color-white">Je recherche</p>
                        <ul class="nav nav-tabs border-0">
                            <li class="nav-item">
                                <button class="nav-link radius-0 active" data-bs-toggle="tab" data-bs-target="#all" type="button">Toutes les conditions</button>
                            </li>
                            
                        </ul>
                        <div class="tab-content form-wrapper p-30">
                            <div class="tab-pane fade active show" id="all">
                                <form action="{{ route('search')}}" method="GET">
                                  
                                    <div class="row align-items-center gx-xl-3">
                                        <div class="col-lg-11">
                                            <div class="row">
                                                <div class="col-md col-sm-6">
                                                    <div class="form-group border-end">
                                                        <label for="location" class="font-sm">Type de véhicule</label>
                                                        <select class="nice-select" id="location" name="categories">
                                                            @foreach ($categories as $listCategories)
                                                                <option value="{{ $listCategories->id}}">{{ $listCategories->titre}}</option>  
                                                            @endforeach
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md col-sm-6">
                                                    <div class="form-group border-end">
                                                        <label for="marque" class="font-sm">Marque</label>
                                                        
                                                        <select class="nice-select" id="marque" name="marque">
                                                        <option value="">---</option>
                                                        @foreach ($marques as $listMarque)
                                                                <option value="{{ $listMarque->id}}">{{ $listMarque->titre}}</option>  
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md col-sm-6" id="showmodel" style="display:none;">
                                                    <div class="form-group border-end">
                                                        <label for="model" class="font-sm">Model</label>
                                                        <select class="nice-select" id="model" name="model">
                                                          
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md col-sm-6">
                                                    <div class="form-group border-end">
                                                        <label for="energie" class="font-sm">Energie</label>
                                                        <select class="nice-select" id="energie" name="energie">
                                                        <option value="essence">{{ trans('generale.essence')}}</option>
                                                            <option value="diesel">{{ trans('generale.diesel')}}</option>
                                                            <option value="hybrides">{{ trans('generale.hybrides')}}</option>
                                                            <option value="electriques">{{ trans('generale.electriques')}}</option>
                                                           
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md col-sm-6">
                                                    <div class="form-group">
                                                        <label class="font-sm mb-2">{{ trans('generale.prix')}}</label>
                                                        <div class="price-slider mb-2" data-range-slider="priceSlider"></div>
                                                        <span class="filter-price-range" data-range-value="priceSliderValue"></span>
                                                        <input type="hidden" name="prix_min" id="min_value"> 
                                                        <input type="hidden" name="prix_max" id="max_value">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 text-md-end">
                                            <button type="submit" class="btn btn-icon bg-primary color-white">
                                                <i class="fal fa-search"></i>
                                                <span class="me-1 d-inline-block d-lg-none"></span>
                                                <span class="d-inline-block d-lg-none">{{ trans('generale.trouver')}}</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 align-self-end" data-aos="fade-up" data-aos-delay="100">
                    <div class="slider-navigation position-static text-end mt-2 mt-lg-0">
                        <button type="button" title="Slide prev" class="slider-btn radius-0" id="home-slider-1-prev">
                            <i class="fal fa-angle-left"></i>
                        </button>
                        <button type="button" title="Slide next" class="slider-btn radius-0" id="home-slider-1-next">
                            <i class="fal fa-angle-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper home-img-slider" id="home-img-slider-1">
            <div class="swiper-wrapper">
               
                    @foreach ($banner as $imagebanner )
                    <div class="swiper-slide">
                    <div class="bg-img" data-bg-image="{{url('images/banners/',$imagebanner->image) }}"></div>
                </div>
                    @endforeach
                   
                
            </div>
        </div>
        <!--<div class="swiper-pagination pagination-fraction" id="home-slider-1-pagination"></div>-->
    </section>
    <!-- Home-area end -->

    <!-- Category-area start 
    <section class="category-area category-1 pt-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title title-inline mb-50" data-aos="fade-up">
                        <h2 class="title mb-0">{{ trans('generale.modele_populaire')}}</h2>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">

                    @foreach ($categories as $listca )
                    <div class="col-lg-3 col-sm-6 mb-30 p-15" data-aos="fade-up">
                            <a href="{{ url('categorie',$listca->slug)}}">
                                <div class="category-item">
                                    <div class="d-flex flex-wrep justify-content-between mb-10">
                                        <h5 class="category-title mb-10">
                                        {{$listca->titre  }}
                                        </h5>
                                        <span class="category-qty h5 mb-10">(@php echo  \App\Models\Voiture::where('categorie_id',$listca->id)->count(); @endphp)</span>
                                    </div>
                                    <div class="category-img">
                                        <img class="lazyload blur-up" src="{{asset('assets/front/images/placeholder.png') }}" data-src="{{url('images/categories',$listca->image)  }}" alt="{{ $listca->titre  }}" title="{{$listca->titre  }}">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                       
                    </div>
                    <div class="text-center text-center mt-40">
                        <a href="{{ route('categories')}}" class="btn btn-lg btn-primary fancy">{{ trans('generale.tous_modele')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>-->
    <!-- Category-area end -->


    <!-- Product-area start -->
    <section class="product-area  pt-100 pb-60">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up">
                    <div class="section-title title-center mb-30">
                        <h2 class="title mw-100 mb-30">Nos véhicules les plus en vedette</h2>
                        <div class="tabs-navigation mb-20">
                            <ul class="nav nav-tabs" data-hover="fancyHover">
                                <li class="nav-item active">
                                    <button class="nav-link hover-effect active btn-md" data-bs-toggle="tab" data-bs-target="#tab1" type="button">Voitures</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md" data-bs-toggle="tab" data-bs-target="#tab2" type="button">Camions</button>
                                </li>
                                
                                <li class="nav-item">
                                    <button class="nav-link hover-effect btn-md" data-bs-toggle="tab" data-bs-target="#tab3" type="button">Fourgons</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="tab-content" data-aos="fade-up">
                        <div class="tab-pane fade show active" id="tab1">
                            <div class="row">
                                                        
@foreach ($voiture_nouveau as $listVoiture )
<div class="col-xl-3 col-md-6" data-aos="fade-up">
                            <div class="product-default border p-10 mb-25">
                                <figure class="product-img mb-15">
                                @if($listVoiture->status ==0)
                                <div class="cover-ribbon">
                                    <div class="cover-ribbon-inside">Vendue</div>
                                </div>    
                                
                                @endif
                                    <a href="{{ url('voitures', $listVoiture->reference )}}" target="_self" title="{{ $listVoiture->titre }}" class="lazy-container ratio ratio-2-3">
                                    <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}" data-src="{{url('/images/voitures',$listVoiture->image1)}}" alt="{{ $listVoiture->titre }}">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <span class="product-category font-xsm">@php $marque =  \App\Models\Marque::where('id',$listVoiture->marque_id)->first();echo $marque->titre; @endphp</span>
                                    <div class="d-flex align-items-center justify-content-between mb-15">
                                        <h5 class="product-title lc-1 mb-0"><a href="{{ url('voitures', $listVoiture->reference )}}" target="_self" title="{{ $listVoiture->titre }}">{{ $listVoiture->titre }}</a></h5>
                                       
                                    </div>
                                   
                                    <ul class="product-icon-list mb-15 list-unstyled">
                                        <li class="icon-start">
                                            <i class="fal fa-tachometer-alt"></i><br>
                                            <span>{{ Str::limit($listVoiture->type, 4)  }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-tire"></i><br>
                                            <span>{{ $listVoiture->nature }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-map-marked-alt"></i><br>
                                            <span> {{ $listVoiture->kilometrage }} Km</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal  fa-clock"></i><br>
                                            <span> {{ $listVoiture->annee }}</span>
                                        </li>
                                    </ul>
                                    <div class="product-price">
                                        <h5 class="new-price">Prix: {{ number_format($listVoiture->prix,2)}} €</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- product-default -->
                        </div>



@endforeach

                                
                                
                                
                                
                                
                                
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2">
                            <div class="row">
                                
                               
 @foreach ($voiture_ancien as $listVoiture )
                        <div class="col-xl-3 col-md-6" data-aos="fade-up">
                            <div class="product-default border p-10 mb-25">
                                <figure class="product-img mb-15">
                                @if($listVoiture->status ==0)
                                <div class="cover-ribbon">
                                    <div class="cover-ribbon-inside">Vendue</div>
                                </div>    
                                
                                @endif
                                    <a href="{{ url('voitures', $listVoiture->reference )}}" target="_self" title="{{ $listVoiture->titre }}" class="lazy-container ratio ratio-2-3">
                                    <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}" data-src="{{url('/images/voitures',$listVoiture->image1)}}" alt="{{ $listVoiture->titre }}">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <span class="product-category font-xsm">@php $marque =  \App\Models\Marque::where('id',$listVoiture->marque_id)->first();echo $marque->titre; @endphp</span>
                                    <div class="d-flex align-items-center justify-content-between mb-15">
                                        <h5 class="product-title lc-1 mb-0"><a href="{{ url('voitures', $listVoiture->reference )}}" target="_self" title="{{ $listVoiture->titre }}">{{ $listVoiture->titre }}</a></h5>
                                       
                                    </div>
                                   
                                    <ul class="product-icon-list mb-15 list-unstyled">
                                        <li class="icon-start">
                                            <i class="fal fa-tachometer-alt"></i><br>
                                            <span>{{ Str::limit($listVoiture->type, 4)  }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-tire"></i><br>
                                            <span>{{ $listVoiture->nature }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-map-marked-alt"></i><br>
                                            <span> {{ $listVoiture->kilometrage }} Km</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-clock"></i><br>
                                            <span> {{ $listVoiture->annee }}</span>
                                        </li>
                                    </ul>
                                    <div class="product-price">
                                        <h5 class="new-price">Prix: {{ number_format($listVoiture->prix,2)}} €</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- product-default -->
                        </div>



@endforeach
                            </div>
                        </div>
                    
                        <div class="tab-pane fade" id="tab3">
                            <div class="row">
@foreach ($voiture_commercial as $listVoiture )
                        <div class="col-xl-3 col-md-6" data-aos="fade-up">
                            <div class="product-default border p-10 mb-25">
                                <figure class="product-img mb-15">
                                @if($listVoiture->status ==0)
                                <div class="cover-ribbon">
                                    <div class="cover-ribbon-inside">Vendue</div>
                                </div>    
                                
                                @endif
                                    <a href="{{ url('voitures', $listVoiture->reference )}}" target="_self" title="{{ $listVoiture->titre }}" class="lazy-container ratio ratio-2-3">
                                    <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}" data-src="{{url('/images/voitures',$listVoiture->image1)}}" alt="{{ $listVoiture->titre }}">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <span class="product-category font-xsm">@php $marque =  \App\Models\Marque::where('id',$listVoiture->marque_id)->first();echo $marque->titre; @endphp</span>
                                    <div class="d-flex align-items-center justify-content-between mb-15">
                                        <h5 class="product-title lc-1 mb-0"><a href="{{ url('voitures', $listVoiture->reference )}}" target="_self" title="{{ $listVoiture->titre }}">{{ $listVoiture->titre }}</a></h5>
                                       
                                    </div>
                                   
                                    <ul class="product-icon-list mb-15 list-unstyled">
                                        <li class="icon-start">
                                            <i class="fal fa-tachometer-alt"></i><br>
                                            <span>{{ Str::limit($listVoiture->type, 4)  }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-tire"></i><br>
                                            <span>{{ $listVoiture->nature }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-map-marked-alt"></i><br>
                                            <span> {{ $listVoiture->kilometrage }} Km</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-clock"></i><br>
                                            <span> {{ $listVoiture->annee }}</span>
                                        </li>
                                    </ul>
                                    <div class="product-price">
                                        <h5 class="new-price">Prix: {{ number_format($listVoiture->prix,2)}} €</h5>
                                    </div>
                                </div>
                            </div>
                            <!-- product-default -->
                        </div>



@endforeach
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-15 mb-25" data-aos="fade-up">
                        <a href="{{ route('voitures') }} " class="btn btn-lg btn-primary fancy">{{ trans('generale.tous_voiture') }} </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
  

    <!-- Choose-area start -->
    <section class="choose-area choose-1 pt-100 pb-60">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="slide-right" data-aos-duration="1000">
                    <div class="image mb-40">
                        <img class="lazyload blur-up" src="{{asset('assets/front/images/placeholder.png') }}" data-src="{{asset('assets/front/images/choose-1.png') }}" alt="Image">
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-up">
                    <div class="content-title mb-40">
                        <h2 class="title mb-20">
                        Pourquoi choisir Select Cars ?
                        </h2>
                        <p>
                        Chez Select Cars, nous nous engageons à rendre votre expérience d'achat de véhicule d'occasion aussi transparente et sans tracas que possible. Faites confiance à Select Cars pour trouver le véhicule parfait pour vous.
                        </p>
                        <div class="info-list mt-30">
                            <div class="row align-items-center pb-30">


                            <div class="swiper content-slider" id="content-slider">
                                <div class="swiper-wrapper">
                                
                                        
                                        <div class="swiper-slide">
                                        <div class="content">
                                            <h5 class="color-primary">1. Large Sélection en Ligne</h5>
                                            <p>
                                            Explorez notre vaste inventaire en ligne, comprenant une variété de modèles de
voitures et de véhicules commerciaux d'occasion. Nous mettons à jour régulièrement notre stock pour vous
offrir un choix diversifié.
                                            </p>
                                        </div>
                                        </div>

                                        <div class="swiper-slide">
                                        <div class="content">
                                            <h5 class="color-primary">2. Fiches Techniques Complètes</h5>
                                            <p>
                                            Obtenez toutes les informations dont vous avez besoin grâce à nos fiches
techniques détaillées. De la consommation de carburant aux caractéristiques techniques, nous vous fournissons
des détails complets pour vous aider à prendre une décision éclairée.
                                            </p>
                                        </div>
                                        </div>

                                        <div class="swiper-slide">
                                        <div class="content">
                                            <h5 class="color-primary">3. Visites en Showroom</h5>
                                            <p>
                                            Rien ne vaut une inspection en personne. Demandez une visite dans l'un de nos
showrooms Select Cars pour examiner de près le véhicule qui vous intéresse. Notre équipe sera là pour
répondre à toutes vos questions et vous fournir les détails supplémentaires dont vous pourriez avoir besoin.
                                            </p>
                                        </div>
                                        </div>

                                        <div class="swiper-slide">
                                        <div class="content">
                                            <h5 class="color-primary">4. Accompagnement Personnalisé</h5>
                                            <p>
                                            Nos consultants expérimentés sont là pour vous accompagner tout au long du
processus d'achat. De la sélection du modèle idéal à la finalisation de l'achat, nous sommes là pour vous fournir
un service personnalisé et répondre à vos besoins spécifiques.
                                            </p>
                                        </div>
                                        </div>

                                

                                </div>
        </div>
        <div class="swiper-pagination pagination-fraction" id="content-slider-pagination"></div>




                               
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape">
            <img class="lazyload blur-up" src="{{asset('assets/front/images/placeholder.png') }}" data-src="{{asset('assets/front/images/dark-bg.png') }}" alt="Image">
        </div>
    </section>
    <!-- Choose-area end -->
    <!-- Blog-area start -->
    <section class="blog-area blog-1">
        <div class="container">
            <div class="row ">
                <div class="col-12" data-aos="fade-up">
                <div class="bg-red rounded" style="background:red; padding:50px 20px 50px 20px" >
                <div class="row">
                    <div class="col-md-6">
                        <h5 style="color:#fff;">Restez informé de nos nouveauté par mail</h5>
                        <div class="social-link">
                            <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-facebook"></i></a>
                                <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                                <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                    </div>
                    
                    <div class="col-md-6">
                    
                           
                            <div class="newsletter-form">
                                <form id="newsletterForm">
                                    <div class="form-group">
                                        <input class="form-control radius-lg" placeholder="Enter email" type="text" name="EMAIL" required="" autocomplete="off">
                                        <button class="btn btn-md btn-primary  radius-lg" type="submit">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                    </div>
                </div>
                </div>
                   
                </div>
                
            </div>
        </div>
    </section>
    <!-- Blog-area end -->



@stop

@Push('js')
<script type="text/javascript">
    $(document).ready(function ()
    {
        
        $('select[name="marque"]').on('change',function(){
           
            var marqueID = $(this).val();
            if(marqueID){
                $.ajax({
                    url: '/getModels/'+marqueID,
                    type: "GET",
                    dataType:"json",
                    success:function(data)
                {
                    if(data.length != 0){
                      $('#showmodel').show();
                    $('select[name="model"]').empty();
                    
                    $.each(data, function(key,value){

                        $('select[name="model"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                    $(".nice-select").niceSelect('destroy');
                    $(".nice-select").niceSelect();  
                    }
                    else{
                        $('#showmodel').hide();
                    }
                    
                    
                }

                });
            }
            else {
                $('select[name="model"]').empty();
               
            }
        });


     


    });
    
</script>
@endpush