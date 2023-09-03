<div class="row y-gap-30 pt-30">
    @foreach ($products as $product)
    <div class="col-lg-4 col-sm-6">
        <div class="productCard -type-1 text-center">
            <div class="productCard__image">
                <img src="{{ asset('/') }}uploads/products/{{ $product->image }}" alt="Product image">

            </div>

            <div class="productCard__content mt-20">

                <h4 class="text-17 fw-500 mt-15">{{ $product->name }}</h4>
                <div class="text-17 fw-500 text-purple-1 mt-15">${{ $product->price }}</div>

                <div class="productCard__button d-inline-block">
                    <a href="{{ route('product.details',$product->id) }}"
                      class="button -md -outline-purple-1 text-dark-1 mt-15">Details</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach



</div>