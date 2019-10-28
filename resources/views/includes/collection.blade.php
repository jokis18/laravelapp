<div class="container-fluid">
    <div class="row">
      @include('includes.sidebar') 
    
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('includes.messages')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Export Collection to CSV</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
              @if(count($data) > 0)
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">
                  <a href="/collection/convert_to_CSV">
                    Export All
                  </a>
                </button>
              </div>
            @endif
          </div>
        </div>
  
        <h2>Available Collections:</h2>
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>Collection ID</th>
                <th>Handle</th>
                <th>Title</th>
                <th>Body HTML</th>
                <th>Published Scope</th>
                <th>Export?</th>
              </tr>
            </thead>
            <tbody>
              @if(count($data) > 0)
                @foreach($data as $collection)
                  <tr>
                    <td>{{ $collection->id }}</td>
                    <td>{{ $collection->handle }}</td>
                    <td>{{ $collection->title }}</td>
                    <td>{{ $collection->body_html }}</td>
                    <td>{{ $collection->published_scope }}</td>
                    <td><a href="{{ action('CollectionsController@export', $collection->id) }}">Export as CSV</a></td>
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
  