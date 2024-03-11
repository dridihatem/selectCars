
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
                    <li class="d-inline active opacity-75">{{ $titleBreadcrumbs }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Page title end-->
<!-- car-list-area start -->
<div class="car-list-area pt-100 pb-60">
        <div class="container">
            <div class="row gx-xl-5">
            @include('front.categorie.sidebar')

                
                <div class="col-lg-9">
                    <div class="product-sort-area" data-aos="fade-up">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <h4 class="mb-20">{{ $count_voiture }}+ Voitures disponible</h4>
                            </div>
                           
                        </div>
                    </div>
                    <!-- Products -->
                    <div class="row">
                        
                            @foreach ($voitures as $listVoiture )
                            <div class="col-xl-4 col-md-6" data-aos="fade-up">
                            <div class="product-default border p-10 mb-25">
                                <figure class="product-img mb-15">
                                @if($listVoiture->status ==0)
                                <div class="cover-ribbon">
                                    <div class="cover-ribbon-inside">Vendue</div>
                                </div>    
                                
                                @endif
                                    <a href="{{ url('voitures',$listVoiture->reference,$listVoiture->slug)}}" target="_self" title="Link" class="lazy-container ratio ratio-2-3">
                                    <img class="lazyload" src="{{asset('assets/front/images/placeholder.png')}}" data-src="{{url('/images/voitures',$listVoiture->image1)}}" alt="{{ $listVoiture->titre }}">
                                    </a>
                                </figure>
                                <div class="product-details">
                                    <span class="product-category font-xsm">@php
                                        $marque = \App\Models\Marque::where('id',$listVoiture->marque_id)->first(); echo $marque->titre;
                                    @endphp</span>
                                    <div class="d-flex align-items-center justify-content-between mb-15">
                                        <h5 class="product-title lc-1 mb-0"><a href="{{ url('voitures',$listVoiture->reference,$listVoiture->slug)}}" target="_self" title="{{ $listVoiture->titre }}">{{ $listVoiture->titre }}</a></h5>
                                       
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

                    {{ $voitures->links() }}
                    <!--<div class="pagination mb-40 justify-content-center" data-aos="fade-up">
                        <a href="car-list.html" class="page-numbers radius-0 prev">Prev</a>
                        <span class="page-numbers radius-0 current" aria-current="page">1</span>
                        <a href="car-list.html" class="page-numbers radius-0">2</a>
                        <a href="car-list.html" class="page-numbers radius-0">3</a>
                        <a href="car-list.html" class="page-numbers radius-0">4</a>
                        <a href="car-list.html" class="page-numbers radius-0 next">Next</a>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <!-- car-list-area end -->


@stop

@Push('js')

@endpush