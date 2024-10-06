<div class="modal animated zoomIn" id="updatejob-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Contact</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="editjob_title">Job Title</label>
                                <input type="text" name="editjob_title" class="form-control" id="editjob_title" >
                                <label for="editjob_description">Job Description</label>
                                <input type="text" name="editjob_description" class="form-control" id="editjob_description" >
                                <label for="editexperience">Exprience</label>
                                <input type="text" name="editexperience" class="form-control" id="editexperience" >
                                <label for="editrequirements">Requirements</label>
                                <input type="text" name="editrequirements" class="form-control" id="editrequirements" >
                                <label for="editresponsibilities">Responsibilities</label>
                                <input type="text" name="editresponsibilities" class="form-control" id="editresponsibilities" >
                                <label for="editbenefits">Benefits</label>
                                <input type="text" name="editbenefits" class="form-control" id="editbenefits" >
                                <label for="editlocation">Location</label>
                                <input type="text" name="editlocation" class="form-control" id="editlocation" >
                                <label for="editage">Age</label>
                                <input type="text" name="editage" class="form-control" id="editage" >
                                <label for="editvacancy">Vacancy</label>
                                <input type="text" name="editvacancy" class="form-control" id="editvacancy" >
                                <label for="edittag">Tag</label>
                                <input type="text" name="edittag" class="form-control" id="edittag" >
                                <label for="editsalary">Salary</label>
                                <input type="text" name="editsalary" class="form-control" id="editsalary" >
                                <label for="edittype">Type</label>
                                <input type="text" name="edittype" class="form-control" id="edittype" >
                                <label for="editemployment_Status">Employment_Status</label>
                                <input type="text" name="editemployment_Status" class="form-control" id="editemployment_Status" >
                                <input type="text" class="d-none" id="updateJobID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="UpdateJob()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>



<script>



   async function editbtn(button) {
   try {
    console.log("Button clicked");
    let id = button.getAttribute('data-id');
    console.log("Data id:", id);
    await fillUpUpdateForm(id);
    $("#updatejob-modal").modal('show');
   } catch (error) {
    console.error(error);
   }
}

    async function fillUpUpdateForm(id) {
        try {
            showLoader();
            let res = await axios.post("/job-by-id", { id: id }, HeaderToken());
            hideLoader();
            console.log(res.data.rows);
            if (res.data.status === "success") {
                
                let job = res.data.rows;
                document.getElementById('editjob_title').value = job.title;
                document.getElementById('editjob_description').value = job.description;
                document.getElementById('editexperience').value = job.exprience;
                document.getElementById('editrequirements').value = job.requirements;
                document.getElementById('editresponsibilities').value = job.responsibilities;
                document.getElementById('editbenefits').value = job.benefits;
                document.getElementById('editlocation').value = job.location;
                document.getElementById('editage').value = job.age;
                document.getElementById('editvacancy').value = job.vacancy;
                document.getElementById('edittag').value = job.tag;
                document.getElementById('editsalary').value = job.salary;
                document.getElementById('edittype').value = job.type;
                document.getElementById('editemployment_Status').value = job.employment_status;     
                document.getElementById('updateJobID').value=id;
            } else {
                // Handle error response
                console.error(res.data.message);
            }
        } catch (e) {
            // Handle error
            console.error(e);
        }
    }
    async function UpdateJob() {


        console.log("hello i am updatejob");
try {
           let editjob_title = document.getElementById('editjob_title').value;
            let editjob_description = document.getElementById('editjob_description').value;
            let editexperience = document.getElementById('editexperience').value;
            let editrequirements = document.getElementById('editrequirements').value;
            let editresponsibilities = document.getElementById('editresponsibilities').value;
            let editbenefits = document.getElementById('editbenefits').value;
            let editlocation = document.getElementById('editlocation').value;
            let editage = document.getElementById('editage').value;
            let editvacancy = document.getElementById('editvacancy').value;
            let edittag = document.getElementById('edittag').value;
            let editsalary = document.getElementById('editsalary').value;
            let edittype = document.getElementById('edittype').value;
            let editemployment_Status = document.getElementById('editemployment_Status').value;
            let updatejobId = document.getElementById('updateJobID').value;


            document.getElementById('update-modal-close').click();
    showLoader();
    
    let res = await axios.post("/job-update",{title:editjob_title,description:editjob_description,exprience:editexperience ,requirements:editrequirements,responsibilities:editresponsibilities,benefits:editbenefits,location:editlocation,age:editage, salary:editsalary,   vacancy:editvacancy,tag:edittag,type:edittype,employment_status :editemployment_Status,id:updatejobId },HeaderToken())
    hideLoader();
   
    if(res.data['status']==="success"){
        document.getElementById("update-form").reset();
        successToast(res.data['message'])
        window.location.href = '/jobs';
       
    }
    else{
        errorToast(res.data['message'])
    }

}catch (e) {
    unauthorized(e.response.status)
}


}

    // Rest of your JavaScript code...
</script>
