 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('/') }}" class="brand-link" style="height: 200px;">
         <img src="{{ URL::asset('/assets/dist/img/opgi.png') }}" alt=""
             class="brand-image img-circle elevation-3" style="opacity: 1; display: block;margin: auto;width: 100px;max-height: 100px;float:none">
         <span class="brand-text font-weight-light" style="display: block;margin: auto;text-align: center;">OPGI GHARDAIA</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ URL::asset('/assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">SECRITARIAT DG</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         {{-- <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div> --}}

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
                 <li class="nav-header">القائمة الرئيسية</li>
                 <li class="nav-item">
                     <a href="{{ url('/') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>

                         <p>
                             لوحة التحكم
                             <i class="right fas fa-light fa-circle-info "></i>
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     {{-- <a href="#" class="nav-link">
                         <ion-icon name="contrast-sharp" style="font-size: 1.2rem;"></ion-icon>
                         {{-- <i class="nav-icon far fa-light fa-address-book-o"></i> --}}
                         {{-- <ion-icon name="information-circle-outline"></ion-icon> --}}
                         {{-- <i class="nav-icon fad fa-info-circle"></i> --}}

                         {{-- <p>
                             Informations
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>   --}}
                     <ul class="nav nav-treeview">
                         
                     </ul>
                    <li class="nav-item">
                        <a href="{{ url('/cour_arrivee') }}" class="nav-link">
                            <i class="far fa-envelope nav-icon"></i>
                            <p>البريد الوارد</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/cour_depart') }}" class="nav-link">
                            <i class="far fa-envelope-open nav-icon"></i>
                            <p>البريد الصادر</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/bordereaux') }}" class="nav-link">
                            <i class="far fa-file nav-icon"></i>
                            <p> جداول الارسال</p>
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a href="{{ url('/contacts') }}" class="nav-link">
                            <i class="far fa-user nav-icon"></i>
                            <p>جهات الاتصال</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/parameters/all') }}" class="nav-link">
                            <i class="far fa-envelope nav-icon"></i>
                            <p>اعدادات </p>
                        </a>
                    </li>
                 </li>

                 {{-- <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Payements
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/charts/chartjs.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Payements</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/charts/flot.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Rapports</p>
                             </a>
                         </li>

                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="pages/gallery.html" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Gallery
                         </p>
                     </a>
                 </li> --}}
                 {{-- <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-chart-pie"></i>
                         <p>
                             Paramètres
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="pages/charts/chartjs.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Sauvgarde</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/charts/flot.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Restaurer</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="pages/charts/inline.html" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Réglages</p>
                             </a>
                         </li>
                     </ul>
                 </li> --}}



                 {{-- <li class="nav-header">EXAMPLES</li>
                 <li class="nav-item">
                     <a href="pages/calendar.html" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Calendar
                             <span class="badge badge-info right">2</span>
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="pages/kanban.html" class="nav-link">
                         <i class="nav-icon fas fa-columns"></i>
                         <p>
                             Kanban Board
                         </p>
                     </a>
                 </li>



                 <li class="nav-header">MISCELLANEOUS</li>
                 <li class="nav-item">
                     <a href="iframe.html" class="nav-link">
                         <i class="nav-icon fas fa-ellipsis-h"></i>
                         <p>Tabbed IFrame Plugin</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>Documentation</p>
                     </a>
                 </li>

                 <li class="nav-header">LABELS</li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-danger"></i>
                         <p class="text">Important</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-warning"></i>
                         <p>Warning</p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon far fa-circle text-info"></i>
                         <p>Informational</p>
                     </a>
                 </li> --}}
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
