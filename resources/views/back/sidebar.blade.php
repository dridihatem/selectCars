
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/back/img/AdminLTELogo.png')}}" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Administrator</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/back/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
          <a href="{{ route('logoutSession') }}" style="color:red;"><i class="fas fa-sign-out-alt"></i> Déconnecter</a>
        </div>
      </div>

      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'menu-open' : '' }} ">
            <a href="{{route('dashboard')}}" class="nav-link  {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Tableau de bord
                
              </p>
            </a>
            
          </li>
          <li class="nav-item  {{ (request()->is('admin/list_voitures') || (request()->is('admin/list_categories')) || (request()->is('admin/list_lieux')) || (request()->is('admin/list_marques'))  || (request()->is('admin/list_modeles')) ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->is('admin/list_voitures')) ? 'active' : '' }}">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Véhicules
                <i class="fas fa-angle-left right"></i>
                <span class="right badge badge-info">
                {{ $count_voiture = \App\Models\Voiture::count(); }}</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item ">
                <a href="{{route('admin.list_voitures')}}" class="nav-link {{ (request()->is('admin/list_voitures')) ? 'active' : '' }}">
                  
                  <p>Liste des véhicules</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.list_categories')}}" class="nav-link {{ (request()->is('admin/list_categories')) ? 'active' : '' }}">
                  
                  <p>Catégories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.list_marques')}}" class="nav-link {{ (request()->is('admin/list_marques')) ? 'active' : '' }}">
                
                  <p>Marques</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.list_modeles')}}" class="nav-link {{ (request()->is('admin/list_modeles')) ? 'active' : '' }}">
                 
                  <p>Modèles</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{route('admin.list_lieux')}}" class="nav-link {{ (request()->is('admin/list_lieux')) ? 'active' : '' }}">
                 
                  <p>Lieu</p>
                </a>
              </li>



            </ul>        
          </li>
          <li class="nav-item {{ (request()->is('admin/list_vendues') || request()->is('admin/list_disponibles')) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Inventaires
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.list_voiture_vendues')}}" class="nav-link {{ (request()->is('admin/list_vendues')) ? 'active' : '' }}">
                <span class="badge badge-info right">{{ $voiture_vendur = \App\Models\Voiture::where('status',0)->count()}}</span>
                  <p>Vendues</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.list_voiture_disponibles')}}" class="nav-link {{ (request()->is('admin/list_disponibles')) ? 'active' : '' }}">
                <span class="badge badge-info right">{{ $voiture_vendur = \App\Models\Voiture::where('status',1)->count()}}</span>
                  <p>Disponibles</p>
                </a>
              </li>
             
             
            </ul>
          </li>

          <li class="nav-item">
        
              
              <a href="{{route('admin.list_demande_visite')}}" class="nav-link   {{ (request()->is('admin/demande_visites')) ? 'active' : '' }}">  
                <i class="nav-icon fa fa-calendar"></i>
                <p>Les demandes de visite</p>
              </a>
              
          </li>

          <li class="nav-item {{ (request()->is('admin/list_faq')) ? 'active' : '' }}">
          
           
              <a href="{{route('admin.list_faq')}}" class="nav-link  {{ (request()->is('admin/list_faq')) ? 'active' : '' }}">
                <i class="nav-icon fa fa-question-circle"></i>
                   <p>FAQ's</p>
              </a>
              
          </li>

          <li class="nav-item {{ (request()->is('admin/list_banners')) ? 'active' : '' }}">
          
              
              <a href="{{route('admin.list_banners')}}" class="nav-link {{ (request()->is('admin/list_banners')) ? 'active' : '' }}">
                <i class="nav-icon fa fa-photo-video"></i>
               <p> Banniéres</p>
              </a>
            
          </li>


          <li class="nav-item">
         
              
              <a href="{{route('admin.settings')}}" class="nav-link">
                 <i class="nav-icon fa fa-cog"></i>
               <p> Paramètres</p>
              </a>
                
          </li>


          
         
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>