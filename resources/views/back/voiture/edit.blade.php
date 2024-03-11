
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
                <h3 class="card-title">Modifier la véhicule</h3>
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
            <form name="update" method="POST" action="{{ route('admin.list_voitures.update',$voiture->id)}}"  enctype="multipart/form-data">
            {{method_field('post')}}
        {{csrf_field()}}

            <div class="row">
                <div class="col-md-8">
                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="status" value="1" name="status" {{ $voiture->status ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="status">Status</label>
                                    </div>
                </div>
                            <div class="form-group">
                                <label for="reference">Référence de véhicule</label>
                                <input type="text" class="form-control" id="reference" placeholder="" name="reference" value="{{$voiture->reference}}"><div id="referenceStatus" style="color:red;"></div>
                                @error('reference')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre de véhicule</label>
                                <input type="text" class="form-control" id="titre" placeholder="" name="titre"  value="{{$voiture->titre}}">
                                 @error('titre')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Déscription</label>
                                <textarea class="" id="description" name="description">{{$voiture->description}}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image1">Image 1</label>
                               <input type="file" name="image1" class="form-control" id="image1">
                                @error('image')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image2">Image 2</label>
                               <input type="file" name="image2" class="form-control" id="image2">
                                @error('image2')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image3">Image 3</label>
                               <input type="file" name="image3" class="form-control" id="image3">
                                @error('image3')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image4">Image 4</label>
                               <input type="file" name="image4" class="form-control" id="image4">
                                @error('image4')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image5">Image 5</label>
                               <input type="file" name="image5" class="form-control" id="image5">
                                @error('image5')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <button class="btn btn-primary btn-sm"  type="submit">Modifier</button>
                    </div>
                    

                <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                               

                                <div class="form-group">
                                <label for="prix">Prix</label>
                                <div class="input-group">
                                
                                        <input type="text" class="form-control" name="prix" id="prix" value="{{ $voiture->prix }}">
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
                                                   <option value="{{ $list_lieu->id}}" {{$voiture->lieu == $list_lieu->id  ? 'selected' : ''}}>{{ $list_lieu->titre}}</option>
                                                       
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
                                                   <option value="{{ $list_categorie->id}}"  {{$voiture->categorie_id == $list_categorie->id  ? 'selected' : ''}}>{{ $list_categorie->titre}}</option>
                                                       
                                                   @endforeach
                                                </select>
                                @error('categorie_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div> 

                                <div class="form-group">
                                                <label for="type">Nature</label>
                                                <select name="nature" class="form-control">
                                                    <option value="Utilitaire" @if ($voiture->nature == 'Utilitaire') {{ 'selected' }} @endif>Utilitaire</option>
                                                    <option value="Tourisme" @if ($voiture->nature == 'Tourisme') {{ 'selected' }} @endif>Tourisme</option>
                                                </select>
                                @error('nature')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror               
                                </div>  

                                <div class="form-group">
                                                <label for="type">Energie</label>
                                                <select name="energie" class="form-control">
                                                    <option value="Essence" @if ($voiture->energie == 'Essence') {{ 'selected' }} @endif>Essence</option>
                                                    <option value="Diesel"  @if ($voiture->energie == 'Diesel') {{ 'selected' }} @endif>Diesel</option>
                                                    <option value="Hybrides"  @if ($voiture->energie == 'Hybrides') {{ 'selected' }} @endif>Hybrides</option>
                                                    <option value="Electriques"  @if ($voiture->energie == 'Electriques') {{ 'selected' }} @endif>Electriques</option>
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
                                                   <option value="{{ $list_marque->id}}" {{$voiture->marque_id == $list_marque->id  ? 'selected' : ''}}>{{ $list_marque->titre}}</option>
                                                       
                                                   @endforeach
                                                </select>
                                @error('marque')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                </div> 
                                
                                <div class="form-group" id="showmodel" >
                                                  
                                                <label for="model" class="font-sm">Model</label>
                                                <select class="form-control" id="model" name="model">

                                                @php 
                                                $modelVoiture = \App\Models\ModelVoiture::where('id_marque',$voiture->marque_id)->where('status',1)->get();
                                                @endphp
                                                @foreach ($modelVoiture as $list_model )
                                                <option value="{{ $list_model->titre}}"  {{$voiture->modele == $list_model->titre  ? 'selected' : ''}}>{{ $list_model->titre}}</option>
                                                  
                                                @endforeach
                                                </select>
                                                          
                                                        
                                                   
                                 </div>

                                 <div class="form-group">
                                                <label for="annee">Année de circulation</label>
                                                <input type="text" class="form-control" id="annee" placeholder="" name="annee"  value="{{$voiture->annee}}">
                                                    @error('annee')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                 </div> 

                                 <div class="form-group">
                                                <label for="kilometrage">Kilométrage</label>
                                                <input type="text" class="form-control" id="kilometrage" placeholder="" name="kilometrage"  value="{{$voiture->kilometrage}}">
                                                    @error('kilometrage')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                 </div> 
                                 <div class="form-group">
                                                <label for="type">Transmission</label>
                                               <select name="type" class="form-control" id="type">
                                                    <option value="Automatique" @if ($voiture->type == 'Automatique') {{ 'selected' }} @endif>Automatique</option>
                                                    <option value="Manuelle" @if ($voiture->type == 'Manuelle') {{ 'selected' }} @endif>Manuelle</option>
                                                </select>
                                  </div> 

                                  <div class="form-group">
                                                <label for="nbre_cylindre">Nombre de CH din</label>
                                                <input type="number" min=1 class="form-control" id="nbre_cylindre" placeholder="" name="nbre_cylindre"  value="{{ $voiture->nbre_cylindre }}">
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
                    <a href="{{route('admin.voiture.deleteimage1',$voiture->id)}}">Supprimer l'image</a>
                  </div>
                  @endif
                    @if (!is_null($voiture->image2) OR !empty($voiture->image2))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image2) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image2) }}" class="img-fluid mb-2"/>
                    </a>
                    <a href="{{route('admin.voiture.deleteimage2',$voiture->id)}}">Supprimer l'image</a>
                  </div>
                  @endif
                    @if (!is_null($voiture->image3) OR !empty($voiture->image3))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image3) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image3) }}" class="img-fluid mb-2"/>
                    </a>
                    <a href="{{route('admin.voiture.deleteimage3',$voiture->id)}}">Supprimer l'image</a>
                  </div>
                  @endif
                    @if (!is_null($voiture->image4) OR !empty($voiture->image4))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image4) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image4) }}" class="img-fluid mb-2"/>
                    </a>
                    <a href="{{route('admin.voiture.deleteimage4',$voiture->id)}}">Supprimer l'image</a>
                  </div> 
                  @endif
                    @if (!is_null($voiture->image5) OR !empty($voiture->image5))
                    <div class="col-sm-2">
                    <a href="{{ url('../images/voitures',$voiture->image4) }}" data-toggle="lightbox" data-gallery="gallery">
                      <img src="{{ url('../images/voitures',$voiture->image5) }}" class="img-fluid mb-2"/>
                    </a>
                    <a href="{{route('admin.voiture.deleteimage5',$voiture->id)}}">Supprimer l'image</a>
                  </div>
                    @endif

                

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
