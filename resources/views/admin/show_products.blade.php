<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

    <style type="text/css">

        .div_center
        {
            text-align: center;
            margin: auto;
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
                        <th class="th_deg">Product title</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Product Image</th>
                        <th class="th_deg">Delete</th>
                        <th class="th_deg">Update</th>
                    </tr>

                    @foreach($product as $product)

                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$product->image}}">
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('Are You Sure To Delete This?')" href="{{url('delete_product',$product->id)}}">Delete</a>
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$product->id)}}">Update</a>
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
