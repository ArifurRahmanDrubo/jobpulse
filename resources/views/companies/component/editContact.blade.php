
<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <label for="edit_name">name</label>
                                <input type="text" name="edit_name"pe class="form-control" id="edit_name">

                                <label for="edit_email">Email</label>
                                <input type="text" name="edit_emaile" class="form-control" id="edit_email">
                                <label for="edit_mobile">Mobile</label>
                                <input type="text" name="edit_mobile" class="form-control" id="edit_mobile">
                                <label for="edit_designation">Designation</label>
                               <input type="text" name="edit_designation" class="form-control" id="edit_designation">
                                <input type="text" class="d-none" id="updateContactID"  value="{{ $companies->id }}">
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="UpdateContact()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>



<script>
    async function editbtn(btn) {
        try {
            console.log("Hello, I am editbtn");
            let id = document.getElementById('updateContactID').value // Fetch ID from button clicked
            await fillUpUpdateForm(id);
            $("#update-modal").modal('show');
        } catch (error) {
            console.error(error);
        }
    }

    async function fillUpUpdateForm(id) {
        try {
            showLoader();
            let res = await axios.post("/companyContact-by-id", { id: id }, HeaderToken());
            hideLoader();

            if (res.data.status === "success") {
                let companies = res.data.rows;
                document.getElementById('edit_name').value = companies.name;
                document.getElementById('edit_email').value = companies.email;
                document.getElementById('edit_mobile').value = companies.phone;
                document.getElementById('edit_designation').value = companies.designation;
                document.getElementById('updateContactID').value = companies.id;
            } else {
                // Handle error response
                console.error(res.data.message);
            }
        } catch (e) {
            // Handle error
            console.error(e);
        }
    }
    async function UpdateContact() {


        console.log("hello i am updatecontact");
try {
    let name = document.getElementById('edit_name').value;
            let email = document.getElementById('edit_email').value;
            let mobile = document.getElementById('edit_mobile').value;
            let designation = document.getElementById('edit_designation').value;
            let updateContactID = document.getElementById('updateContactID').value;

            document.getElementById('update-modal-close').click();
    showLoader();
    
    let res = await axios.post("/companyContact-update",{name:name,email:email,phone:mobile,designation:designation,id:updateContactID},HeaderToken())
    hideLoader();
   
    if(res.data['status']==="success"){
        document.getElementById("update-form").reset();
        successToast(res.data['message'])
        window.location.href = '/contactpage';
       
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



