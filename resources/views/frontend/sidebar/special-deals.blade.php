<div class="sidebar-widget outer-bottom-small wow fadeInUp">
    <h3 class="section-title">Special Deals</h3>
    <div class="sidebar-widget-body outer-top-xs">
        <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">

            <div class="item">
                <div class="products special-product">
                    @foreach ($special_deals as $product)
                        <div class="product">
                            <div class="product-micro">
                                <div class="row product-micro-row">
                                    <div class="col col-xs-5">
                                        <div class="product-image">
                                            <div class="image"> <a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->slug) }}">
                                                    <img src="{{ asset($product->thumbnail) }}" alt="">
                                                </a> </div>
                                        </div>
                                    </div>
                                    <div class="col col-xs-7">
                                        <div class="product-info">
                                            <h3 class="name"><a
                                                    href="{{ url('product/details/' . $product->id . '/' . $product->slug) }}">
                                                    @if (session()->get('language') == 'japanese')
                                                        {{ $product->name_ja }}
                                                    @else
                                                        {{ $product->name_en }}
                                                    @endif
                                                </a></h3>
                                            <div class="rating rateit-small"></div>
                                            <div class="product-price"> <span class="price">
                                                    ${{ $product->selling_price }} </span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
