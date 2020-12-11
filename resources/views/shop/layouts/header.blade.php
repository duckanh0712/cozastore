<header>
    <!-- Header desktop -->
    <header class="header-v3">
        <!-- Header desktop -->
        <div class="container-menu-desktop trans-03">
            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop p-l-45">

                    <!-- Logo desktop -->
                    <a href="/" class="logo">
                        <img src="/fontend/images/icons/logo-02.png" alt="IMG-LOGO">
                    </a>
                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            @if(!empty($categories))
                                @foreach($categories as $category)
                                    @if($category->parent_id == 0)
                            <li>
                                <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{$category->name}}</a>
                                <ul class="sub-menu">
                                    @foreach($categories as $child)
                                        @if($category->id == $child->parent_id)
                                    <li><a href="{{ route('shop.category', ['slug' => $child->slug]) }}">{{$child->name}}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                                    @endif
                                @endforeach
                            @endif
                            <li>
                                <a href="{{route('shop.article')}}">Blog</a>
                            </li>
                            <li>
                                <a href="{{route('shop.contact')}}">Contact</a>
                            </li>

                        </ul>
                    </div>
                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m h-full">
                        <div class="flex-c-m h-full p-r-25 bor6" id="cart_product">
                            @if(session('cart'))
                                <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" id="totalProduct" data-notify="{{session('cart')->totalQty }}">
                                    @else
                                        <div class="icon-header-item cl0 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" id="totalProduct" data-notify="0">
                                    @endif
                                    <a href="{{route('shop.cart')}}" style="color: white;"><i class="zmdi zmdi-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="/"><img src="/fontend/images/icons/logo-01.png" alt="IMG-LOGO"></a>
            </div>

            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>
                @if(session('cart'))
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="totalProductM" data-notify="{{session('cart')->totalQty }}">
                    <a href="{{route('shop.cart')}}" style="color: #0a0a0a;"><i class="zmdi zmdi-shopping-cart"></i></a>
                </div>
                @else
                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" id="totalProductM" data-notify="0">
                    <a href="{{route('shop.cart')}}" style="color: #0a0a0a;"><i class="zmdi zmdi-shopping-cart"></i></a>
                </div>
                    @endif
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">
            <ul class="main-menu-m">
                <li>
                    <a href="/">Home</a>
                </li>
                @if(!empty($categories))
                    @foreach($categories as $category)
                        @if($category->parent_id == 0)
                <li>
                    <a href="{{ route('shop.category', ['slug' => $category->slug]) }}">{{$category->name}}</a>
                    <ul class="sub-menu-m">
                        @foreach($categories as $child)
                            @if($category->id == $child->parent_id)
                        <li><a href="{{route('shop.category', ['slug' => $child->slug])}}">{{$child->name}}</a></li>
                            @endif
                         @endforeach
                    </ul>
                    <span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
                </li>
                        @endif
                    @endforeach
                @endif
                <li>
                    <a href="{{route('shop.article')}}">Blog</a>
                </li>
                <li>
                    <a href="{{route('shop.contact')}}">Contact</a>
                </li>
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <button class="flex-c-m btn-hide-modal-search trans-04">
                <i class="zmdi zmdi-close"></i>
            </button>

            <form class="container-search-header">
                <div class="wrap-search-header">
                    <input class="plh0" type="text" name="search" placeholder="Search...">

                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </header>
    @if (isset($is_home))
        @include('shop.layouts.slides')
    @endif
</header>


