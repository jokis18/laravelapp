<div class="container-fluid">
  <div class="row">
    @include('includes.sidebar') 

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Customer</h1>
      </div>
      @include('includes.messages')
      <form class="form-signin" action="{{ route('create') }}" method="POST">
          @csrf
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
            <label for="inputPhone">Phonenumber, ex. +12345678900</label>
          </div>
        
          <div class="form-label-group">
            <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
            <label for="inputPassword">Password</label>
          </div>
        
          <div class="form-label-group">
              <input type="password" name="inputPasswordConfirm" id="inputPassword" class="form-control" placeholder="Confirm Password" required autofocus>
              <label for="inputPassword">Password Confirmation</label>
            </div>
        
          <div class="form-label-group">
            <input type="text" name="inputTags" id="inputTags" class="form-control" placeholder="Tags" required autofocus>
            <label for="inputTags">Tags</label>
          </div>
          <button class="btn btn-block yellow-text" type="submit">Register</button>
        </form>
    </main>
  </div>
</div>
