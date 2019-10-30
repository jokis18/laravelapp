<div class="container-fluid">
    <div class="row">
      @include('includes.sidebar') 
    
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        @include('includes.messages')
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">View Recent Activity</h1>
        </div>
  
        <div class="table-responsive">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th>URL:</th>
                <th>IP:</th>
                <th>DATE:</th>
                <th>RESPONSE:</th>
              </tr>
            </thead>
            <tbody>
              @if(count($requests) > 0)
                @foreach($requests as $request)
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            @if(($request->response[9]) == "2")
                            <div class="modal-body alert-success">
                                <h5 class="modal-title">Status Code: 200</h5>
                            </div>
                              @elseif(($request->response[9]) == "4")
                              <div class="modal-body alert-danger">
                                  <h5 class="modal-title">Status Code: 400</h5>
                              </div>
                              @else(($request->response[9]) == "5")
                                <div class="modal-body alert-danger">
                                    <h5 class="modal-title">Status Code: 500</h5>
                                </div>
                          @endif
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          {{ $request->response }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal -->
                  <tr>
                    <td>{{ $request->url }}</td>
                    <td>{{ $request->ip }}</td>
                    <td>{{ $request->created_at }}</td>
                    <td><button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">View Response {{ $request->title }} </button></td>
                  </tr>
                @endforeach
              @else 
                <p>Nothing to display
              @endif
            </tbody>
          </table>
          <div class="d-flex justify-content-center">
            {{  $requests->links() }}
          </div>
        </div>
      </main>
    </div>
  </div>
  