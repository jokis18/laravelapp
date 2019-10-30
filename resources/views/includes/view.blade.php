<div class="container-fluid">
    <div class="row">
      @include('includes.sidebar') 
    
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">View Customers</h1>
        </div>
  
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Tags</th>
              </tr>
            </thead>
            <tbody>
              @if(count($data) > 0)
                @foreach($data as $customer)
                  <tr>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->tags }}</td>
                  </tr>
                @endforeach
              @else 
                <p>Nothing to display
              @endif
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>
  