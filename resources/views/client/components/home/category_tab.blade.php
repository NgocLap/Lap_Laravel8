<div class="category-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach ($categorys as $keycategorys => $item)
            <li class="{{$keycategorys == 0 ? 'active' : ''}}">
                <a href="#category_tab_{{$item->id}}" data-toggle="tab">{{$item->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach ($categorys as $keycategoryProduct => $item2)
        <div class="tab-pane fade {{$keycategoryProduct  == 0 ? 'active in' : ''}} active in" id="category_tab_{{$item2->id}}">
            @foreach ($item2->products as $productItem)
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{$productItem->feature_image_path}}" alt="" />
                            <h2>{{number_format($productItem->price) }} </h2>
                            <p>{{$productItem->name}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Add to cart</a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
