
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
            <h1>Gestion des marques</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Gestion des marques</li>
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
                <h3 class="card-title">Ajouter une marque</h3>
              </div>
             
              <!-- /.card-header -->
              <div class="card-body">
              @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if(session()->get('danger'))
                    <div class="alert alert-danger">
                        {{ session()->get('danger') }}
                    </div>
                @endif
            <form name="add" method="POST" action="{{ route('admin.list_marques.store')}}"  enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="row">
                <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                    <div class="form-group">
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" value="1" name="status">
                                    <label class="custom-control-label" for="status">Status</label>
                                    </div>
                                </div>

                            
                            <div class="form-group">
                                <label for="titre">Titre de catégorie</label>
                                <input type="text" class="form-control" id="titre" placeholder="" name="titre"  value="{{old('titre')}}">
                                 @error('titre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <label for="image">Image</label>
                               <input type="file" name="image" class="form-control" id="image" value="{{old('image')}}">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           


                            <button class="btn btn-primary btn-sm"  type="submit">Ajouter</button>
                    </div>
                </div>
                </div>
               
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
</div>



            

@stop

@Push('js')

@endpush
