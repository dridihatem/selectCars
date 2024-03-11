
@extends('back.app')

@Push('css') 
     <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{ asset('assets/back/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion des voitures</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Gestion des voitures</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Détail de véhicule</h3>
              </div>
             
              <!-- /.card-header -->
              <div class="card-body">

              <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Prix</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ number_format($voiture->prix,2)}} €</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Nombre de visite</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $voiture->visite}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-4">
                  <div class="info-box bg-light">
                    <div class="info-box-content">
                      <span class="info-box-text text-center text-muted">Status</span>
                      <span class="info-box-number text-center text-muted mb-0">{{ $voiture->status ? 'Disponible' : 'Vendue'}}</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <h4>Détail</h4>
                    <div class="post">
                      
                        {!! $voiture->description !!}
                    
                    </div>

                    

                    
                </div>

              </div>
              <div class="row">
              <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Galeries</h4>
              </div>
              <div class="card-body">
                <div class="row">
                    @if (!is_null($voiture->image1))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image1) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image1) }}" class="img-fluid mb-2"/>
                    </a>
                  </div>
                  @endif
                    @if (!is_null($voiture->image2) OR !empty($voiture->image2))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image2) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image2) }}" class="img-fluid mb-2"/>
                    </a>
                  </div>
                  @endif
                    @if (!is_null($voiture->image3) OR !empty($voiture->image3))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image3) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image3) }}" class="img-fluid mb-2"/>
                    </a>
                  </div>
                  @endif
                    @if (!is_null($voiture->image4) OR !empty($voiture->image4))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image4) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image4) }}" class="img-fluid mb-2"/>
                    </a>
                  </div> 
                  @endif
                    @if (!is_null($voiture->image5) OR !empty($voiture->image5))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image4) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image5) }}" class="img-fluid mb-2"/>
                    </a>
                  </div>
                    @endif

                

                </div>
              </div>
            </div>
         </div> 
        </div>   

            </div>
            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
            <h6>Titre de l'annonce:</h6>  
            <h3 class="text-primary">{{$voiture->titre}}</h3>
              <div class="row">
                <div class="col-md-6">
              <div class="text-muted">
                <p class="text-sm">Marque:
                  <b class="d-block">{{$marque = \App\Models\Marque::where('id',$voiture->marque_id)->first()->titre; }}</b>
                </p>
                <p class="text-sm">Modèle:
                  <b class="d-block">{{$voiture->modele }}</b>
                </p>
                <p class="text-sm">Catégorie:
                  <b class="d-block">{{$categorie = \App\Models\Categorie::where('id',$voiture->categorie_id)->first()->titre; }}</b>
                </p>
                <p class="text-sm">Nature:
                  <b class="d-block">{{$voiture->nature }}</b>
                </p>
                <p class="text-sm">Année de fabrication:
                  <b class="d-block">{{$voiture->annee }}</b>
                </p>
                <p class="text-sm">Transmition:
                  <b class="d-block">{{$voiture->type }}</b>
                </p>
                <p class="text-sm">Energie:
                  <b class="d-block">{{$voiture->energie }}</b>
                </p>
                
                <p class="text-sm">Kilométrage:
                  <b class="d-block">{{$voiture->kilometrage }}</b>
                </p>
                <p class="text-sm">Nombre de CH din:
                  <b class="d-block">{{$voiture->nbre_cylindre }}</b>
                </p>
              </div>
            </div>
             
            </div>

              
            </div>

            


          </div>

  
            </div>
            </div>
            </div>
            </div>
            </div>
</section>
</div>



            

@stop

@Push('js')
<script src="{{asset('assets/back/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

  })
</script>

@endpush
