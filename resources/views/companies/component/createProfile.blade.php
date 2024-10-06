
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Company Profile</h4>
        <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Add Profile</button>
<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Company Profile</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="year_of_establishment">Year of Establishment</label>
                                <input type="date" name="year_of_establishment" class="form-control" id="year_of_establishment" required>
                                <label for="type">Type</label>
                                <input type="text" name="type" class="form-control" id="type">
                                <label for="website">Website</label>
                                <input type="text" name="website" class="form-control" id="website" placeholder="example.com">
                                <label for="website">License</label>
                                <input type="text" name="licens" class="form-control" id="licens" placeholder="license">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" rows="4"></textarea>
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
            let yearof = document.getElementById('year_of_establishment').value;
            let type = document.getElementById('type').value;
            let website = document.getElementById('website').value;
            let description = document.getElementById('description').value;
            let license = document.getElementById('licens').value;
            console.log("res.data");
            document.getElementById('modal-close').click();
            showLoader();
            let res = await axios.post("/company/profile/create",{year_of_establishment:yearof,type:type,website:website,description:description,license:license},HeaderToken())
            hideLoader();
             console.log(res.data);
            if(res.data['status']==="success"){
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                window.location.href ="/profilepage";
            }
            else{
                errorToast(res.data['message'])
            }

        }catch (e) {
            unauthorized(e.response.status)
        }

    }

</script>