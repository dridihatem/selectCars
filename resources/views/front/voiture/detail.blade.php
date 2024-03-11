
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
 <!-- Page title start-->
 <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{asset('assets/front/images/page-title-bg-4.jpg')}}">
        <div class="container">
            <div class="content">
            <h2>{{ $titleBreadcrumbs }}</h2>
                <ul class="list-unstyled">
                    <li class="d-inline"><a href="{{ url('/')}}">Accueil</a></li>
                    <li class="d-inline">/</li>
                    <li class="d-inline"><a href="{{ url('/categorie',$categorieVoiture->slug)}}">{{ $categorieVoiture->titre }}</a></li>
                    <li class="d-inline">/</li>
                    <li class="d-inline active opacity-75">{{ $titleBreadcrumbs }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->

    <!-- car-details-area start -->
    <div class="car-details-area pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
                <div class="col-lg-9">
                <div class="row" data-aos="fade-up">
                            <div class="col-md-8">
                               
                                <h3 class="product-title mt-10 mb-20">{{ $voiture->titre}}</h3>
                            </div>
                            <div class="col-md-4">
                                <div class="product-price mb-20  mt-10 text-right" style="text-align:right!important;">
                                @if ($voiture->status==1)
                                    <h4 class="new-price color-primary">Prix : {{ number_format($voiture->prix,2)}} €</h4>
                                   
                                @elseif ($voiture->status==0)
                                <h4 class="new-price color-primary">Prix : <span style="text-decoration: line-through;">{{ number_format($voiture->prix,2)}} €</span> <span style="font-size: 19px;background: red;color: #fff;">Vendue</span></h4>
                                @endif
                                </div>
                                
                            </div>
                        </div>
                    <div class="product-single-gallery mb-40">
                        <div class="swiper product-single-slider">
                            <div class="swiper-wrapper">

                                @if (!is_null($voiture->image1))

                                <div class="swiper-slide">
                                    <figure class="lazy-container ratio ratio-5-3">
                                        <a href="{{ url('images/voitures',$voiture->image1) }}" class="lightbox-single">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image1) }}" alt="">
                                        </a>
                                    </figure>
                                </div>
                                    
                                @endif
                                
                                @if (!is_null($voiture->image2))

                                <div class="swiper-slide">
                                    <figure class="lazy-container ratio ratio-5-3">
                                        <a href="{{ url('images/voitures',$voiture->image2) }}" class="lightbox-single">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image2) }}" alt="">
                                        </a>
                                    </figure>
                                </div>
                                    
                                @endif

                                @if (!is_null($voiture->image3))

                                    <div class="swiper-slide">
                                        <figure class="lazy-container ratio ratio-5-3">
                                            <a href="{{ url('images/voitures',$voiture->image3) }}" class="lightbox-single">
                                                <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                    data-src="{{ url('images/voitures',$voiture->image3) }}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                        
                                    @endif
                                    @if (!is_null($voiture->image4))

                                    <div class="swiper-slide">
                                        <figure class="lazy-container ratio ratio-5-3">
                                            <a href="{{ url('images/voitures',$voiture->image4) }}" class="lightbox-single">
                                                <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                    data-src="{{ url('images/voitures',$voiture->image4) }}" alt="">
                                            </a>
                                        </figure>
                                    </div>
                                        
                                    @endif
                                    @if (!is_null($voiture->image5))

                                        <div class="swiper-slide">
                                            <figure class="lazy-container ratio ratio-5-3">
                                                <a href="{{ url('images/voitures',$voiture->image5) }}" class="lightbox-single">
                                                    <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                        data-src="{{ url('images/voitures',$voiture->image5) }}" alt="">
                                                </a>
                                            </figure>
                                        </div>
                                            
                                        @endif
                                
                               
                            </div>
                        </div>
        
                        <div class="product-thumb">
                            <div class="swiper slider-thumbnails">
                                <div class="swiper-wrapper">
                                @if (!is_null($voiture->image1))
                                <div class="swiper-slide">
                                        <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image1) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                @if (!is_null($voiture->image2))
                                <div class="swiper-slide">
                                        <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image2) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                @if (!is_null($voiture->image3))
                                <div class="swiper-slide">
                                        <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image3) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                @if (!is_null($voiture->image4))
                                <div class="swiper-slide">
                                        <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image4) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                @if (!is_null($voiture->image5))
                                <div class="swiper-slide">
                                        <div class="thumbnail-img lazy-container ratio ratio-5-3">
                                            <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                data-src="{{ url('images/voitures',$voiture->image5) }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                   
                                   
                                </div>
                            </div>
                            <!-- Slider navigation buttons -->
                            <div class="slider-navigation">
                                <button type="button" title="Slide prev" class="slider-btn slider-btn-prev radius-0">
                                    <i class="fal fa-angle-left"></i>
                                </button>
                                <button type="button" title="Slide next" class="slider-btn slider-btn-next radius-0">
                                    <i class="fal fa-angle-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="product-single-details">
                        

                        <div class="row">
                            <div class="col-lg-11">
                                <!-- Product description -->
                                <div class="product-desc pt-40" data-aos="fade-up">
                                    <h4 class="mb-20">Détail de véhicule</h4>
                                    {!!  $voiture->description  !!}
                                </div>
        
                              
        
                                <!-- Product specification -->
                                <div class="product-spec pt-60" data-aos="fade-up">
                                    <h4 class="mb-20">Spécification de véhicule</h4>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.marque')}}</h6>
                                            <span>{{ $marqueVoiture->titre}}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.modele')}}</h6>
                                            <span>{{ $voiture->modele }}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.annee')}}</h6>
                                            <span>{{ $voiture->annee }}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.kilometrage')}}</h6>
                                            <span>{{ $voiture->kilometrage }} km</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.cylindre')}}</h6>
                                            <span>{{ $voiture->nbre_cylindre }}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.nature')}}</h6>
                                            <span>{{ $voiture->nature }}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.energie')}}</h6>
                                            <span>{{ $voiture->energie }}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.categorie')}}</h6>
                                            <span>{{ $categorieVoiture->titre }}</span>
                                        </div>
                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.transmission')}}</h6>
                                            <span>{{ $voiture->type }}</span>
                                        </div>

                                        <div class="col-lg-3 col-sm-6 col-md-4 mb-20">
                                            <h6 class="mb-1">{{ trans('generale.type_vehicule')}}</h6>
                                            <span>@if ($voiture->nouveau==1)
                                            {{ trans('generale.nouveau')}}
                                            @elseif ($voiture->nouveau==0)
                                            {{ trans('generale.ancien')}}
                                         
                                            @endif</span>
                                        </div>
                                       
                                        
                                    </div>
                                </div>

                                <!-- Product policy -->
                               
                            </div>
                        </div>

                        <!-- Product-area start -->
                        <div class="product-area pt-60">
                            <div class="section-title title-inline mb-30" data-aos="fade-up">
                                <h3 class="title mb-20">Voir plus des véhicules</h3>
                                <!-- Slider navigation buttons -->
                                <div class="slider-navigation mb-20">
                                    <button type="button" title="Slide prev" class="slider-btn slider-btn-prev btn-outline radius-0" id="product-slider-1-prev">
                                        <i class="fal fa-angle-left"></i>
                                    </button>
                                    <button type="button" title="Slide next" class="slider-btn slider-btn-next btn-outline radius-0" id="product-slider-1-next">
                                        <i class="fal fa-angle-right"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="swiper product-slider mb-40" id="product-slider-1">
                                <div class="swiper-wrapper">
                                    @if (count($voiture_plus) > 0)

                                    @foreach ($voiture_plus as  $list_plus)
                                    <div class="swiper-slide">
                                    <div class="product-default border p-10 mb-25">
                                <figure class="product-img mb-15">
                                @if($list_plus->status ==0)
                                <div class="cover-ribbon">
                                    <div class="cover-ribbon-inside">Vendue</div>
                                </div>    
                                
                                @endif
                                    <a href="{{ url('voitures',$list_plus->reference,$list_plus->slug)}}" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                                    <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}" data-src="{{url('/images/voitures',$list_plus->image1)}}" alt="{{ $list_plus->titre }}">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <span class="product-category font-xsm">{{   $marque = \App\Models\Marque::where('id',$list_plus->marque_id)->count() ?  \App\Models\Marque::where('id',$list_plus->marque_id)->first()->titre: '' }}
                                      </span>
                                    <div class="d-flex align-items-center justify-content-between mb-15">
                                        <h5 class="product-title lc-1 mb-0"><a href="{{ url('voitures',$list_plus->reference,$list_plus->slug)}}" target="_self" title="{{ $list_plus->titre }}">{{ $list_plus->titre }}</a></h5>
                                       
                                    </div>
                                   
                                    <ul class="product-icon-list mb-15 list-unstyled">
                                        <li class="icon-start">
                                            <i class="fal fa-tachometer-alt"></i><br>
                                            <span>{{ Str::limit($list_plus->type, 4)  }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-tire"></i><br>
                                            <span>{{ $list_plus->nature }}</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-map-marked-alt"></i><br>
                                            <span> {{ $list_plus->kilometrage }} Km</span>
                                        </li>
                                        <li class="icon-start">
                                            <i class="fal fa-clock"></i><br>
                                            <span> {{ $list_plus->annee }}</span>
                                        </li>
                                    </ul>
                                    <div class="product-price">
                                        <h5 class="new-price">Prix: {{ number_format($list_plus->prix,2)}} €</h5>
                                    </div>
                                </div>
                            </div>
                                        <!-- product-default -->
                                    </div>

                                    @endforeach

                                    @else

                                    <h4>Y a pas d'autres véhicules</h4>
                                    @endif
                                    
                                    
                                    
                                    
                                   
                                </div>
                            </div>
                        </div>
                        <!-- Product-area end -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <aside class="widget-area" data-aos="fade-up">
                        <div class="widget widget-form bg-light mb-30">
                            <h5 class="title mb-20">
                               Contact rapide
                            </h5>
                            <div class="user mb-20">
                                
                                <div class="user-info">
                                    <h6 class="mb-1">Select Cars Auto</h6>
                                    <a href="tel:123456789">00 33 0 75 10 98 66</a>
                                    <br>
                                    <a href="mailto:info@selectcarsauto.fr">info@selectcarsauto.fr</a>
                                </div>
                            </div>
                            
                            
                            @if ($voiture->status==1)
                            @if(Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success')  }}
                                </div>
                            @endif
                            <form  method="POST" action="{{ route('visite.us.store')}}"  id="contactUSForm">
                            {{ csrf_field() }}
                            <input type="hidden" name="reference" value="{{ $voiture->reference}}" >
                            <div class="form-group mb-20">
                                <label>Date de visite</label>
                                    <input type="datetime-local" name="date_rdv" class="form-control" value="{{ old('date_rdv')}}" required="" placeholder="* " id="txtDate" >
                                </div>
                                <div class="form-group mb-20">
                                    <input type="text" name="nom" class="form-control" value="{{ old('nom')}}"  required="" placeholder="Nom*">
                                </div>
                                <div class="form-group mb-20">
                                    <input type="text" name="prenom" class="form-control" value="{{ old('prenom')}}" placeholder="Prénom">
                                </div>
                                <div class="form-group mb-20">
                                    <input type="email" name="email" class="form-control" required="" value="{{ old('email')}}" placeholder="Adresse E-mail*">
                                </div>
                                <div class="form-group mb-20">
                                    <input type="text" name="telephone" class="form-control" required="" value="{{ old('telephone')}}" placeholder="Numéro de téléphone*">
                                </div>
                                <div class="form-group mb-20">
                                    <textarea name="message"  name="message" id="message" class="form-control" cols="30" rows="8" required=""  placeholder="Message...">{{ old('message')}}</textarea>
                                  
                                </div>
                              
                                <button type="submit" class="btn btn-md btn-primary w-100">{{ trans('generale.envoie') }}</button>
                            </form>
                        </div>

                            @endif
                            
                           
                       
                        <div class="widget widget-share bg-light mb-30">
                            <h5 class="title">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#share" aria-expanded="true" aria-controls="share"> 
                                    Partagez
                                </button>
                            </h5>
                            <div id="share" class="collapse show">
                                <div class="accordion-body">
                                    <div class="social-link style-2 mb-20">
                                        <a href="https://www.instagram.com/"><i class="fab fa-facebook"></i></a>
                                        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                                    </div>
                                    
                                   
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-address bg-light mb-30">
                            <h5 class="title">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#location"> 
                                    Adresse de visite
                                </button>
                            </h5>
                            @php
                                       $iframe = \App\Models\Lieu::where('id',$voiture->lieu)->first();
                                       @endphp
                            <div id="location" class="collapse show">
                                <div class="accordion-body">
                                    <div class="d-flex mb-20 icon-start">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <span class="font-sm">
                                           {{ $iframe->titre ? $iframe->titre : '' }}
                                        </span>
                                    </div>
                                    <div class="lazy-container radius-md ratio ratio-2-3">
                                        <div id="map"></div>
                                      
                                        {!! 
                                           $iframe->frame_map ? $iframe->frame_map : ''
                                          

                                         !!}
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="widget widget-product bg-light mb-30">
                            <h5 class="title">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#products">
                                   Le plus visite
                                </button>
                            </h5>
                            <div id="products" class="collapse show">
                                <div class="accordion-body">
                                @if (count($voiture_viewer) > 0)
                                @foreach ($voiture_viewer as $list_viewer )

                                <div class="product-default product-inline">
                                        <figure class="product-img">
                                            <a href="{{ url('voitures',$list_viewer->reference,$list_viewer->slug)}}" class="lazy-container ratio ratio-1-1">
                                                <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}"
                                                    data-src="{{url('images/voitures',$list_viewer->image1 )}}" alt="{{ $list_viewer->titre }}">
                                            </a>
                                        </figure>
                                        <div class="product-details">
                                            <h6 class="product-title mb-1">
                                                <a href="{{ url('voitures',$list_viewer->reference,$list_viewer->slug)}}" target="_self" title="Link">{{ $list_viewer->titre }}</a>
                                            </h6>
                                            <div class="product-price1">
                                                <h6 class="new-price">{{ number_format($list_viewer->prix,2) }} €</h6>
                                            </div>
                                        </div>
                                    </div><!-- product-default -->
                                    
                                @endforeach

                                
                                @endif
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                       
                        <!-- Spacer -->
                        <div class="pb-40"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <!-- car-details-area start -->
    @stop

@Push('js')
<script type="text/javascript">
 $(function(){
  
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#txtDate').attr('min', maxDate);
});
</script>
@endpush