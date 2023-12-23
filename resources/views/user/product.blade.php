<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

            <form action="{{url('search')}}" method="GET" class="form-inline" style="float: right; padding: 10px;">

                @csrf

                <input class="form-control" type="search" name="search" placeholder="Search">

                <input type="submit" value="Search" class="btn btn-success">

            </form>

          </div>
        </div>

        @foreach ($product as $products)

        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img style="height: 250px; width: 350px; margin: auto;" src="product/{{$products->image}}" alt=""></a>
            <div class="down-content">
              <a href="#"><h4>{{$products->title}}</h4></a>
              <h6>${{$products->price}}</h6>
              <p>{{$products->description}}</p>
              <a class="btn btn-primary" href="#">Add Cart</a>
            </div>
          </div>
        </div>

        @endforeach

        @if(method_exists($product, 'links'))

        <div class="d-flex justify-content-center">

            {!! $product->links() !!}

        </div>

        @endif

      </div>
    </div>
  </div>
