
@extends('back.app')

@Push('css') 
   
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Gestion des demandes</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Gestion des demandes</li>
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
                <h3 class="card-title">Détail de la demande</h3>
              </div>
             
              <!-- /.card-header -->
              <div class="card-body">

              <div class="row">
            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
              <div class="row">
                
                
               
              <div class="row">
                <div class="col-md-12">
                <p class="text-sm">Titre:
                  <b class="d-block">{{ $demande->title }}</b>
                </p>
                <p class="text-sm">Nom et prénom:
                  <b class="d-block">{{ $demande->nom }} {{ $demande->prenom }}</b>
                </p>
                <p class="text-sm">Téléphone:
                  <b class="d-block">{{ $demande->telephone }} </b>
                </p>
                <p class="text-sm">Email:
                  <b class="d-block">{{ $demande->email }} </b>
                </p>
                <p class="text-sm">Message:
                  <b class="d-block">{!! $demande->message !!} </b>
                </p>
                <p class="text-sm">Réference de véhicule:
                  <b class="d-block"><a href="https://selectcarsauto.fr/voitures/{{ $demande->reference }}" target="_blank">{{ $demande->reference }}</a> </b>
                </p>
                <p class="text-sm">Date de RDV:
                  <b class="d-block">{{ $demande->start }} </b>
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
@endpush
