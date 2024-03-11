

@extends('back.app')

@Push('css') 

@endpush

@section('content')
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><img src="{{ asset('assets/back/img/select-cars_logo-officiel.png')}}" style="width:180px;"/></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>
      @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('error-message'))
                    <p class="alert alert-info">{{ Session::get('error-message') }}</p>
                @endif    
                
                <form action="{{ route('login.functionality') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        
                        <input type="text" class="form-control" name="login" placeholder="Login">
                    </div>
                    <div class="input-group mb-3">
                        
                        <input type="password" class="form-control" name="password" placeholder="Mot de passe">
                        <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
          </div>

                 
                </form>


    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


    @stop

@Push('js')

@endpush
