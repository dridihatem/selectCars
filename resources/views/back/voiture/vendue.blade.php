
@extends('back.app')

@Push('css') 
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Les véhicules vendues</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Les véhicules vendues</li>
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
                <h3 class="card-title">{{ $titleSeo}}</h3>
                <div class="card-tools">
                
                    
           
                </div>
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
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Reference</th>
                                <th>Titre</th>
                                <th>Type</th>
                                <th>Energie</th>
                                <th>Prix</th>
                                <th>Image</th>
                                <th>Staus</th>
                                <th>Visite</th>
                                <th width="100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
             </div>
            </div>
            </div>
        </div>
    </div>
</section>


@stop

@Push('js')

<!-- DataTables  & Plugins -->
<script src="{{asset('assets/back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>



<script type="text/javascript">
  $(function () {
      
    var table = $('.data-table').DataTable({
        paging: true,
        lengthChange: true,
        searching: true,
        ordering: true,
        info: true,
        autoWidth: false,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.list_voiture_vendues') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'reference', name: 'reference'},
            {data: 'titre', name: 'titre'},
            {data: 'type', name: 'type'},
            {data: 'energie', name: 'energie'},
            {data: 'prix', name: 'prix'},
            {data: 'image', name: 'image',
                render: function( data, type, full, meta ) {
                        return "<img src=\"../images/voitures/" + data + "\" class=\"img-rounded\" height=\"50\"/>";
                    }
                },
                {data:'status', name:'status',
                  render: function(data,type,full,meta){
                  if(data==1){
                return '<span class="badge bg-success">Disponible</span>';
              }
              else {
                return '<span class="badge bg-warning">Vendue</span>';
              }
            }
                },
             {data:'visite', name:'visite'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
      
  });
</script>
@endpush
