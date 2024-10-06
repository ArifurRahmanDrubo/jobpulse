
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" >
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Sign in</h4>
                  <div class="row mt-3">
                    <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start">
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label" >Email</label>
                    <input type="email" id="email" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label" >Password</label>
                    <input type="password" id="password" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="button" onclick="submitLogin()" class="btn bg-gradient-primary w-100 my-4 mb-2">Log In</button>
                  </div>
                  <div class="ml-5 mt-3">
                    <span>
                        <a class="text-center ms-3 h6" href="{{url('/companyRegister')}}">Sign Up </a>
                        <span class="ms-1">|</span>
                        <a class="text-center ms-3 h6" href="{{url('/SentOtp')}}">Forget Password?</a>
                    </span>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </main>
  <!--   Core JS Files   -->
  










 <script>

async function submitLogin() {
            let email=document.getElementById('email').value;
            let password=document.getElementById('password').value;

            if(email.length===0){
                errorToast("Email is required");
            }
            else if(password.length===0){
                errorToast("Password is required");
            }
            else{
                
              try {
            let res = await axios.post("/login", { email: email, password: password });

            if (res.status === 200 && res.data['status'] === 'success') {
                setToken(res.data['token']);
                window.location.href = "/";
                successToast(res.data['message']);
            } else {
                // Handle other types of responses (e.g., unauthorized)
                errorToast(res.data['message']);
            }
        } catch (error) {
            // Handle network errors or other exceptions
            console.error("Error occurred during login:", error);
            errorToast("An error occurred during login");
        }
            }
    }
</script> 