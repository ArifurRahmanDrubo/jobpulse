
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Company Contact</h4>
        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Add Contact</button>
<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Company Contact</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email">
                                <label for="mobile">Mobile</label>
                                <input type="text" name="mobile" class="form-control" id="mobile" >
                                <label for="designation">Designation</label>
                                <input type="text" name="designation" class="form-control" id="designation" >
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>
    </div>
</div>

<script>

    async function Save() {

        try {
            
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let mobile = document.getElementById('mobile').value;
            let designation = document.getElementById('designation').value;
            
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/company/contact/create",{name:name,email:email,phone:mobile,designation:designation},HeaderToken())
            hideLoader();
             console.log(res.data);
            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                window.location.href ="/contactpage";
                
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }

    }

</script>