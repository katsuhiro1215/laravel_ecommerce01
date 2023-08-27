<header class="header-style-1">

    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">

                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>
                                @if (session()->get('language') == 'japanese')
                                    アカウント
                                @else
                                    My Account
                                @endif
                            </a></li>
                        <li><a href="#"><i class="icon fa fa-heart"></i>
                                @if (session()->get('language') == 'japanese')
                                    お気に入り
                                @else
                                    Wishlist
                                @endif
                            </a></li>
                        <li><a href="#"><i class="icon fa fa-shopping-cart"></i>
                                @if (session()->get('language') == 'japanese')
                                    カート
                                @else
                                    My Cart
                                @endif
                            </a></li>
                        <li><a href="#"><i class="icon fa fa-check"></i>
                                @if (session()->get('language') == 'japanese')
                                    チェックアウト
                                @else
                                    Checkout
                                @endif
                            </a></li>
                        @auth
                            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'japanese')
                                        プロフィール
                                    @else
                                        User Profile
                                    @endif
                                </a></li>
                        @else
                            <li><a href="{{ route('login') }}"><i class="icon fa fa-lock"></i>
                                    @if (session()->get('language') == 'japanese')
                                        ログイン
                                    @else
                                        Login
                                    @endif
                                </a></li>
                        @endauth
                    </ul>
                </div>

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small"> <a href="#" class="dropdown-toggle"
                                data-hover="dropdown" data-toggle="dropdown"><span class="value">
                                    @if (session()->get('language') == 'japanese')
                                        言語
                                    @else
                                        Language
                                    @endif
                                </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                @if (session()->get('language') == 'japanese')
                                    <li><a href="{{ route('language.english') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('language.japanese') }}">Japanese</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                    <div class="logo"> <a href="{{ url('/') }}"> <img
                                src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo"> </a> </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <div class="search-area">
                        <form>
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="category.html">Categories <b class="caret"></b></a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Clothing</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Electronics</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Shoes</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1"
                                                    href="category.html">- Watches</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" placeholder="Search here..." />
                                <a class="search-button" href="#"></a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">

                    <div class="dropdown dropdown-cart"> <a href="#" class="dropdown-toggle lnk-cart"
                            data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
                                <div class="basket-item-count"><span class="count">2</span></div>
                                <div class="total-price-basket"> <span class="lbl">cart -</span> <span
                                        class="total-price"> <span class="sign">$</span><span
                                            class="value">600.00</span> </span> </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="cart-item product-summary">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <div class="image"> <a href="detail.html"><img
                                                        src="{{ asset('frontend/assets/images/cart.jpg') }}"
                                                        alt=""></a> </div>
                                        </div>
                                        <div class="col-xs-7">
                                            <h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
                                            <div class="price">$600.00</div>
                                        </div>
                                        <div class="col-xs-1 action"> <a href="#"><i
                                                    class="fa fa-trash"></i></a> </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <hr>
                                <div class="clearfix cart-total">
                                    <div class="pull-right"> <span class="text">Sub Total :</span><span
                                            class='price'>$600.00</span> </div>
                                    <div class="clearfix"></div>
                                    <a href="checkout.html"
                                        class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                        class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"> <a href="{{ url('/') }}"
                                        data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">
                                        @if (session()->get('language') == 'japanese')
                                            ホーム
                                        @else
                                            Home
                                        @endif
                                    </a>
                                </li>

                                @php
                                    $categories = App\Models\Category::orderBy('name_ja', 'ASC')->get();
                                @endphp

                                @foreach ($categories as $category)
                                    <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown"
                                            class="dropdown-toggle" data-toggle="dropdown">
                                            @if (session()->get('language') == 'japanese')
                                                {{ $category->name_ja }}
                                            @else
                                                {{ $category->name_en }}
                                            @endif
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">

                                                        @php
                                                            $subCategories = App\Models\SubCategory::where('category_id', $category->id)
                                                                ->orderBy('name_ja', 'ASC')
                                                                ->get();
                                                        @endphp

                                                        @foreach ($subCategories as $subCategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                                <h2 class="title">
                                                                    @if (session()->get('language') == 'japanese')
                                                                        {{ $subCategory->name_ja }}
                                                                    @else
                                                                        {{ $subCategory->name_en }}
                                                                    @endif
                                                                </h2>
                                                                @php
                                                                    $subSubCategories = App\Models\SubSubCategory::where('sub_category_id', $subCategory->id)
                                                                        ->orderBy('name_ja', 'ASC')
                                                                        ->get();
                                                                @endphp
                                                                <ul class="links">
                                                                    @foreach ($subSubCategories as $subSubCategory)
                                                                        <li><a href="#">
                                                                                @if (session()->get('language') == 'japanese')
                                                                                    {{ $subSubCategory->name_ja }}
                                                                                @else
                                                                                    {{ $subSubCategory->name_en }}
                                                                                @endif
                                                                            </a></li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                                <li class="dropdown  navbar-right special-menu"> <a href="#">Todays offer</a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
