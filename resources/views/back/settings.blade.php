
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
            <h1>Sécurité</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Sécurité</li>
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
                <h3 class="card-title">Modifier le mot de passe</h3>
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
            <form name="update" method="POST" action="{{ route('admin.settings.update',$admin->id)}}"  enctype="multipart/form-data">
            {{method_field('post')}}
        {{csrf_field()}}

            <div class="row">
                <div class="col-md-8">
               
                           
                            <div class="form-group">
                                <label for="non">Nom</label>
                                <input type="text" class="form-control" id="nom" placeholder="" name="name"  value="{{$admin->name}}">
                                 @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="login">Nom d'utilisateur</label>
                                <input type="text" class="form-control" id="login" placeholder="" name="login"  value="{{$admin->login}}">
                                 @error('login')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Nouveau mot de passe</label>
                                <input type="password" class="form-control" id="titre" placeholder="" name="password"  value="">
                                 @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
