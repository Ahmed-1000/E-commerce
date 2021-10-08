<!DOCTYPE html>
<html>
    <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale = 1.0" >
        <title>Admin panal</title>
         <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    </head>
    <body style="background-color:#264653">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color:#023e8a">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('admin.products')}}">products</a>
        </li>
        
          
        </ul>
    </div>
  </div>
     
         
                                      <a href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                                      <form action="{{route('admin.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                               
      
</nav>
    <form action="{{ route('admin.productupload') }}" method="post"   enctype="multipart/form-data">    
                    @if(Session::get('message'))
                       <div class="alert alert-success">
                      
                              {{ Session::get('message') }}
                         </div>
                      @endif
                      @csrf
        <div class="card  offset-md-6" style="margin-top:45px; width:500px; height:550px;">
            <div class="card-header bg-secondary text-white">Add product</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 offset-md-4">
                         <div class="form-group">
                              <label for="name">product name</label>
                             <input type="text" name="name" class="form-control" placeholder="Enter product name">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                         <div class="form-group">
                              <label for="">price</label>
                             <input type="text" name="price" class="form-control" placeholder="Enter price">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                         <div class="form-group">
                              <label for="">quantity</label>
                             <input type="text" name="quantity" class="form-control" placeholder="Enter quantity">
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                         <div class="form-group">
                              <label for="">description</label>
                               <input type="text" name="des" class="form-control" placeholder="Enter description">
                        </div>
                    </div>
                     <div class="col-md-6 offset-md-4">
                         <div class="form-group">
                              <label for="">upload image</label>
                             <input type="file" name="files" class="form-control">
                        </div>
                    </div>
                     <div class="col-md-6 offset-md-4">
                         <div class="form-group">
                              <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>    
                        
    
    </body>
</html>