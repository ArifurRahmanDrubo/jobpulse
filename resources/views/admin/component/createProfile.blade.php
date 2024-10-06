<div class="modal animated zoomIn" id="createProfile-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Profile</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name">

                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone">
                                <label for="Address">Address</label>
                                <input type="text" name="Address" class="form-control" id="Address">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" name="linkedin" class="form-control" id="linkedin">
                                <label for="twitter">Twitter</label>
                                <input type="text" name="twitter" class="form-control" id="twitter">
                                <label for="facebook">Facebook</label>
                                <input type="text" name="facebook" class="form-control" id="facebook">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal"
                    aria-label="Close">Close</button>
                <button onclick="UpdateProfile()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>



<script>
    async function updatebyID(id) {
        try {
            console.log("Hello, I am editbttttttn");
            let id = document.getElementById('updateProfileid').value
            console.log('id', id); // Fetch ID from button clicked
            await fillUpUpdateForm(id);
            $("#createProfile-modal").modal('show');
        } catch (error) {
            console.error(error);
        }
    }


    async function fillUpUpdateForm(id) {
        try {
            console.log(id);
            showLoader();
            let res = await axios.post("/admin/ProfileById", {
                id: id
            }, HeaderToken());
            hideLoader();
            console.log(res.data)
            if (res.data.status === "success") {
                let profile = res.data.rows;
                document.getElementById('name').value = profile.name;
                document.getElementById('Address').value = profile.Address;
                document.getElementById('description').value = profile.description;
                document.getElementById('linkedin').value = profile.linkedin;
                document.getElementById('twitter').value = profile.twitter;
                document.getElementById('facebook').value = profile.facebook;
                document.getElementById('phone').value = profile.phone;

            } else {
                // Handle error response
                console.error(res.data.message);
            }
        } catch (e) {
            // Handle error
            console.error(e);
        }
    }


    async function UpdateProfile() {

        try {
            let name = document.getElementById('name').value;
            let Address = document.getElementById('Address').value;
            let description = document.getElementById('description').value;
            let linkedin = document.getElementById('linkedin').value;
            let twitter = document.getElementById('twitter').value;
            let facebook = document.getElementById('facebook').value;
            let phone = document.getElementById('phone').value;

            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post("/admin-update", {
                name: name,
                address: Address,
                description: description,
                linkedin: linkedin,
                twitter: twitter,
                facebook: facebook,
                phone: phone
            }, HeaderToken());
            hideLoader();
            console.log(res);
            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("update-form").reset();
                window.location.href = "/admin/profile/page";
            } else {
                errorToast(res.data['message'])
            }

        } catch (e) {
            unauthorized(e.response.status)
        }


    }

    // Rest of your JavaScript code...
</script>
