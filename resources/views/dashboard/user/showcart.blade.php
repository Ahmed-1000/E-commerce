<!DOCTYPE html>
<html>
   <head>
        <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <!-- Import FawryPay CSS Library-->
<link rel="stylesheet" href="https://atfawry.fawrystaging.com/atfawry/plugin/assets/payments/css/fawrypay-payments.css">
       <title>cart</title>
       <script src="https://kit.fontawesome.com/a076d05399.js"></script>

       <!-- Scripts -->
    <script src="http://127.0.0.1:8000/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="http://127.0.0.1:8000/css/app.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
   </head>
    
   <body style="background-color:#f8edeb">
       <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav ml-auto">
                 <li class="nav-item">
                       <a  class="nav-link" href="{{route('user.showcard')}}" style="margin-left:220px; line-height:20px;">
                                    <i class="fas fa-shopping-cart"></i>
                                    cart[{{$count}}]
                                </a>
                 </li>
             </ul>
            </div>
         </div>
       </nav>   
         <table class="table  table-striped table-responsive table-inverse" style="margin-top: 85px; margin-left:500px"> 
        <thead class="thead-inverse">
            <tr>
               
                <td>name</td>
                <td>price</td>
                <td>quantity</td>
            </tr>
        </thead>    
        <tbody>
        @foreach($card as $product)   
            <tr>
               
                <th id="price" style="padding:10px; font-size:20px">{{$product->product_name}}</th>
                <th style="padding:10px; font-size:20px">{{$product->price}}</th>
                <th style="padding:10px; font-size:20px"><input type="number" class="form-control" min="1" style="width:75px;" value="{{$product->quantity}}"> </th>
                <td><a href="{{url('user/delete/'.$product->id)}}" class="btn btn-danger">Delete</a></td>
            </tr>
         @endforeach    
        </tbody>
         <script src="https://www.paypal.com/sdk/js?client-id=AYWzzIh2RypDQsvxlemuU2T6gECwhwyuJlKCoUn0kDZg32USOkuK-JvxrhWCLWrdls2wzWB4_TYUodsR"></script>
        <script>paypal.Buttons().render('body');</script>
     </table>
                                          <!--paypal-->
      
       <!-- Import FawryPay Staging JavaScript Library-->
<script type="text/javascript" src="https://atfawry.fawrystaging.com/atfawry/plugin/assets/payments/js/fawrypay-payments.js"></script>
   <!-- Import FawryPay Production JavaScript Library -->
<script type="text/javascript" src="https://www.atfawry.com/atfawry/plugin/assets/payments/js/fawrypay-payments.js"></script>
       <input type="image" onclick="checkout();" src="https://www.atfawry.com/assets/img/FawryPayLogo.jpg"
 alt="pay-using-fawry" id="fawry-payment-btn"/>
       <script>
           
          
                     function checkout() {
                         const configuration = {
                         locale : "en",  //default en
                      mode: DISPLAY_MODE.INSIDE_PAGE,  //required, allowed values [POPUP, INSIDE_PAGE, SIDE_PAGE]
                    };
                     FawryPay.checkout(buildChargeRequest(), configuration);
                }
                function buildChargeRequest() {
                   const chargeRequest = {
                            merchantCode: '1tSa6uxz2nRbgY+b+cZGyA==',
                            merchantRefNum: '2312465464',
                            customerMobile: '01xxxxxxxxx',
                            customerEmail: 'email@domain.com',
                            customerName: 'Customer Name',
                            customerProfileId: '1212',
                            paymentExpiry: '1631138400000',
                            chargeItems: [
                                    {
                                        itemId: '6b5fdea340e31b3b0339d4d4ae5',
                                        description: 'Product Description',
                                        price: 50.00,
                                        quantity: 2,
                                        imageUrl: 'https://your-site-link.com/photos/45566.jpg',
                                    },
                                    {
                                        itemId: '97092dd9e9c07888c7eef36',
                                        description: 'Product Description',
                                        price: 75.25,
                                        quantity: 3,
                                        imageUrl: 'https://your-site-link.com/photos/639855.jpg',
                                    },
                            ],
                            returnUrl: 'https://your-site-link.com',
                            authCaptureModePayment: false,
                            signature: "2ca4c078ab0d4c50ba90e31b3b0339d4d4ae5b32f97092dd9e9c07888c7eef36"
                        };
   return chargeRequest;
}
       
       
       </script>
 
 </body>
</html>