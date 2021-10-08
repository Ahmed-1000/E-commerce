<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale = 1.0">
     
      <title>user login</title>
       <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
  </head>
    <body>
        <div class="container">
             <div class="row">
                <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                 <h1>user login</h1>
                  <form action="{{route('user.check')}}" method="post" >
                      @if(Session::get('fail'))
                         <div class="alert alert-success">
                      
                              {{ Session::get('fail') }}
                         </div>
                      @endif
                      @csrf
                      <div class="form-group">
                         <label for="email">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Enter your emali" value="{{ old('email') }}">
                            <span class="danger-area">@error('email'){{ $message }} @enderror</span>
                      </div>
                      <div class="form-group">
                         <label for="password">password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter your password" value="{{ old('password') }}">
                            <span class="danger-area">@error('password'){{ $message }} @enderror</span>
                      </div>
                       <div class="form-group">
                          <button type="submit" class="btn btn-primary">login</button>
                      
                      </div>
                      <br>
                      <a href="{{route('user.register')}}">create new account</a>
                    
                    </form>    
                 
                 
                 
                 
                 
                 
                 </div>
            
            
            
            
            
            </div>
        
        
        
        </div>
    
    
    
    
    
    </body>






</html>