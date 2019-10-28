<div class="container-fluid">
    <div class="row">
      @include('includes.sidebar') 
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
            <h1 class="h2">Import Page from CSV</h1>
          </div>
          @include('includes.messages')
          <form class="form-signin" action="/importPage" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="file" class="bmd-label-floating">File input</label>
            <input type="file" class="form-control-file" id="file" name="file">
            <small class="text-muted">Supported file format: CSV</small>
          </div>
          <button class="btn yellow-text"><a href="/">Cancel</a></button>
          <button type="submit" class="btn btn-primary btn-raised">Submit</button>
        </form>
      </main>
    </div>
  </div>
  