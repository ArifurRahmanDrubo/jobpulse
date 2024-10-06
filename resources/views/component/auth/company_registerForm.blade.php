<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/illustration-signup.jpg'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Sign Up</h4>
                  <p class="mb-0">Enter your email and password to register</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Name</label>
                      <input type="text" id="name" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Email</label>
                      <input type="email" id="email" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-3">
                      <label class="form-label">Password</label>
                      <input type="password" id="password" class="form-control">
                    </div>
                    
                    <div class="form-check form-check-info text-start ps-0">
                      <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                      </label>
                    </div>
                    <div class="text-center">
                      <button type="button" onclick="submitRegister()" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Sign Up</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Already have an account?
                    <a href="{{url('/companyLogin')}}" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



  <script>
async function submitRegister() {
            let name=document.getElementById('name').value;
            let email=document.getElementById('email').value;
            let password=document.getElementById('password').value;

            if(name.length===0){
                errorToast("Name is required");
            }
            if(email.length===0){
                errorToast("Email is required");
            }
             if(password.length===0){
                errorToast("Password is required");
            }
          
            else{
                
                let res=await axios.post("/company-register",{ name:name,  email:email, password:password});
               
                if(res.status===200 && res.data['status']==='success'){
                  alert(" Register success");
                    window.location.href="/companyLogin";
                    
                }
                else{
                    errorToast(res.data['message']);
                }
            }
    }




  </script>