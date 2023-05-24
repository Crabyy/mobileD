<div class="modal fade" id="userModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add new account</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addform" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <!-- photo -->
                    <div class="form-group">
                        <label>Photo:</label>
                        <div class="input-group">
                            <label class="custom-file-label" for="photo">Choose file</label>
                            <input type="file" class="custom-file-input" name="photo" id="photo">
                        </div>
                    </div>
                    <!-- name -->
                    <div class="form-group">
                        <label>Name:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-magnifying-glass"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter name" autocomplete="off" id="name" name="name" required="required">
                        </div>
                    </div>
                    <!-- email -->
                    <div class="form-group">
                        <label>Email:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" placeholder="Enter email" autocomplete="off" id="email" name="email" required="required">
                        </div>
                    </div>
                    <!-- address -->
                    <div class="form-group">
                        <label>Address:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-address-book"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter address" autocomplete="off" id="address" name="address" required="required">
                        </div>
                    </div>
                    <!-- phone # -->
                    <div class="form-group">
                        <label>Phone Number:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-dark text-light"><i class="fa-solid fa-phone"></i></span>
                            </div>
                            <input type="number" class="form-control" placeholder="Enter phone number" autocomplete="off" id="phonenumber" name="phonenumber" required="required" maxlength="12" minlength="11">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>