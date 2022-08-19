<div class="panel-body">
    <form id="form-add-user" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="acc-name">Account Name</label>
                            <input type="text" class="form-control" id="accname" name="accname" placeholder="Enter account name" style="text-transform: capitalize;" oninput="this.value = this.value.replace(/[^A-Za-z. ]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="acc-name">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" style="text-transform: lowercase;" oninput="this.value = this.value.replace(/[^a-z.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="acc-name">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Enter NIP" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 20px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="acc-name">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="acc-name">Phone Number</label>
                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter phone number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-primary" style="margin-top: 20px;">Submit</button>
    </form>
</div>