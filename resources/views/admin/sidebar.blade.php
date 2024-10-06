<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" >
        <span class="ms-1 font-weight-bold text-white">JOBPULSE. {{ Auth::user()->role }} </span>
        <p class="ms-1 font-weight-bold text-white"> {{ Auth::user()->name }}</p>
      </a>
      
    </div>
    
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="{{ url('/admin/dashboard') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        
       
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('admin/companies') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">business</i>
            </div>
            <span class="nav-link-text ms-1">Companies</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('admin/jobs') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">work</i>
            </div>
            <span class="nav-link-text ms-1">Jobs</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">pages</i>
            </div>
            <span class="nav-link-text ms-1 menu-title">Pages</span>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ url('/Pages') }}">Home</a></li>
              <li class="nav-item"> <a class="nav-link" href="{{ url('/aboutPage/admin') }}">About</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item mb-1 mt-0">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account Settings</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('/admin/profile/page')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{url('/admin/password/change')}}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">password</i>
            </div>
            <span class="nav-link-text ms-1">Account</span>
          </a>
        </li>
        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="nav-link text-white" style="border: none; background: none; cursor: pointer;">
                  <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                      <i class="material-icons opacity-10">logout</i>
                  </div>
                  <span class="nav-link-text ms-1">Logout</span>
              </button>
          </form>
      </li>
      </ul>
    </div>
  </aside>