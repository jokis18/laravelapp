<form class="form-signin" action="{{ route('customer.create') }}" method="POST">
  @csrf
  <div class="text-center mb-4">
    <h1 class="h3 mb-3 font-weight-normal">Create Customer</h1>
  </div>

  <div class="form-label-group">
    <input type="text" name="inputFirstName" id="inputFirstName" class="form-control" placeholder="First Name" required autofocus>
    <label for="inputFirstName">First Name</label>
  </div>

  <div class="form-label-group">
    <input type="text" name="inputLastName" id="inputLastName" class="form-control" placeholder="Last Name" required autofocus>
    <label for="inputLastName">Last Name</label>
  </div>

  <div class="form-label-group">
    <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputEmail">Email</label>
  </div>

  <div class="form-label-group">
    <input type="phone" name="inputPhone" id="inputPhone" class="form-control" placeholder="Phone" required autofocus>
    <label for="inputPhone">Phone</label>
  </div>

  <div class="form-label-group">
    <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
    <label for="inputPassword">Password</label>
  </div>

  <div class="form-label-group">
      <input type="password" name="inputPasswordConfirm" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
      <label for="inputPassword">Password Confirmation</label>
    </div>

  <div class="form-label-group">
    <input type="text" name="inputTags" id="inputTags" class="form-control" placeholder="Tags" required autofocus>
    <label for="inputTags">Tags</label>
  </div>
  <button class="btn btn-block yellow-text" type="submit">Register</button>
</form>
