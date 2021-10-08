<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale = 1.0">
     
      <title>edit</title>
       <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  </head>
    <body style="background-color:#6a9399!important">
        <div class="container">
             <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                 <h1>edit </h1><hr>
                  <form action="{{url('admin/update/'.$data->id)}}" method="post">
                    {{ csrf_field() }}
                   @method('PUT')
                   
                      <div class="form-group">
                         <label for="email">product name</label>
                          <input type="text" class="form-control" name="name" placeholder="Enter your emali" value="{{ $data->name }}">
                            
                      </div>
                      <div class="form-group">
                         <label for="password">price</label>
                          <input type="text" class="form-control" name="price" placeholder="Enter your password" value="{{ $data->price}}">
                            
                      </div>
                      <div class="form-group">
                         <label for="password">quantity</label>
                          <input type="text" class="form-control" name="quantity" placeholder="Enter your password" value="{{ $data->quantity}}">
                            
                      </div>
                      <div class="form-group">
                         <label for="password">description</label>
                          <input type="text" class="form-control" name="des" placeholder="Enter your password" value="{{ $data->description}}">
                            
                      </div>
                     
                       <div class="form-group">
                          <button type="submit" class="btn btn-primary">update</button>
                      
                      </div>
                      
                    </form>    
                 
                 
                 
                 
                 
                 
                 </div>
            
            
            
            
            
            </div>
        
        
        
        </div>
    
    
    
    
    
    </body>






</html>
