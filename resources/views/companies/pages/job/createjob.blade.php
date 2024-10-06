<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Job info</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="job_title">Job Title</label>
                                <input type="text" name="job_title" class="form-control" id="job_title" placeholder="title" required>
                                <label for="job_description">Job Description</label>
                                <input type="text" name="job_description" class="form-control" id="job_description" placeholder="job_description" required>
                                <label for="experience">Exprience</label>
                                <input type="text" name="experience" class="form-control" id="experience" placeholder="experience" required>
                                <label for="requirements">Requirements</label>
                                <input type="text" name="requirements" class="form-control" id="requirements" placeholder="requirements" required>
                                <label for="responsibilities">Responsibilities</label>
                                <input type="text" name="responsibilities" class="form-control" id="responsibilities" placeholder="responsibilities" required>
                                <label for="benefits">Benefits</label>
                                <input type="text" name="benefits" class="form-control" id="benefits" placeholder="benefits" required>
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control" id="location" placeholder="location" required>
                                <label for="age">Age</label>
                                <input type="text" name="age" class="form-control" id="age" placeholder="age">
                                <label for="vacancy">Vacancy</label>
                                <input type="text" name="vacancy" class="form-control" id="vacancy" placeholder="vacancy" required>
                                <label for="tag">Tag</label>
                                <input type="text" name="tag" class="form-control" id="tag" placeholder="tag" required>
                                <label for="salary">Salary</label>
                                <input type="text" name="salary" class="form-control" id="salary" placeholder="salary" required>
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control" id="type" placeholder="type">
                                <label for="employment_Status">Employment_Status</label>
                                <input type="text" name="employment_Status" class="form-control" id="employment_Status" placeholder="employment_Status" required>
                                
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="createjob()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>
 

<script>

    async function createjob() {

        try {
            let job_title = document.getElementById('job_title').value;
            let job_description = document.getElementById('job_description').value;
            let experience = document.getElementById('experience').value;
            let requirements = document.getElementById('requirements').value;
            let responsibilities = document.getElementById('responsibilities').value;
            let benefits = document.getElementById('benefits').value;
            let location = document.getElementById('location').value;
            let age = document.getElementById('age').value;
            let vacancy = document.getElementById('vacancy').value;
            let tag = document.getElementById('tag').value;
            let salary = document.getElementById('salary').value;
            let type = document.getElementById('type').value;
            let employment_Status = document.getElementById('employment_Status').value;
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/job/store",{title:job_title,description:job_description,exprience:experience ,requirements:requirements,responsibilities:responsibilities,benefits:benefits,location:location,age:age, salary:salary,   vacancy:vacancy,tag:tag,type:type,employment_status :employment_Status },HeaderToken())
            hideLoader();
            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();

                window.location.href ="/jobs";
                
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }

    }

</script>