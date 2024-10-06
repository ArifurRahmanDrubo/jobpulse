
  <div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <span class="login100-form-title font-waight-bold p-b-26">
                    Welcome
                </span>
                <span class="login100-form-title p-b-48">
                    <i class="fa fa-font"></i>
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                    <input class="input100" type="text" name="email" id="email"  placeholder="Email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <span class="btn-show-pass" onclick="togglePassword()">
                        <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="pass" id="password"  placeholder="Password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class=""></div>
                        <div class="text-center">
                            <button type="button" onclick="submitlogin()" class="btn  w-90 my-4 mb-2">Log In</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
    function togglePassword() {
        var passwordField = document.getElementById("password");
        var eyeIcon = document.querySelector(".btn-show-pass i");

        if (passwordField.type === "password") {
            passwordField.type = "text";
            eyeIcon.classList.remove("fa-eye");
            eyeIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            eyeIcon.classList.remove("fa-eye-slash");
            eyeIcon.classList.add("fa-eye");
        }
    }

    async function submitlogin() {
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
                successToast(res.data['message']);
                window.location.href = "/";
               
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