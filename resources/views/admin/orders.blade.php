<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

    <style type="text/css">

        .div_center
        {
            text-align: center;
            padding-top: 40px;
        }

        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }

        .img_size
        {
            width: 150px;
            height: 100px;
        }

        .th_color
        {
            color: red;
            background: skyblue;
        }

        .th_deg
        {
            padding: 25px;
        }

        th, td {

            border: 1px solid;

        }

    </style>

  </head>
  <body>

    @include('admin.sidebar')
      <!-- partial -->

        <!-- partial:partials/_navbar.html -->

        @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            <div class="div_center">

                @if(session()->has('message'))

                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{session()->get('message')}}

                </div>

                @endif

                <h2 class="font_size">All Products</h2>

                <table class="center">

                    <tr class="th_color">
                        <th style="padding: 10px;">Customer Name</th>
                        <th style="padding: 10px;">Phone</th>
                        <th style="padding: 10px;">Address</th>
                        <th style="padding: 10px;">Product Title</th>
                        <th style="padding: 10px;">Quantity</th>
                        <th style="padding: 10px;">Price</th>
                        <th style="padding: 10px;">Delivery Status</th>
                        <th style="padding: 10px;">Delivered</th>
                    </tr>

                    @foreach($order as $order)

                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->product_name}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->status}}</td>
                        <td>

                            @if($order->status=='not delivered')

                            <a href="{{url('delivered', $order->id)}}" onclick="return confirm('Are you sure that this product is delivered!!!')" class="btn btn-primary">Delivered</a>

                            @else

                            <p style="color: lightgreen;">Delivered</p>

                            @endif

                        </td>
                    </tr>

                    @endforeach

                </table>

            </div>

        </div>

          <!-- partial -->
        @include('admin.script')

  </body>
</html>
