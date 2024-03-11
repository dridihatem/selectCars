
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
                <h3 class="card-title">Ajouter un véhicule</h3>
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
            <form name="add" method="POST" action="{{ route('admin.list_voitures.store')}}"  enctype="multipart/form-data">
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
                                <label for="reference">Référence de véhicule</label>
                                <input type="text" class="form-control" id="reference" placeholder="" name="reference" value="{{ 'VE-'.$random_reference}}"><div id="referenceStatus" style="color:red;"></div>
                                @error('reference')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre de véhicule</label>
                                <input type="text" class="form-control" id="titre" placeholder="" name="titre"  value="{{old('titre')}}">
                                 @error('titre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Déscription</label>
                                <textarea class="" name="description" id="description">{{old('description')}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image1">Image 1</label>
                               <input type="file" name="image1" class="form-control" id="image1" value="{{old('image1')}}">
                                @error('image1')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image2">Image 2</label>
                               <input type="file" name="image2" class="form-control" id="image2" value="{{old('image2')}}">
                              
                            </div>

                            <div class="form-group">
                                <label for="image3">Image 3</label>
                               <input type="file" name="image3" class="form-control" id="image3" value="{{old('image3')}}">
                             
                            </div>

                            <div class="form-group">
                                <label for="image4">Image 4</label>
                               <input type="file" name="image4" class="form-control" id="image4" value="{{old('image4')}}">
                             
                            </div>

                            <div class="form-group">
                                <label for="image5">Image 5</label>
                               <input type="file" name="image5" class="form-control" id="image5" value="{{old('image5')}}">
                              
                            </div>


                            <button class="btn btn-primary btn-sm"  type="submit">Ajouter</button>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                               

                                <div class="form-group">
                                <label for="prix">Prix</label>
                                <div class="input-group">
                                
                                        <input type="text" class="form-control" name="prix" id="prix" value="{{ old('prix')}}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">€</span>
                                        </div>
                                </div>
                                @error('prix')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div>

                                <div class="form-group">
                                                <label for="lieu">Lieu</label>
                                                <select name="lieu" class="form-control" id="lieu">
                                                 
                                                   @foreach ($lieu as $list_lieu )
                                                   <option value="{{ $list_lieu->id}}">{{ $list_lieu->titre}}</option>
                                                       
                                                   @endforeach
                                                </select>
                                @error('list_lieu')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div> 


                                <div class="form-group">
                                                <label for="type">Type</label>
                                                <select name="categorie_id" class="form-control" id="type">
                                                 
                                                   @foreach ($categorie as $list_categorie )
                                                   <option value="{{ $list_categorie->id}}">{{ $list_categorie->titre}}</option>
                                                       
                                                   @endforeach
                                                </select>
                                @error('categorie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div> 

                                <div class="form-group">
                                                <label for="type">Nature</label>
                                                <select name="nature" class="form-control">
                                                    <option value="Utilitaire" @if (old('nature') == "Utilitaire") {{ 'selected' }} @endif>Utilitaire</option>
                                                    <option value="Tourisme" @if (old('nature') == "Tourisme") {{ 'selected' }} @endif>Tourisme</option>
                                                </select>
                                @error('nature')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror               
                                </div>  

                                <div class="form-group">
                                                <label for="type">Energie</label>
                                                <select name="energie" class="form-control">
                                                    <option value="Essence" @if (old('energie') == "Essence") {{ 'selected' }} @endif>Essence</option>
                                                    <option value="Diesel" @if (old('nature') == "Diesel") {{ 'selected' }} @endif>Diesel</option>
                                                    <option value="Hybrides" @if (old('nature') == "Hybrides") {{ 'selected' }} @endif>Hybrides</option>
                                                    <option value="Electriques" @if (old('nature') == "Electriques") {{ 'selected' }} @endif>Electriques</option>
                                                </select>
                                @error('energie')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror                  
                                </div>  
                                <div class="form-group">
                                                <label for="marque">Marque</label>
                                                <select name="marque_id" class="form-control" id="marque">
                                                <option value=''>...</option>
                                                   @foreach ($marque as $list_marque )
                                                   <option value="{{ $list_marque->id}}">{{ $list_marque->titre}}</option>
                                                       
                                                   @endforeach
                                                </select>
                                @error('marque')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div> 
                                
                                <div class="form-group" id="showmodel" style="display:none;">
                                                  
                                                <label for="model" class="font-sm">Model</label>
                                                <select class="form-control" id="model" name="model"></select>
                                                          
                                                        
                                                   
                                 </div>

                                 <div class="form-group">
                                                <label for="annee">Année de circulation</label>
                                                <input type="text" class="form-control" id="annee" placeholder="" name="annee"  value="{{old('annee')}}">
                                                    @error('annee')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                 </div> 

                                 <div class="form-group">
                                                <label for="kilometrage">Kilométrage</label>
                                                <input type="text" class="form-control" id="kilometrage" placeholder="" name="kilometrage"  value="{{old('kilometrage')}}">
                                                    @error('kilometrage')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                 </div> 
                                 <div class="form-group">
                                                <label for="type">Transmission</label>
                                               <select name="type" class="form-control" id="type">
                                                    <option value="Automatique" @if (old('transmission') == "Automatique") {{ 'selected' }} @endif>Automatique</option>
                                                    <option value="Manuelle" @if (old('transmission') == "Manuelle") {{ 'selected' }} @endif>Manuelle</option>
                                                </select>
                                  </div> 

                                  <div class="form-group">
                                                <label for="nbre_cylindre">Nombre de CH din</label>
                                                <input type="number" min=1 class="form-control" id="nbre_cylindre" placeholder="" name="nbre_cylindre"  value="{{old('nbre_cylindre')}}">
                                                    @error('nbre_cylindre')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                  </div>
                                 
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

<script type="text/javascript">
  

$(document).on('input','#reference',function(e){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let referenceInput = $('#reference').val();
 
    $.ajax({
        method:"POST",
        url: "{{route('admin.checkreference')}}",
        data:{reference:referenceInput},
        success: function(data){
          
          $('#referenceStatus').html(data);
        }
      });

});

   
    

</script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
                .create(document.querySelector('#description'))
                .catch(error => {
                    console.error(error);
                });
        </script>

<script type="text/javascript">
    $(document).ready(function ()
    {
        
        $('select[name="marque_id"]').on('change',function(){
           
            var marqueID = $(this).val();
            if(marqueID){
                $.ajax({
                    url: '/getModels/'+marqueID,
                    type: "GET",
                    dataType:"json",
                    success:function(data)
                {
                    if(data.length != 0){
                      $('#showmodel').show();
                    $('select[name="model"]').empty();
                    
                    $.each(data, function(key,value){
                        console.log(value);

                        $('select[name="model"]').append('<option value="'+value+'">'+value+'</option>');
                    });
                   
                    }
                    else{
                        $('#showmodel').hide();
                    }
                    
                    
                }

                });
            }
            else {
                $('select[name="model"]').empty();
               
            }
        });

        



       


    });
    
</script>
@endpush
