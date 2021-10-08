<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
         <link rel="stylesheet" href="{{asset('build/css/intlTelInput.css')}}">
         <link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
         <title>register</title>
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
                <div class="col-md-4 offset-md-4" style="margin-top:45px;">
                    <h1>register</h1>
                    <form action="{{route('user.create')}}" method="post" autocomplete="off">
                         @if(Session::get('success'))
                         <div class="alert alert-success">
                      
                              {{ Session::get('success') }}
                         </div>
                      @endif
                      @if(Session::get('fail'))
                         <div class="alert alert-success">
                      
                              {{ Session::get('fail') }}
                         </div>
                      @endif
                      @csrf
                       <div class="form-group">
                           <label for="email">Email</label>
                           <input type="email" name="email" class="form-control" placeholder="Enter your E-mail" value="{{old('email')}}">
                             <span class="danger-area">@error('email'){{ $message }} @enderror</span>
                        </div>
                         <div class="form-group">
                           <label for="">phone</label>
                           <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your phone" value="{{old('phone')}}">
                             <span class="danger-area">@error('phone'){{ $message }} @enderror</span>
                        </div>
                         <div class="form-group">
                           <label for="name">name</label>
                           <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{old('name')}}">
                               <span class="danger-area">@error('name'){{ $message }} @enderror</span>
                        </div>
                         <div class="form-group">
                           <label for="password">password</label>
                           <input type="password" name="password" class="form-control" placeholder="password"  value="{{old('password')}}">
                               <span class="danger-area">@error('password'){{ $message }} @enderror</span>
                        </div>
                         <div class="form-group">
                           <label for="cpassword">confirm password</label>
                           <input type="password" name="cpassword" class="form-control" placeholder="password"  value="{{old('cpassword')}}">
                               <span class="danger-area">@error('cpassword'){{ $message }} @enderror</span>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">register</button>
                      
                      </div>
                        <br>
                      <a href="{{route('user.login')}}">already have account</a>
                    </form>
                </div>
            </div>
        
        </div>
        <script src="{{asset('build/js/intlTelInput.js')}}"></script>
  <script>
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>
    
    </body>


</html>