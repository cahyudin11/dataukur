 <aside class="main-sidebar sidebar-light-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('dashboard') }}" class="brand-link">
         <img src="{{ asset('lte//dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">Dakur GMP</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 @if (Auth::user()->photo)
                     <img src="{{ asset('storage/photos/' . Auth::user()->photo) }}" class="img-circle elevation-2"
                         alt="User Image" style="width: 40px; height: 40px; object-fit: cover;">
                 @else
                     <img src="{{ asset('lte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                         alt="Default User Image" style="width: 40px; height: 40px; object-fit: cover;">
                 @endif
             </div>
             <div class="info">
                 <a href="{{ route('profileedit') }}" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header">HOME</li>
                 <li class="nav-item">
                     <a href="{{ url('dashboard') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MAIN MENU</li>
                 <li class="nav-item">
                     <a href="{{ url('biodata') }}" class="nav-link">
                         <i class="nav-icon far fa-user"></i>
                         <p>
                             Master Biodata
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('qualitycontrol') }}" class="nav-link">
                         <i class="nav-icon fa fa-handshake"></i>
                         <p>
                             Master Quality Control
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('proyek') }}" class="nav-link">
                         <i class="nav-icon fa fa-folder-open"></i>
                         <p>
                             Master Proyek
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('users') }}" class="nav-link">
                         <i class="nav-icon fa fa-walking"></i>
                         <p>
                             Master Pengguna
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">MENU REPORT</li>
                 <li class="nav-item">
                     <a href="{{ url('hasildakur') }}" class="nav-link">
                         <i class="nav-icon far fa-address-book"></i>
                         <p>
                             Hasil Data Ukur
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('logout') }}" class="nav-link">
                         <button type="submit" class="btn btn-danger w-100">
                             <i class="fas fa-sign-out-alt"></i>
                         </button>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
