<div class="container-fluid">
  <div class="row">
     @include('includes.sidebar') 

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">{{ ShopifyApp::shop()->shopify_domain }}</h1>
        </div>

        <h2>Shop Information</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Domain</th>
                <th>Country</th>
                <th>Currency</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $data->name }}</td>
                <td>{{ $data->email }}</td>
                <td>{{ $data->domain }}</td>
                <td>{{ $data->country }}</td>
                <td>{{ $data->currency }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>