@if ($item->categoryChildrent->count())
    <ul role="menu" class="sub-menu">
        @foreach ($item->categoryChildrent as $item2)
            <li>
                <a href="shop.html">{{ $item2->name }}</a>
                @if ($item2->categoryChildrent->count())
                @include('client.components.childrent_menu',['item' => $item2])
                @endif
            </li>
        @endforeach
    </ul>
@endif
