<div class="card">
    <div class="card-body">
        <h4 class="card-title">Education</h4>
        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 btn-primary">Add Education</button>
        <div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md modal-end modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Education Info</h5>
                    </div>
                    <div class="modal-body">
                        <form id="save-form">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bechelor" class="form-label">Bechelor's</label>
                                        <select name="bechelors" id="bechelors" class="form-select" required>
                                            <option value="" disabled selected>Select Bechelor's</option>
                                            <option value="Honours">Honours</option>
                                            <option value="Masters">Masters</option>
                                            <option value="Doctorate">Doctorate</option>
                                            <option value="Degree Pass">Degree Pass</option>
                                        </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="department" class="form-label">Department</label>
                                        <input type="text" name="department" id="department" class="form-control" placeholder="Department" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="cgpa" class="form-label">CGPA</label>
                                        <input type="text" name="cgpa" id="cgpa" class="form-control" placeholder="CGPA" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hsc_college_name" class="form-label">College Name</label>
                                        <input type="text" name="hsc_college_name" id="hsc_college_name" class="form-control" placeholder="College Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hsc_gpa" class="form-label">HSC GPA</label>
                                        <input type="text" name="hsc_gpa" id="hsc_gpa" class="form-control" placeholder="HSC GPA" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssc" class="form-label">SSC</label>
                                        <select name="ssc" id="ssc" class="form-select" required>
                                            <option value="" disabled selected>Select SSC</option>
                                            <option value="Science">Science</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Madrasha">Madrasha</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssc_passing_year" class="form-label">SSC Passing Year</label>
                                        <input type="text" name="ssc_passing_year" id="ssc_passing_year" class="form-control" placeholder="SSC Passing Year" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssc_group" class="form-label">SSC Group</label>
                                        <input type="text" name="ssc_group" id="ssc_group" class="form-control" placeholder="SSC Group" required>
                                    </div>
                                </div>
                                
                               
                               
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="university_name" class="form-label">University</label>
                                        <input type="text" name="university_name" id="university_name" class="form-control" placeholder="University" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hons_passing_year" class="form-label">Hons Passing Year</label>
                                        <input type="text" name="hons_passing_year" id="hons_passing_year" class="form-control" placeholder="Hons Passing Year" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="hsc" class="form-label">HSC</label>
                                        <select name="hsc" id="hsc" class="form-select" required>
                                            <option value="" disabled selected>Select HSC</option>
                                            <option value="Commerce">Commerce</option>
                                            <option value="Science">Science</option>
                                            <option value="Arts">Arts</option>
                                            <option value="Madrasha">Madrasha</option>
                                        </select>
                                    </div>
                                     
                                    <div class="mb-3">
                                        <label for="hsc_passing_year" class="form-label">HSC Passing Year</label>
                                        <input type="text" name="hsc_passing_year" id="hsc_passing_year" class="form-control" placeholder="HSC Passing Year" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="hsc_group" class="form-label">HSC Group</label>
                                        <input type="text" name="hsc_group" id="hsc_group" class="form-control" placeholder="HSC Group" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssc_school_name" class="form-label">SSC School Name</label>
                                        <input type="text" name="ssc_school_name" id="ssc_school_name" class="form-control" placeholder="SSC School Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ssc_gpa" class="form-label">SSC GPA</label>
                                        <input type="text" name="ssc_gpa" id="ssc_gpa" class="form-control" placeholder="SSC GPA" required>
                                    </div>
               
                                   
                                    
                                   
                                </div>
                            </div>
                        </form>  
                    </div>
                    <div class="modal-footer">
                        <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                        <button onclick="saveEducation()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    async function saveEducation() {

        try {
            let bechelors = document.getElementById('bechelors').value;
            let university_name = document.getElementById('university_name').value;
            let department = document.getElementById('department').value;
            let ssc = document.getElementById('ssc').value;
            let cgpa = document.getElementById('cgpa').value;
            let hsc = document.getElementById('hsc').value;
            let hons_passing_year = document.getElementById('hons_passing_year').value;
            let hsc_college_name = document.getElementById('hsc_college_name').value;
            let hsc_gpa = document.getElementById('hsc_gpa').value;
            let hsc_passing_year = document.getElementById('hsc_passing_year').value;
            let hsc_group = document.getElementById('hsc_group').value;
            let ssc_school_name = document.getElementById('ssc_school_name').value;
            let ssc_passing_year = document.getElementById('ssc_passing_year').value;
            let ssc_group = document.getElementById('ssc_group').value;
            let ssc_gpa = document.getElementById('ssc_gpa').value;
           
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/candidate/educationStore", {
                bechelors: bechelors,
                university_name: university_name,
                department: department,
                ssc: ssc,
                cgpa: cgpa,
                hsc: hsc,
                hons_passing_year: hons_passing_year,
                hsc_college_name: hsc_college_name,
                hsc_gpa: hsc_gpa,
                hsc_passing_year: hsc_passing_year,
                hsc_group: hsc_group,
                ssc_school_name: ssc_school_name,
                ssc_passing_year: ssc_passing_year,
                ssc_group: ssc_group,
                ssc_gpa: ssc_gpa
            },HeaderToken());
            hideLoader();
            console.log(res);
            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                window.location.href ="/educationCreatePage";
            } else {
                errorToast(res.data['message'])
            }

        } catch (e) {
            unauthorized(e.response.status)
        }

    }

</script>

