<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent">
        <div class="headder-top header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-3 col-md-3">
                        <!-- Logo -->
                        <div class="d-flex justify-content-end">

                        </div>
                        <div class="logo">
                            <a href="{{ url('/') }}"><img width="50%"
                                    src="{{ asset('assets') }}/images/jobPulse/jobpulse.png" alt=""></a>
                        </div>
                    </div>
                    <div class="col-9 col-md-9">
                        <div class="d-flex justify-content-end">
                            <div class="menu-wrapper w-100">
                                <!-- Main-menu -->
                                <div class="main-menu">
                                    <nav class="d-none d-lg-block">
                                        <ul id="navigation" class="d-flex align-items-center ml-auto">
                                            <li><a href="{{ url('/') }}">Home</a></li>
                                            <li><a href="{{ url('/findJobs') }}">Find a Jobs</a></li>
                                            <li><a href="{{ url('/about') }}">About</a></li>
                                            <li><a href="{{ url('/contact') }}">Contact</a></li>

                                            @auth
                                                <li><a href="{{ url('/dashboard') }}" class="btn inline-btn"
                                                        style="font-size: 14px; padding: 18px 28px; border-radius: 10px;">Go
                                                        to Dashboard</a>
                                                </li>
                                            @endauth

                                            @guest
                                                <li class="dropdown d-inline-block" style="margin-right:10px;">
                                                    <button
                                                        class="btn btn-light btn-sm rounded-pill dropdown-toggle inline-btn"
                                                        id="registerDropdown" data-toggle="dropdown"
                                                        style="font-size: 14px; padding: 18px 28px; border-radius: 10px;">
                                                        Register
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="registerDropdown">
                                                        <p class="mb-0 font-weight-normal float-left dropdown-header"
                                                            style="padding: 8px 12px; font-size: 14px;">Register As</p>
                                                        <a class="dropdown-item" href="{{ url('/companyRegister') }}"
                                                            style="padding: 8px 12px; margin:0; font-size: 14px;">Company</a>
                                                        <a class="dropdown-item" href="{{ url('/candidateRegister') }}"
                                                            style="padding: 8px 12px; margin:0; font-size: 14px;">Candidate</a>
                                                    </div>
                                                </li>
                                                <li class="dropdown d-inline-block">
                                                    <button class="btn head-btn1 dropdown-toggle inline-btn" type="submit"
                                                        id="loginDropdown" data-toggle="dropdown"
                                                        style="font-size: 14px; padding: 18px 28px; border-radius: 10px;">
                                                        Login
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="loginDropdown">
                                                        <p class="mb-0 font-weight-normal float-left dropdown-header"
                                                            style="padding: 8px 12px; font-size: 14px;">Login As</p>
                                                        <a class="dropdown-item" href="{{ url('/companyLogin') }}"
                                                            style="padding: 8px 12px; margin:0; font-size: 14px;">Company</a>
                                                        <a class="dropdown-item" href="{{ url('/candidateLogin') }}"
                                                            style="padding: 8px 12px; margin:0; font-size: 14px;">Candidate</a>
                                                    </div>
                                                </li>
                                            @endguest
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header-btn -->
                            </div>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
