
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
            <h1>Gestion des modèles</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Gestion des modèles</li>
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
                <h3 class="card-title">Modifier la modèle {{ $titleSeo}}</h3>
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
            <form name="update" method="POST" action="{{ route('admin.list_modeles.update',$modelVoiture->id)}}"  enctype="multipart/form-data">
            {{method_field('post')}}
        {{csrf_field()}}

            <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" value="1" name="status" {{ $modelVoiture->status ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Status</label>
                                    </div>
                </div>
                           
                            <div class="form-group">
                                <label for="titre">Modèle </label>
                                <input type="text" class="form-control" id="titre" placeholder="" name="titre"  value="{{$modelVoiture->titre}}">
                                 @error('titre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="marque">Marque</label>
                              <select name="id_marque" class="form-control">
                              @php 
                               $list_marque = \App\Models\Marque::get();
                              @endphp
                              @foreach ($list_marque as $marque )
                                    <option value="{{ $marque->id }}" {{$marque->id == $modelVoiture->id_marque  ? 'selected' : ''}}>{{ $marque->titre }}</option>
                              @endforeach
                              </select>
                            </div>
                           
                           

                            <button class="btn btn-primary btn-sm"  type="submit">Modifier</button>
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
