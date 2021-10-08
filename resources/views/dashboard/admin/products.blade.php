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
          <a class="nav-link active" aria-current="page" href="{{route('admin.Home')}}">Home</a>
        </li>
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="">products</a>
        </li>
        
          
        </ul>
    </div>
  </div>
     
         
                                      <a href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">logout</a>
                                      <form action="{{route('admin.logout')}}" method="post" class="d-none" id="logout-form">@csrf</form>
                               
      
</nav>
         @if(Session::get('status'))
                         <div class="alert alert-success">
                      
                              {{ Session::get('status') }}
                         </div>
        @endif
     
    <table class="table  table-striped table-dark" style="margin-top: 45px;"> 
        <thead class="thead-dark">
            <tr>
                <td>#</td>
                <td>name</td>
                <td>price</td>
                <td>quantity</td>
                <td>image</td>
            </tr>
        </thead>    
        <tbody>
        @foreach($data as $product)   
            <tr>
                <th scope="row">{{$product->id}}</th>
                <th>{{$product->name}}</th>
                <th>{{$product->price}}</th>
                <th>{{$product->quantity}}</th>
                <th><img height="150" width="75" src="/productimage/{{$product->files}}"></th>
                <td><a href="{{url('admin/edit/'.$product->id)}}" class="btn btn-success">Edit</a></td>
                 <td><a href="{{url('admin/delete/'.$product->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
         @endforeach    
        </tbody>
        
   </table>
 
    </body>
</html>