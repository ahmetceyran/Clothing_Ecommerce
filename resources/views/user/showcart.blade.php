<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Sixteen Clothing HTML Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

    <style type="text/css">

        .center
        {
            margin: auto;
            width: 50%;
            text-align: center;
            padding: 100px;
        }

        table,th,td
        {
            border: 1px solid gray;
        }

        .th_deg
        {
            font-size: 20px;
            padding: 5px;
            background-color: rgb(247, 98, 81);
        }

        .img_size
        {
            width: 150px;
            height: 100px;
        }

        .total_price
        {
            font-size: 20px;
            padding: 40px;
        }

    </style>

  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Sixteen <em>Clothing</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.html">Our Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact Us</a>
              </li>
              <li class="nav-item">
                @auth
                <a class="nav-link" href="{{url('show_cart')}}">
                    Cart [{{$count}}]
                </a>
                @endauth
                @guest
                    Cart[0]
                @endguest
            </li>
              <li class="nav-item">
              @if (Route::has('login'))
                    @auth
                    <x-app-layout>

                    </x-app-layout>
                    @else
                    <li>
                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                    </li>
                        @if (Route::has('register'))
                        <li>
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @endif
                    @endauth
              @endif
              </li>
            </ul>
          </div>
        </div>
      </nav>

      @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}

        </div>

      @endif

    </header>

    <body>

        <div class="hero_area">
            <!-- header section strats -->
            <!-- end header section -->


            @if(session()->has('message'))

            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}

            </div>

            @endif



         <div class="center">

           <table>

               <tr>
                   <th class="th_deg">Product Title</th>
                   <th class="th_deg">Product Quantity</th>
                   <th class="th_deg">Price</th>
                   <th class="th_deg">Action</th>
               </tr>

               <?php $totalprice=0 ?>

              @foreach ($cart as $cart)

               <tr>

                   <td>{{$cart->product_title}}</td>
                   <td>{{$cart->quantity}}</td>
                   <td>${{$cart->price}}</td>
                   <td>
                       <a class="btn btn-danger" onclick="return confirm('Are You Sure?')" href="{{url('remove_cart',$cart->id)}}">Remove</a>
                   </td>

               </tr>

               <?php $totalprice=$totalprice + $cart->price ?>

               @endforeach

           </table>

           <div>

               <h1 class="total_price">Total Price :  ${{$totalprice}}</h1>

           </div>

           <div>

               <h1 style="font-size: 25px;, padding-bottom: 15px;">Proceed to Order</h1>

               <a href="{{url('cash_order')}}" class="btn btn-danger">Cash On Delivery</a>

               <a href="{{url('stripe', $totalprice)}}" class="btn btn-danger">Pay Using Card</a>

           </div>


         </div>

    </body>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>


  </body>

</html>
