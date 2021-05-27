<div class="product-list-left">

    <div class="product-left-item">
        <p class="product-cat-title">
            <b>{{ Auth::check() ? Auth::user()->name : '' }}</b>
        </p>
        <ul class="list-unstyled product-cat-menu">
            <li class="{!! areActiveRoutes(['users-fe.index']) !!}">
                <a href="{{ route('users-fe.index', ['id' => Auth::check() ? Auth::user()->id : '' ]) }}" title="" >
                    Thông tin
                </a> 
            </li>
            <li class="{!! areActiveRoutes(['users-fe.history', 'users-fe.detailOrders']) !!}">
                <a href="{{ route('users-fe.history', ['id' => Auth::check() ? Auth::user()->id : '' ]) }}" title="" >
                    Lịch sử mua hàng
                </a> 
            </li>
            <li class="{!! areActiveRoutes(['users-fe.checkOrders']) !!}">
                <a href="{{ route('users-fe.checkOrders', ['id' => Auth::check() ? Auth::user()->id : '' ]) }}" title="" >
                    hello 
                </a> 
            </li>
            <li class="">
                <a href="{{ route('users-fe.logout') }}" title="" >
                    Thoát
                </a> 
            </li>
        </ul>
    </div> 

</div>