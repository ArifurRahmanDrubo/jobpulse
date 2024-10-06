

<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="edit_type">Type</label>
                                <input type="text" name="type" class="form-control" id="edit_type">

                                <label for="edit_website">Website</label>
                                <input type="text" name="website" class="form-control" id="edit_website">

                                <label for="edit_license">License</label>
                                <input type="text" name="license" class="form-control" id="edit_license">
                                <label for="edit_year">Established Date</label>
                               <input type="date" name="year_of_establishment" class="form-control" id="edit_year">
                               <label for="edit_year">Description</label>
                               <input type="text" name="description" class="form-control" id="edit_description">
                                <input type="text" class="d-none" id="updateID"  value="{{ $company->id }}">
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>



<script>
    async function editbtn(btn) {
        try {
            console.log("Hello, I am editbtn");
            let id = document.getElementById('updateID').value // Fetch ID from button clicked
            await fillUpUpdateForm(id);
            $("#update-modal").modal('show');
        } catch (error) {
            console.error(error);
        }
    }

    async function fillUpUpdateForm(id) {
        try {
            showLoader();
            let res = await axios.post("/company-by-id", { id: id }, HeaderToken());
            hideLoader();

            if (res.data.status === "success") {
                let company = res.data.rows;
                document.getElementById('edit_type').value = company.type;
                document.getElementById('edit_website').value = company.website;
                document.getElementById('edit_license').value = company.license;
                document.getElementById('edit_year').value = company.year_of_establishment;
                document.getElementById('edit_description').value = company.description;
                document.getElementById('updateID').value = company.id;
            } else {
                // Handle error response
                console.error(res.data.message);
            }
        } catch (e) {
            // Handle error
            console.error(e);
        }
    }



    
    async function Update() {


        console.log("hello i am update");
try {
    let yearof = document.getElementById('edit_year').value;
            let type = document.getElementById('edit_type').value;
            let website = document.getElementById('edit_website').value;
            let description = document.getElementById('edit_description').value;
            let license = document.getElementById('edit_license').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();
    showLoader();
    
    let res = await axios.post("/company-update",{year_of_establishment:yearof,type:type,website:website,description:description,license:license,id:updateID},HeaderToken())
    hideLoader();
   
    if(res.data['status']==="success"){
        document.getElementById("update-form").reset();
        successToast(res.data['message'])
        window.location.href = '/profilepage';
       
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











{{-- <script>

$('.editBtn').on('click', async function () {
            let id= $(this).data('id');
            await FillUpUpdateForm(id)
            $("#update-modal").modal('show');
        })



    async function FillUpUpdateForm(id){
        try {
            document.getElementById('updateID').value=id;
            showLoader();
            let res=await axios.post("/customer-by-id",{id:id},HeaderToken())
            hideLoader();
            console.log(res.data);
            document.getElementById('edit_type').value=res.data['rows']['type'];
            document.getElementById('edit_website').value=res.data['rows']['website'];
            document.getElementById('edit_license').value=res.data['rows']['license'];
            document.getElementById('edit_year').value=res.data['rows']['year_of_establishment'];
        }catch (e) {
            unauthorized(e.response.status)
        }
    }



    async function Update() {

        try {
            let customerName = document.getElementById('customerNameUpdate').value;
            let customerEmail = document.getElementById('customerEmailUpdate').value;
            let customerMobile = document.getElementById('customerMobileUpdate').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();
            showLoader();
            let res = await axios.post("/update-customer",{name:customerName,email:customerEmail,mobile:customerMobile,id:updateID},HeaderToken())
            hideLoader();

            if(res.data['status']==="success"){
                document.getElementById("update-form").reset();
                successToast(res.data['message'])
                await getList();
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }


    }

</script> --}}



