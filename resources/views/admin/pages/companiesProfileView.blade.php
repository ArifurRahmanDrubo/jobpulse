
<div class="modal animated zoomIn" id="CompaniView-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Info</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="cname">Company Name</label>
                                <input type="text" name="cname" class="form-control" id="cname">
                                <label for="ctype">Type</label>
                                <input type="text" name="type" class="form-control" id="ctype">
                                <label for="cwebsite">Website</label>
                                <input type="text" name="cwebsite" class="form-control" id="cwebsite">
                                <label for="cyear">Established Date</label>
                               <input type="text" name="cestablishment" class="form-control" id="cyear">
                               <label for="cdescription">Description</label>
                               <input type="text" name="cdescription" class="form-control" id="cdescription">
                            
                               
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
      
            </div>
        </div>
    </div>
</div>



<script>
    async function companyView(id) {
        try {
            console.log("Hello, I am from View");
            let id = document.getElementById('company_id').value // Fetch ID from button clicked
            await fillUpViewForm(id);
            $("#CompaniView-modal").modal('show');
        } catch (error) {
            console.error(error);
        }
    }

    async function fillUpViewForm(id) {
        try {
            showLoader();
            let res = await axios.post("/companyView-by-id", { id: id }, HeaderToken());
            hideLoader();

            if (res.data.status === "success") {
                const companyName = res.data.companyView;
                let company = res.data.companyView.company[0];
              
              console.log(company);
              console.log(companyName);

                document.getElementById('cname').value = companyName.name;
                document.getElementById('ctype').value = company.type;
                document.getElementById('cwebsite').value = company.website;
                document.getElementById('cyear').value = company.year_of_establishment;
                document.getElementById('cdescription').value = company.description;
               
            } else {
                // Handle error response
                console.error(res.data.message);
            }
        } catch (e) {
            // Handle error
            console.error(e);
        }
    }


    // Rest of your JavaScript code...
</script>