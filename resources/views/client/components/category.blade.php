<div class="col-sm-3">
    <div class="left-sidebar">
        <h2>Category</h2>
        <div class="panel-group category-products" id="accordian">
            <!--category-productsr-->
            @foreach ($categorys as $item)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear_{{$item->id}}">
                                <span class="badge pull-right">
                                    @if ($item->categoryChildrent->count())
                                    <i class="fa fa-plus"></i>
                                    @endif

                                </span>
                                {{$item ->name}}
                            </a>
                        </h4>
                    </div>
                    <div id="sportswear_{{$item->id}}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach ($item->categoryChildrent as $item2)
                                    <li><a href="#">{{$item2->name}} </a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
            {{-- <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title"><a href="#">Shoes</a></h4>
                </div>
            </div> --}}
        </div>
        <!--/category-products-->



        <div class="shipping text-center">
            <!--shipping-->
            <img src="/eshopper/images/home/shipping.jpg" alt="" />
        </div>
        <!--/shipping-->

    </div>
</div>
