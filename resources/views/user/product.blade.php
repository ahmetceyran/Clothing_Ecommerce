<div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest Products</h2>
            <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>
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
            </div>
          </div>
        </div>

        @endforeach

        <div class="d-flex justify-content-center">

            {!! $product->links() !!}

        </div>

      </div>
    </div>
  </div>
