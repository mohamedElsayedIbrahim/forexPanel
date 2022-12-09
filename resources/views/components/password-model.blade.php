@auth
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Change your password</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" novalidate action="{{ route('users.change.password', Auth::user()->id) }}" method="post">
            
            @csrf

            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">New password</label>
                <input type="password" name="new_pass" value="{{old("new_pass")}}" minlength="6" required class="form-control" id="exampleFormControlInput1">
                <div class="invalid-feedback">
                    Please choose a password.
                </div>
            </div>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Re-type New password</label>
              <input type="password" name="re_new_pass" value="{{old("re_new_pass")}}" minlength="6" required class="form-control" id="exampleFormControlInput1">
              <div class="invalid-feedback">
                  Please choose a password.
              </div>
          </div>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endauth