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
                                <label for="profession">Profession</label>
                                <input type="text" name="profession" class="form-control" id="profession">

                                <label for="experience">Experience</label>
                                <input type="text" name="experience" class="form-control" id="experience">
                                <label for="hourly_rate">Hourly_rate</label>
                                <input type="text" name="hourly_rate" class="form-control" id="hourly_rate">
                                <label for="total_projects">Total_projects</label>
                                <input type="text" name="total_projects" class="form-control" id="total_projects">
                                <label for="english_level">English_level</label>
                                <input type="text" name="english_level" class="form-control" id="english_level">
                                <label for="availability">Availability</label>
                                <input type="text" name="availability" class="form-control" id="availability">
                                <label for="phone">Mobile</label>
                                <input type="text" name="phone" class="form-control" id="phone">
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
            console.log("Hello, I am editbtn");
            let id = document.getElementById('updateProfileid').value
            console.log(id); // Fetch ID from button clicked
            await fillUpUpdateForm(id);
            $("#createProfile-modal").modal('show');
        } catch (error) {
            console.error(error);
        }
    }


    async function fillUpUpdateForm(id) {
        try {

            showLoader();
            let res = await axios.post("/candidates/ProfileById", {
                id: id
            }, HeaderToken());
            hideLoader();

            if (res.data.status === "success") {
                let profile = res.data.rows;
                document.getElementById('profession').value = profile.profession;
                document.getElementById('experience').value = profile.experience;
                document.getElementById('hourly_rate').value = profile.hourly_rate;
                document.getElementById('total_projects').value = profile.total_projects;
                document.getElementById('english_level').value = profile.english_level;
                document.getElementById('availability').value = profile.availability;
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
            let profession = document.getElementById('profession').value;
            let experience = document.getElementById('experience').value;
            let hourly_rate = document.getElementById('hourly_rate').value;
            let total_projects = document.getElementById('total_projects').value;
            let english_level = document.getElementById('english_level').value;
            let availability = document.getElementById('availability').value;
            let phone = document.getElementById('phone').value;

            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post("/candidate-update", {
                profession: profession,
                experience: experience,
                hourly_rate: hourly_rate,
                total_projects: total_projects,
                english_level: english_level,
                availability: availability,
                phone: phone
            }, HeaderToken());
            hideLoader();
            console.log(res);
            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("update-form").reset();
                window.location.href = "/Candidate/profile/page";
            } else {
                errorToast(res.data['message'])
            }

        } catch (e) {
            unauthorized(e.response.status)
        }


    }

    // Rest of your JavaScript code...
</script>
