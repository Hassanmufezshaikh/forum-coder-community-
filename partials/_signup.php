

<!-- Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="signupmodalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupmodalLabel">signup for Upmyranks </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/forum/partials/_handlesignup.php" method="post">
            <div class="modal-body">
               
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp"
                            placeholder="Enter email">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                            else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">ConfirmPassword</label>
                        <input type="password" class="form-control" id="signupcpassword" name="signupcpassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success">Submit</button>
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
                
            </div>
            </form>

    </div>
  </div>
</div>