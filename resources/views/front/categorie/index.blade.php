

@extends('front.app')

@Push('css') 

@endpush

@section('content')



    <!-- Page title start-->
    <div class="page-title-area pb-100 bg-img bg-s-cover" data-bg-image="{{asset('images/banners/hero-banner-3.jpg')}}">
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
<!-- Contact-area start -->
<div class="contact-area pt-100 category-area category-1">
        <div class="container">
            <div class="row">
            

                    @foreach ($categories as $listca )
                    <div class="col-lg-2 col-sm-6 mb-30 p-15" data-aos="fade-up">
                            <a href="{{ url('categorie',$listca->slug)}}">
                                <div class="category-item">
                                    <div class="d-flex flex-wrep justify-content-between mb-10">
                                        <h6 class="category-title mb-10">
                                        {{$listca->titre  }}
                                        </h6>
                                        <span class="category-qty h6 mb-10">(@php echo  \App\Models\Voiture::where('categorie_id',$listca->id)->count(); @endphp)</span>
                                    </div>
                                    <div class="category-img">
                                        <img class="lazyload blur-up" src="{{asset('assets/front/images/placeholder.png') }}" data-src="{{url('images/categories',$listca->image)  }}" alt="{{ $listca->titre  }}" title="{{$listca->titre  }}">
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                       
                    </div>
                    
               
                
            </div>

           
            </div>
                
               
            </div>

            

        </div>
        
    </div>
    <!-- Contact-area end -->
    @stop

@Push('js')

@endpush
