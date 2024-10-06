<div class="modal animated zoomIn" id="updateEducation-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <select name="bechelors" id="edit_bechelors" class="form-select" required>
                                    <option value="" disabled selected>Select Bechelor's</option>
                                    <option value="Honours">Honours</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Doctorate">Doctorate</option>
                                    <option value="Degree Pass">Degree Pass</option>
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="department" class="form-label">Department</label>
                                <input type="text" name="department" id="edit_department" class="form-control" placeholder="Department" required>
                            </div>
                            <div class="mb-3">
                                <label for="cgpa" class="form-label">CGPA</label>
                                <input type="text" name="cgpa" id="edit_cgpa" class="form-control" placeholder="CGPA" required>
                            </div>
                            <div class="mb-3">
                                <label for="hsc_college_name" class="form-label">College Name</label>
                                <input type="text" name="hsc_college_name" id="edit_hsc_college_name" class="form-control" placeholder="College Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="hsc_gpa" class="form-label">HSC GPA</label>
                                <input type="text" name="hsc_gpa" id="edit_hsc_gpa" class="form-control" placeholder="HSC GPA" required>
                            </div>
                            <div class="mb-3">
                                <label for="ssc" class="form-label">SSC</label>
                                <select name="ssc" id="edit_ssc" class="form-select" required>
                                    <option value="" disabled selected>Select SSC</option>
                                    <option value="Science">Science</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Madrasha">Madrasha</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="ssc_passing_year" class="form-label">SSC Passing Year</label>
                                <input type="text" name="ssc_passing_year" id="edit_ssc_passing_year" class="form-control" placeholder="SSC Passing Year" required>
                            </div>
                            <div class="mb-3">
                                <label for="ssc_group" class="form-label">SSC Group</label>
                                <input type="text" name="ssc_group" id="edit_ssc_group" class="form-control" placeholder="SSC Group" required>
                            </div>
                        </div>
                        
                           
                       
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="university_name" class="form-label">University</label>
                                <input type="text" name="university_name" id="edit_university_name" class="form-control" placeholder="University" required>
                            </div>
                            <div class="mb-3">
                                <label for="hons_passing_year" class="form-label">Hons Passing Year</label>
                                <input type="text" name="hons_passing_year" id="edit_hons_passing_year" class="form-control" placeholder="Hons Passing Year" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="hsc" class="form-label">HSC</label>
                                <select name="hsc" id="edit_hsc" class="form-select" required>
                                    <option value="" disabled selected>Select HSC</option>
                                    <option value="Commerce">Commerce</option>
                                    <option value="Science">Science</option>
                                    <option value="Arts">Arts</option>
                                    <option value="Madrasha">Madrasha</option>
                                </select>
                            </div>
                             
                            <div class="mb-3">
                                <label for="hsc_passing_year" class="form-label">HSC Passing Year</label>
                                <input type="text" name="hsc_passing_year" id="edit_hsc_passing_year" class="form-control" placeholder="HSC Passing Year" required>
                            </div>
                            <div class="mb-3">
                                <label for="hsc_group" class="form-label">HSC Group</label>
                                <input type="text" name="hsc_group" id="edit_hsc_group" class="form-control" placeholder="HSC Group" required>
                            </div>
                            <div class="mb-3">
                                <label for="ssc_school_name" class="form-label">SSC School Name</label>
                                <input type="text" name="ssc_school_name" id="edit_ssc_school_name" class="form-control" placeholder="SSC School Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="ssc_gpa" class="form-label">SSC GPA</label>
                                <input type="text" name="ssc_gpa" id="edit_ssc_gpa" class="form-control" placeholder="SSC GPA" required>
                            </div>
       
                           
                            
                           
                        </div>
                    </div>
                    <input type="hidden" name="id" id="updateEducationid" value="{{ $education->id }}">
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

async function Educationupdate(id) {
        try {
            console.log("Hello, I am editbtn");
            let id = document.getElementById('updateEducationid').value
            console.log(id);// Fetch ID from button clicked
            await fillUpUpdateForm(id);
            $("#updateEducation-modal").modal('show');
        } catch (error) {
            console.error(error);
        }
    }
    // async function fillUpUpdateForm(id) {
    //     try {
    //         showLoader();
    //         let res = await axios.post("/candidates/educationById", { id: id },HeaderToken());
    //         hideLoader();
    //         console.log(res.data);
    //         if (res.data.status === "success") {
    //             let education = res.data.education;
    //             // Fill up the form fields with the fetched education details
    //             document.getElementById('edit_university_name').value = education.university_name;
    //             document.getElementById('edit_ssc').value = education.ssc;
    //             // Populate other fields similarly
    //         } else {
    //             console.error(res.data.message);
    //         }
    //     } catch (e) {
    //         console.error(e);
    //     }
    // }
    
    async function fillUpUpdateForm(id) {
        try {
            console.log(id);
            showLoader();
            let res = await axios.post( "/candidates/educationById", {id:id }, HeaderToken());
            hideLoader();
            console.log(res.data)
            if (res.data.status === "success") {
                let education = res.data.education;
                        document.getElementById('edit_university_name').value=education.university_name;
                        document.getElementById('edit_ssc').value=education.ssc;
                       document.getElementById('edit_cgpa').value=education.cgpa;
                      document.getElementById('edit_hsc').value=education.hsc;
                      document.getElementById('edit_hons_passing_year').value=education.hons_passing_year;
                      document.getElementById('edit_hsc_college_name').value=education.hsc_college_name;
                      document.getElementById('edit_hsc_gpa').value=education.hsc_gpa;
                      document.getElementById('edit_bechelors').value=education.bechelors;
                      document.getElementById('edit_department').value=education.department;
                      document.getElementById('edit_hsc_passing_year').value=education.hsc_passing_year;
                        document.getElementById('edit_hsc_group').value=education.hsc_group;
                        document.getElementById('edit_ssc_school_name').value=education.ssc_school_name;
                        document.getElementById('edit_ssc_passing_year').value=education.ssc_passing_year;
                        document.getElementById('edit_ssc_group').value=education.ssc_group;
                        document.getElementById('edit_ssc_gpa').value=education.ssc_gpa;
            } else {
                // Handle error response
                console.error(res.data.message);
            }
        } catch (e) {
            // Handle error
            console.error(e);
        }
    }





async function saveEducation() {

try {
    let id = document.getElementById('updateEducationid').value
    let bechelors = document.getElementById('edit_bechelors').value;
    let university_name = document.getElementById('edit_university_name').value;
    let department = document.getElementById('edit_department').value;
    let ssc = document.getElementById('edit_ssc').value;
    let cgpa = document.getElementById('edit_cgpa').value;
    let hsc = document.getElementById('edit_hsc').value;
    let hons_passing_year = document.getElementById('edit_hons_passing_year').value;
    let hsc_college_name = document.getElementById('edit_hsc_college_name').value;
    let hsc_gpa = document.getElementById('edit_hsc_gpa').value;
    let hsc_passing_year = document.getElementById('edit_hsc_passing_year').value;
    let hsc_group = document.getElementById('edit_hsc_group').value;
    let ssc_school_name = document.getElementById('edit_ssc_school_name').value;
    let ssc_passing_year = document.getElementById('edit_ssc_passing_year').value;
    let ssc_group = document.getElementById('edit_ssc_group').value;
    let ssc_gpa = document.getElementById('edit_ssc_gpa').value;
    document.getElementById('modal-close').click();
    showLoader();
    let res = await axios.post("/candidate/educationUpdate", {
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
        ssc_gpa: ssc_gpa,
        id:id

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
