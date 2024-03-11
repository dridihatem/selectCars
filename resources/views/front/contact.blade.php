

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
<div class="contact-area pt-100">
        <div class="container">
            <div class="row justify-content-center">
                
                
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-30 color-1" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon">
                            <i class="fal fa-phone-plus"></i>
                        </div>
                        <div class="card-text">
                            <p><a href="tel:0033075109866">00 33 0 75 10 98 66</a></p>
                            <p><a href="tel:0033676318489">00 33 6 76 31 84 89</a>
                        </div>
                    </div>
                </div>
                @php
                $lieu1= \App\Models\Lieu::get()
                @endphp
                @foreach ($lieu1 as $list_lieu )
                <div class="col-lg-4 col-md-6">
                    <div class="card mb-30 color-3" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon">
                            <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="card-text">
                            <p>{{ $list_lieu->titre}}</p>
                        </div>
                    </div>
                </div>
                    
                @endforeach
              
            </div>

            <div class="pb-70"></div>
            <div class="row gx-xl-5">
            @foreach ($lieu1 as $list_lieu )

            <div class="col-md-6">
                     <div class="map" data-aos="fade-up">
                <!-- Background Image -->
                <div class="lazy-container ratio ratio-21-8">
                  {!! $list_lieu->frame_map !!}
                </div>
            </div>
            </div>
                
            @endforeach
             
               
            </div>

            <div class="pb-70"></div>
            <div class="row gx-xl-5">
                <div class="col-lg-6 mb-30" data-aos="fade-left">
                    <div class="content-title">
                       
                        <h3 class="mb-20">Vous avez une question, une réclamation ou un commentaire ?</h3>
                        <p class="mb-20">Votre retour est essentiel pour nous permettre d'améliorer continuellement nos services. <br>Notre équipe s'engage à traiter chaque demande avec la plus grande attention.<br>
Merci de remplir le formulaire de contact, et nous vous assurons une réponse rapide et efficace.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 mb-30 order-lg-first" data-aos="fade-right">
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success')  }}
                </div>
                @endif
                    <form   method="POST" action="{{ route('contact.us.store')}}"  id="contactUSForm">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <input type="text" name="nom" class="form-control" id="name" value="{{ old('nom')}}" placeholder="Votre nom et prénom*">
                                  @if($errors->has('nom'))
                                  <span class="text-danger">{{ $errors->first('nom')}}</span>
                                  @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <input type="text" name="telephone" class="form-control" id="telephone" value="{{ old('telephone')}}" placeholder="Téléphone*">
                                    @if($errors->has('telephone'))
                                  <span class="text-danger">{{ $errors->first('telephone')}}</span>
                                  @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <input type="email" name="email" class="form-control" id="email" value="{{ old('email')}}" placeholder="Email*">
                                    @if($errors->has('email'))
                                  <span class="text-danger">{{ $errors->first('email')}}</span>
                                  @endif
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group mb-20">
                                    <input type="text" name="sujet" class="form-control" id="sujet" value="{{ old('sujet')}}" placeholder="Sujet*">
                                    @if($errors->has('sujet'))
                                  <span class="text-danger">{{ $errors->first('sujet')}}</span>
                                  @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-20">
                                    <textarea name="contenu" id="contenu" class="form-control" cols="30" rows="8"  placeholder="Message...">{{ old('contenu')}}</textarea>
                                    @if($errors->has('contenu'))
                                  <span class="text-danger">{{ $errors->first('contenu')}}</span>
                                  @endif
                                </div>
                            </div>
                          
                        
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-primary" title="Envoyer">
                                    Envoyer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="pb-70"></div>

        </div>
        
    </div>
    <!-- Contact-area end -->
    @stop

@Push('js')

@endpush
