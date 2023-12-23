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

        .font_size
        {
            font-size: 40px;
            padding-bottom: 40px;
        }

        .text_color
        {
            color: black;
            padding-bottom: 20px;
        }

        label
        {
            display: inline-block;
            width: 200px;
        }

        .div_design
        {
            padding-bottom: 15px;
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

                    <h1 class="font_size">Add Product</h1>
                    <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label>Product Title :</label>
                            <input class="text_color" type="text" name="title" placeholder="Write a title" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Description :</label>
                            <input class="text_color" type="text" name="description" placeholder="Write a description" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Price :</label>
                            <input class="text_color" type="number" name="price" placeholder="Write a price" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Quantity :</label>
                            <input class="text_color" type="number" min="0" name="quantity" placeholder="Write a quantity" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Image Here :</label>

                            <input type="file" name="image" required="">

                        </div>
                        <div class="div_design">

                            <input type="submit" value="Add Product" class="btn btn-success">
                        </div>
                    </form>

                </div>

        </div>

          <!-- partial -->
        @include('admin.script')

  </body>
</html>
