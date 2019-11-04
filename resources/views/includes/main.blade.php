<div class="container-fluid">
  <div class="row">
     @include('includes.sidebar') 

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">{{ ShopifyApp::shop()->shopify_domain }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              @if(count($info) > 0)
                <div class="btn-group mr-2">
                  <button class="btn btn-sm btn-outline-secondary">
                    <a href="/export/convert_to_CSV">
                      Export everything to CSV
                    </a>
                  </button>
                </div>
              @endif
            </div>
        </div>

        <h2>Shop Information</h2><br>

        <div class="card-deck">
          <div class="card text-center">
            <span style="font-size: 6em; margin-top: 10px;">
              <i class="fas fa-box-open"></i>
            </span>
            <div class="card-body">
              <h5 class="card-title">TOTAL PRODUCTS: {{ $info['products']->body->count }}</h5>
            </div>
          </div>
          <div class="card text-center">
            <span style="font-size: 6em; margin-top: 10px;">
              <i class="fas fa-paste"></i>
            </span>
            <div class="card-body">
              <h5 class="card-title">TOTAL COLLECTIONS: {{ $info['collections']->body->count }}</h5>
            </div>
          </div>
          <div class="card text-center">
            <span style="font-size: 6em; margin-top: 10px;">
              <i class="fas fa-file-alt"></i>
            </span>
            <div class="card-body">
              <h5 class="card-title">TOTAL PAGES: {{ $info['pages']->body->count }}</h5>
            </div>
          </div>
          <div class="card text-center">
            <span style="font-size: 6em; margin-top: 10px;">
              <i class="fas fa-users"></i>
            </span>
            <div class="card-body">
              <h5 class="card-title">TOTAL CUSTOMERS: {{ $info['customers']->body->count }}</h5>
            </div>
          </div>
        </div><br><br>

        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Shop Name</th>
                <th>Email</th>
                <th>Domain Name</th>
                <th>Country</th>
                <th>Currency</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>{{ $info['data']->name }}</td>
                <td>{{ $info['data']->email }}</td>
                <td>{{ $info['data']->domain }}</td>
                <td>{{ $info['data']->country }}</td>
                <td>{{ $info['data']->currency }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>