<div class="container-fluid">
  <div class="row">
    @include('includes.sidebar') 
  
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Export Page to CSV</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button class="btn btn-sm btn-outline-secondary">Export All</button>
          </div>
        </div>
      </div>

      <h2>Available pages:</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Page Title</th>
              <th>Created_at</th>
              <th>Header</th>
              <th>Export?</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td><a href="#">Exportuoti</a></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
