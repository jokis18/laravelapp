<div class="container-fluid">
    <div class="row">
      @include('includes.sidebar') 
    
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('includes.messages')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">View Recent Activity</h1>
        </div>
  
        <h2>Recent Activity:</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>ID</th>
                <th>URL</th>
                <th>IP</th>
                <th>CREATED_AT</th>
                <th>RESPONSE</th>
              </tr>
            </thead>
            <tbody>
              @if(count($requests) > 0)
                @foreach($requests as $request)
                  <tr>
                    <td>{{ $request->id }}</td>
                    <td>{{ $request->url }}</td>
                    <td>{{ $request->ip }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td><a href="">View Response {{ $request->title }} </a></td>
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
  