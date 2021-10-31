<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{route('homeClient')}}" class="active">Trang Chủ</a></li>
        @foreach ($categorysLimit as $item)
        <li class="dropdown"><a href="#">{{$item->name}}<i class="fa fa-angle-down"></i></a>
            @include('client.components.childrent_menu',['item' => $item])
        </li>
        @endforeach
{{-- 
        <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
            <ul role="menu" class="sub-menu">
                <li><a href="blog.html">Blog List</a></li>
                <li><a href="blog-single.html">Blog Single</a></li>
            </ul>
        </li>
        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li> --}}
    </ul>
</div>
