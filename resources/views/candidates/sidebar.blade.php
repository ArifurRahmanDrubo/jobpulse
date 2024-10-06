

<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" >
        <span class="ms-1 font-weight-bold text-white" id="role">JOBPULSE. {{ auth()->user()->role }} </span>
        <p class="ms-1 font-weight-bold text-white" id="name">{{ auth()->user()->name }}</p>
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
          <a class="nav-link text-white" href="{{ url('appliedJobPage') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">work</i>
            </div>
            <span class="nav-link-text ms-1">Applied Job</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('shortlistJobs') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">search</i>
            </div>
            <span class="nav-link-text ms-1">Shortlist</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/educationCreatePage') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">school</i>
            </div>
            <span class="nav-link-text ms-1">Education</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/job/experience') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">work</i>
            </div>
            <span class="nav-link-text ms-1">Experience</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/candidate/skill/page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">school</i></i>
            </div>
            <span class="nav-link-text ms-1">Skill</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/job/traning') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">school</i>
            </div>
            <span class="nav-link-text ms-1">Training</span>
          </a>
        </li>

        <li class="nav-item mb-1 mt-0">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account Settings</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/Candidate/profile/page') }}">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="{{ url('/Candidate/password/change') }}">
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
        {{-- <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link text-white" style="border: none; background: none;">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">logout</i>
                </div>
                <span class="nav-link-text ms-1">Logout</span>
            </button>
        </form>
        </li> --}}
        
      </ul>
    </div>
  </aside>