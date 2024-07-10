 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-light navbar-light">
         <a href="index.html" class="navbar-brand mx-4 mb-3">
             <h3 class="text-primary">TV Comp</h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="/admincss/img/hanni.jpeg" alt="" style="width: 40px; height: 40px;">
                 <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
             </div>
             <div class="ms-3">
                 <h6 class="mb-0">{{ Auth::user()->name }}</h6>
             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="{{ route('home') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <a href="{{ route('/criterias') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Kriteria</a>
             <a href="{{ route('/alternatives') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Alternatif</a>
             <a href="{{ route('/products') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Nilai Alternatif</a>
             <div class="nav-item dropdown">
                 <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Analisa</a>
                 <div class="dropdown-menu bg-transparent border-0">
                     <a href="{{ route('criteria_analysis.index') }}" class="dropdown-item">Analisa Kriteria</a>
                     <a href="{{ route('alternative_analysis.index') }}" class="dropdown-item">Analisa Alternatif</a>
                 </div>
             </div>
             <a href="{{ route('rankings.index') }}" class="nav-item nav-link"><i class="fa fa-trophy me-2"></i>Ranking</a>

         </div>
     </nav>
 </div>
 <!-- Sidebar End -->