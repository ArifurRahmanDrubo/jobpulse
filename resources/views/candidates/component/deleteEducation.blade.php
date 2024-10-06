<div class="modal animated zoomIn" id="deleteEducation-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID"/>

            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn mx-2 bg-gradient-primary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="deletebtnconfirm()" type="button" id="confirmDelete" class="btn  bg-gradient-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

     async  function  deletebtnconfirm(){
        
         try {
            let id = document.getElementById('educationid').value;
           
             document.getElementById('delete-modal-close').click();
             showLoader();
             let res=await axios.post("/deleteeducation",{id:id},HeaderToken())
             hideLoader();

             if(res.data['status']==="success"){
                 successToast(res.data['message'])
                 window.location.href = "/educationCreatePage";
             }
             else{
                 errorToast(res.data['message'])
             }

         }catch (e) {
             unauthorized(e.response.status)
         }
     }
   
</script>