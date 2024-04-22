<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="format-detection" content="telephone=no">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/frontend/images/favicon.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/bootstrap-4.2.1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/owl-carousel-2.3.4/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendor/fontawesome-5.6.1/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/fonts/stroyka/stroyka.css') }}">

    <script src="{{ asset('assets/frontend/vendor/jquery-3.3.1/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/bootstrap-4.2.1/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/owl-carousel-2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/nouislider-12.1.0/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/number.js') }}"></script>
    <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
    <script src="{{ asset('assets/frontend/vendor/svg4everybody-2.1.9/svg4everybody.min.js') }}"></script>
    <script>svg4everybody();</script>

    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-97489509-6"></script>

</head>
<body>
    <div id="quickview-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content"></div>
        </div>
    </div>

    <div class="mobilemenu">
        <div class="mobilemenu__backdrop"></div>
        <div class="mobilemenu__body">
            <div class="mobilemenu__header">
                <div class="mobilemenu__title">Menu</div>
                <button type="button" class="mobilemenu__close">
                    <svg width="20px" height="20px">
                        <use xlink:href="images/sprite.svg#cross-20"></use></svg>
                </button>
            </div>
            <div class="mobilemenu__content">
                <ul class="mobile-links mobile-links--level--0" data-collapse="" data-collapse-opened-class="mobile-links__item--open">
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title">
                            <a href="index.html" class="mobile-links__item-link">Home</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title">
                                        <a href="index.html" class="mobile-links__item-link">Home 1</a>
                                    </div></li>
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title">
                                        <a href="index-2.html" class="mobile-links__item-link">Home 2</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="mobile-links__item" data-collapse-item="">
                        <div class="mobile-links__item-title">
                            <a href="#" class="mobile-links__item-link">Categories</a>
                            <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                </svg>
                            </button>
                        </div>
                        <div class="mobile-links__item-sub-links" data-collapse-content="">
                            <ul class="mobile-links mobile-links--level--1">
                                <li class="mobile-links__item" data-collapse-item="">
                                    <div class="mobile-links__item-title">
                                        <a href="#" class="mobile-links__item-link">Power Tools</a>
                                        <button class="mobile-links__item-toggle" type="button" data-collapse-trigger="">
                                            <svg class="mobile-links__item-arrow" width="12px" height="7px">
                                                <use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mobile-links__item-sub-links" data-collapse-content="">
                                        <ul class="mobile-links mobile-links--level--2">
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title">
                                                    <a href="#" class="mobile-links__item-link">Engravers</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item="">
                                                <div class="mobile-links__item-title">
                                                    <a href="#" class="mobile-links__item-link">Wrenches</a>
                                                </div>
                                            </li>
                                            <li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Wall Chaser</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pneumatic Tools</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Machine Tools</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--2"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Thread Cutting</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Chip Blowers</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Sharpening Machines</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pipe Cutters</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Slotting machines</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Lathes</a></div></li></ul></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--1"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">Shop Grid</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--2"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-grid-3-columns-sidebar.html" class="mobile-links__item-link">3 Columns Sidebar</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-grid-4-columns-full.html" class="mobile-links__item-link">4 Columns Full</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-grid-5-columns-full.html" class="mobile-links__item-link">5 Columns Full</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-list.html" class="mobile-links__item-link">Shop List</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="shop-right-sidebar.html" class="mobile-links__item-link">Shop Right Sidebar</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--2"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="product.html" class="mobile-links__item-link">Product</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="product-alt.html" class="mobile-links__item-link">Product Alt</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="product-sidebar.html" class="mobile-links__item-link">Product Sidebar</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="cart.html" class="mobile-links__item-link">Cart</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="{{ route('frontend.checkout') }}" class="mobile-links__item-link">Checkout</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="{{ route('frontend.wishlist') }}" class="mobile-links__item-link">Wishlist</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="compare.html" class="mobile-links__item-link">Compare</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="account.html" class="mobile-links__item-link">My Account</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="track-order.html" class="mobile-links__item-link">Track Order</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--1"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="blog-classic.html" class="mobile-links__item-link">Blog Classic</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="blog-grid.html" class="mobile-links__item-link">Blog Grid</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="blog-list.html" class="mobile-links__item-link">Blog List</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="blog-left-sidebar.html" class="mobile-links__item-link">Blog Left Sidebar</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="post.html" class="mobile-links__item-link">Post Page</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="post-without-sidebar.html" class="mobile-links__item-link">Post Without Sidebar</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Pages</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--1"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="about-us.html" class="mobile-links__item-link">About Us</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="contact-us.html" class="mobile-links__item-link">Contact Us</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="contact-us-alt.html" class="mobile-links__item-link">Contact Us Alt</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="404.html" class="mobile-links__item-link">404</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="terms-and-conditions.html" class="mobile-links__item-link">Terms And Conditions</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="faq.html" class="mobile-links__item-link">FAQ</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="components.html" class="mobile-links__item-link">Components</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="typography.html" class="mobile-links__item-link">Typography</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a data-collapse-trigger="" class="mobile-links__item-link">Currency</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--1"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">€ Euro</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">£ Pound Sterling</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">$ US Dollar</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">₽ Russian Ruble</a></div></li></ul></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a data-collapse-trigger="" class="mobile-links__item-link">Language</a> <button class="mobile-links__item-toggle" type="button" data-collapse-trigger=""><svg class="mobile-links__item-arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button></div><div class="mobile-links__item-sub-links" data-collapse-content=""><ul class="mobile-links mobile-links--level--1"><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">English</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">French</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">German</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Russian</a></div></li><li class="mobile-links__item" data-collapse-item=""><div class="mobile-links__item-title"><a href="#" class="mobile-links__item-link">Italian</a></div></li></ul></div></li></ul></div></div></div><!-- mobilemenu / end --><!-- site --><div class="site"><!-- mobile site__header -->

        <header class="site__header d-lg-none">
            <div class="mobile-header mobile-header--sticky mobile-header--stuck">
                <div class="mobile-header__panel">
                    <div class="container">
                        <div class="mobile-header__body">
                            <button class="mobile-header__menu-button">
                                <svg width="18px" height="14px"><use xlink:href="images/sprite.svg#menu-18x14"></use></svg>
                            </button>
                            <a class="mobile-header__logo" href="index.html">
                                LOGO
                                <!-- width="120px" height="20px" -->
                            </a>
                            <div class="mobile-header__search">
                                <form class="mobile-header__search-form" action="#">
                                    <input class="mobile-header__search-input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                                    <button class="mobile-header__search-button mobile-header__search-button--submit" type="submit">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="images/sprite.svg#search-20"></use>
                                        </svg>
                                    </button>
                                    <button class="mobile-header__search-button mobile-header__search-button--close" type="button">
                                        <svg width="20px" height="20px">
                                            <use xlink:href="images/sprite.svg#cross-20"></use>
                                        </svg>
                                    </button>
                                    <div class="mobile-header__search-body"></div>
                                </form>
                            </div>
                            <div class="mobile-header__indicators">
                                <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                                    <button class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px"><use xlink:href="images/sprite.svg#search-20"></use></svg>
                                        </span>
                                    </button>
                                </div>
                                <div class="indicator indicator--mobile d-sm-flex d-none">
                                    <a href="{{ route('frontend.wishlist') }}" class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px">
                                                <use xlink:href="images/sprite.svg#heart-20"></use>
                                            </svg>
                                            <span class="indicator__value">1</span>
                                        </span>
                                    </a>
                                </div>
                                <div class="indicator indicator--mobile">
                                    <a href="cart.html" class="indicator__button">
                                        <span class="indicator__area">
                                            <svg width="20px" height="20px"><use xlink:href="images/sprite.svg#cart-20"></use>
                                            </svg>
                                            <span class="indicator__value">3</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <header class="site__header d-lg-block d-none">

            <div class="site-header">

                <div class="site-header__middle container">
                    <div class="site-header__logo">
                        <a href="index.html">
                            <!-- width="196px" height="26px" -->
                            LOGO
                        </a>
                    </div>
                    <div class="site-header__search">
                        <div class="search">
                            <form class="search__form" action="#">
                                <input class="search__input" name="search" placeholder="Search over 10,000 products" aria-label="Site search" type="text" autocomplete="off">
                                <button class="search__button" type="submit">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#search-20"></use></svg>
                                </button>
                                <div class="search__border"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="site-header__nav-panel">
                    <div class="nav-panel">
                        <div class="nav-panel__container container">
                            <div class="nav-panel__row">



                                <div class="nav-panel__nav-links nav-links">
                                    <ul class="nav-links__list">
                                        <li class="nav-links__item nav-links__item--with-submenu">
                                            <a href="index.html">
                                <span>
                                    Home
                                    <svg class="nav-links__arrow" width="9px" height="6px"><use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use></svg>
                                </span>
                                            </a>
                                            <div class="nav-links__menu">
                                                <ul class="menu menu--layout--classic">
                                                    <li><a href="index.html">Home 1</a></li>
                                                    <li><a href="index-2.html">Home 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>


                                        <li class="nav-links__item nav-links__item--with-submenu">
                                            <a href="#">
                                <span>
                                    Shop
                                    <svg class="nav-links__arrow" width="9px" height="6px">
                                        <use xlink:href="images/sprite.svg#arrow-rounded-down-9x6"></use>
                                    </svg>
                                </span>
                                            </a>
                                            <div class="nav-links__menu">
                                                <ul class="menu menu--layout--classic">
                                                    <li>
                                                        <a href="#">
                                                            Shop Grid
                                                            <svg class="menu__arrow" width="6px" height="9px">
                                                                <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                            </svg>
                                                        </a>
                                                        <div class="menu__submenu">
                                                            <ul class="menu menu--layout--classic">
                                                                <li><a href="#">3 Columns Sidebar</a></li>
                                                                <li><a href="#">4 Columns Full</a></li>
                                                                <li><a href="#">5 Columns Full</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li><a href="#">Shop List</a></li>
                                                    <li><a href="#">Shop Right Sidebar</a></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-links__item"><a href="#"><span>Contact Us</span></a></li>
                                    </ul>
                                </div>

                                <div class="nav-panel__indicators">
                                    <div class="indicator">
                                        <a href="{{ route('frontend.wishlist') }}" class="indicator__button">
                            <span class="indicator__area">
                                <svg width="20px" height="20px">
                                    <use xlink:href="images/sprite.svg#heart-20"></use>
                                </svg>
                                <span class="indicator__value">2</span>
                            </span>
                                        </a>
                                    </div>
                                    <div class="indicator indicator--trigger--click">
                                        <a href="cart.html" class="indicator__button">
                            <span class="indicator__area">
                                <svg width="20px" height="20px">
                                    <use xlink:href="images/sprite.svg#cart-20"></use>
                                </svg>
                                <span class="indicator__value">4</span>
                            </span>
                                        </a>
                                        <div class="indicator__dropdown">
                                            <div class="dropcart">
                                                <div class="dropcart__products-list">

                                                    <div class="dropcart__product">
                                                        <div class="dropcart__product-image">
                                                            <a href="#">
                                                                <img src="images/products/product-2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="dropcart__product-info">
                                                            <div class="dropcart__product-name">
                                                                <a href="#">Undefined Tool IRadix DPS3000SY 2700 watts</a>
                                                            </div>
                                                            <div class="dropcart__product-meta">
                                                                <span class="dropcart__product-quantity">1</span> x <span class="dropcart__product-price">$849.00</span>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="dropcart__product-remove btn btn-light btn-sm btn-svg-icon">
                                                            <svg width="10px" height="10px"><use xlink:href="images/sprite.svg#cross-10"></use></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="dropcart__totals">
                                                    <table>
                                                        <tbody>
                                                        <tr><th>Subtotal</th><td>$5,877.00</td></tr>
                                                        <tr><th>Shipping</th><td>$25.00</td></tr>
                                                        <tr><th>Tax</th><td>$0.00</td></tr>
                                                        <tr><th>Total</th><td>$5,902.00</td></tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="dropcart__buttons"><a class="btn btn-secondary" href="cart.html">View Cart</a> <a class="btn btn-primary" href="{{ route('frontend.checkout') }}">Checkout</a></div></div><!-- .dropcart / end -->
                                        </div></div></div></div></div></div></div></div>
        </header>

        <div class="site__body">
            <div class="page-header">
                <div class="page-header__container container">
                    <div class="page-header__breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.html">Home</a> <svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use></svg></li><li class="breadcrumb-item"><a href="#">Breadcrumb</a> <svg class="breadcrumb-arrow" width="6px" height="9px"><use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use></svg></li><li class="breadcrumb-item active" aria-current="page">Screwdrivers</li></ol></nav></div><div class="page-header__title">

                        <h1>Screwdrivers</h1></div></div></div><div class="container"><div class="shop-layout shop-layout--sidebar--start"><div class="shop-layout__sidebar"><div class="block block-sidebar"><div class="block-sidebar__item"><div class="widget-filters widget" data-collapse="" data-collapse-opened-class="filter--opened"><h4 class="widget__title">Filters</h4><div class="widget-filters__list"><div class="widget-filters__item"><div class="filter filter--opened" data-collapse-item=""><button type="button" class="filter__title" data-collapse-trigger="">Categories <svg class="filter__arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button><div class="filter__body" data-collapse-content=""><div class="filter__container"><div class="filter-categories"><ul class="filter-categories__list"><li class="filter-categories__item filter-categories__item--parent"><svg class="filter-categories__arrow" width="6px" height="9px"><use xlink:href="images/sprite.svg#arrow-rounded-left-6x9"></use></svg> <a href="#">Construction &amp; Repair</a><div class="filter-categories__counter">254</div></li><li class="filter-categories__item filter-categories__item--parent"><svg class="filter-categories__arrow" width="6px" height="9px"><use xlink:href="images/sprite.svg#arrow-rounded-left-6x9"></use></svg> <a href="#">Instruments</a><div class="filter-categories__counter">75</div></li><li class="filter-categories__item filter-categories__item--current"><a href="#">Power Tools</a><div class="filter-categories__counter">21</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Drills &amp; Mixers</a><div class="filter-categories__counter">15</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Cordless Screwdrivers</a><div class="filter-categories__counter">2</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Screwdrivers</a><div class="filter-categories__counter">30</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Wrenches</a><div class="filter-categories__counter">7</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Grinding Machines</a><div class="filter-categories__counter">5</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Milling Cutters</a><div class="filter-categories__counter">2</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Electric Spray Guns</a><div class="filter-categories__counter">9</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Jigsaws</a><div class="filter-categories__counter">4</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Jackhammers</a><div class="filter-categories__counter">0</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Planers</a><div class="filter-categories__counter">12</div></li><li class="filter-categories__item filter-categories__item--child"><a href="#">Glue Guns</a><div class="filter-categories__counter">7</div></li></ul></div></div></div></div></div><div class="widget-filters__item"><div class="filter filter--opened" data-collapse-item=""><button type="button" class="filter__title" data-collapse-trigger="">Brand <svg class="filter__arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button><div class="filter__body" data-collapse-content=""><div class="filter__container"><div class="filter-list"><div class="filter-list__list"><label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="images/sprite.svg#check-9x7"></use></svg> </span></span><span class="filter-list__title">Wakita </span><span class="filter-list__counter">7</span></label> <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" checked="checked"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="images/sprite.svg#check-9x7"></use></svg> </span></span><span class="filter-list__title">Zosch </span><span class="filter-list__counter">42</span></label> <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" checked="checked" disabled="disabled"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="images/sprite.svg#check-9x7"></use></svg> </span></span><span class="filter-list__title">WeVALT</span></label> <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox" disabled="disabled"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="images/sprite.svg#check-9x7"></use></svg> </span></span><span class="filter-list__title">Hammer</span></label> <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="images/sprite.svg#check-9x7"></use></svg> </span></span><span class="filter-list__title">Mitasia </span><span class="filter-list__counter">1</span></label> <label class="filter-list__item"><span class="filter-list__input input-check"><span class="input-check__body"><input class="input-check__input" type="checkbox"> <span class="input-check__box"></span> <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="images/sprite.svg#check-9x7"></use></svg> </span></span><span class="filter-list__title">Metaggo </span><span class="filter-list__counter">25</span></label></div></div></div></div></div></div><div class="widget-filters__item"><div class="filter filter--opened" data-collapse-item=""><button type="button" class="filter__title" data-collapse-trigger="">Brand <svg class="filter__arrow" width="12px" height="7px"><use xlink:href="images/sprite.svg#arrow-rounded-down-12x7"></use></svg></button><div class="filter__body" data-collapse-content=""><div class="filter__container"><div class="filter-list"><div class="filter-list__list"><label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body"><input class="input-radio__input" name="filter_radio" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Wakita </span><span class="filter-list__counter">7</span></label> <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body"><input class="input-radio__input" name="filter_radio" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Zosch </span><span class="filter-list__counter">42</span></label> <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-radio"><span class="input-radio__body"><input class="input-radio__input" name="filter_radio" type="radio" checked="checked" disabled="disabled"> <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">WeVALT</span></label> <label class="filter-list__item filter-list__item--disabled"><span class="filter-list__input input-radio"><span class="input-radio__body"><input class="input-radio__input" name="filter_radio" type="radio" disabled="disabled"> <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Hammer</span></label> <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body"><input class="input-radio__input" name="filter_radio" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Mitasia </span><span class="filter-list__counter">1</span></label> <label class="filter-list__item"><span class="filter-list__input input-radio"><span class="input-radio__body"><input class="input-radio__input" name="filter_radio" type="radio"> <span class="input-radio__circle"></span> </span></span><span class="filter-list__title">Metaggo </span><span class="filter-list__counter">25</span></label></div></div></div></div></div></div></div>

                                    <div class="widget-filters__actions d-flex">
                                        <button class="btn btn-primary btn-sm">Filter</button>
                                        <button class="btn btn-secondary btn-sm ml-2">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <div class="block-sidebar__item d-none d-lg-block">
                                <div class="widget-products widget">
                                    <h4 class="widget__title">Latest Products</h4>
                                    <div class="widget-products__list">
                                        <div class="widget-products__item">
                                            <div class="widget-products__image">
                                                <a href="product.html">
                                                    <img src="images/products/product-1.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a>
                                                </div>
                                                <div class="widget-products__prices">$749.00</div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image">
                                                <a href="product.html">
                                                    <img src="images/products/product-2.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a>
                                                </div>
                                                <div class="widget-products__prices">$1,019.00</div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image">
                                                <a href="product.html"><img src="images/products/product-3.jpg" alt=""></a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="product.html">Drill Screwdriver Brandix ALX7054 200 Watts</a>
                                                </div>
                                                <div class="widget-products__prices">$850.00</div>
                                            </div>
                                        </div>
                                        <div class="widget-products__item">
                                            <div class="widget-products__image">
                                                <a href="product.html">
                                                    <img src="images/products/product-4.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="widget-products__info">
                                                <div class="widget-products__name">
                                                    <a href="product.html">Drill Series 3 Brandix KSR4590PQS 1500 Watts</a>
                                                </div><div class="widget-products__prices"><span class="widget-products__new-price">$949.00</span> <span class="widget-products__old-price">$1189.00</span></div></div></div><div class="widget-products__item"><div class="widget-products__image"><a href="product.html"><img src="images/products/product-5.jpg" alt=""></a></div><div class="widget-products__info"><div class="widget-products__name"><a href="product.html">Brandix Router Power Tool 2017ERXPK</a></div><div class="widget-products__prices">$1,700.00</div></div></div></div></div></div></div></div><div class="shop-layout__content"><div class="block"><div class="products-view"><div class="products-view__options"><div class="view-options"><div class="view-options__layout"><div class="layout-switcher"><div class="layout-switcher__list"><button data-layout="grid-3-sidebar" data-with-features="false" title="Grid" type="button" class="layout-switcher__button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#layout-grid-16x16"></use></svg></button> <button data-layout="grid-3-sidebar" data-with-features="true" title="Grid With Features" type="button" class="layout-switcher__button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#layout-grid-with-details-16x16"></use></svg></button> <button data-layout="list" data-with-features="false" title="List" type="button" class="layout-switcher__button layout-switcher__button--active"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#layout-list-16x16"></use></svg></button></div></div></div><div class="view-options__legend">Showing 6 of 98 products</div><div class="view-options__divider"></div><div class="view-options__control"><label for="">Sort By</label><div><select class="form-control form-control-sm" name="" id=""><option value="">Default</option><option value="">Name (A-Z)</option></select></div></div><div class="view-options__control"><label for="">Show</label><div><select class="form-control form-control-sm" name="" id=""><option value="">12</option><option value="">24</option></select></div></div></div></div><div class="products-view__list products-list" data-layout="list" data-with-features="false"><div class="products-list__body"><div class="products-list__item"><div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#quickview-16"></use></svg> <span class="fake-svg-icon"></span></button><div class="product-card__badges-list"><div class="product-card__badge product-card__badge--new">New</div></div><div class="product-card__image"><a href="product.html"><img src="images/products/product-1.jpg" alt=""></a></div><div class="product-card__info"><div class="product-card__name"><a href="product.html">Electric Planer Brandix KL370090G 300 Watts</a></div><div class="product-card__rating"><div class="rating"><div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div></div></div><div class="product-card__rating-legend">9 Reviews</div></div><ul class="product-card__features-list"><li>Speed: 750 RPM</li><li>Power Source: Cordless-Electric</li><li>Battery Cell Type: Lithium</li><li>Voltage: 20 Volts</li><li>Battery Capacity: 2 Ah</li></ul></div><div class="product-card__actions"><div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div><div class="product-card__prices">$749.00</div><div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#wishlist-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#compare-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div></div></div></div><div class="products-list__item"><div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#quickview-16"></use></svg> <span class="fake-svg-icon"></span></button><div class="product-card__badges-list"><div class="product-card__badge product-card__badge--hot">Hot</div></div><div class="product-card__image"><a href="product.html"><img src="images/products/product-2.jpg" alt=""></a></div><div class="product-card__info"><div class="product-card__name"><a href="product.html">Undefined Tool IRadix DPS3000SY 2700 Watts</a></div><div class="product-card__rating"><div class="rating"><div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div></div></div><div class="product-card__rating-legend">11 Reviews</div></div><ul class="product-card__features-list"><li>Speed: 750 RPM</li><li>Power Source: Cordless-Electric</li><li>Battery Cell Type: Lithium</li><li>Voltage: 20 Volts</li><li>Battery Capacity: 2 Ah</li></ul></div><div class="product-card__actions"><div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div><div class="product-card__prices">$1,019.00</div><div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#wishlist-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#compare-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div></div></div></div><div class="products-list__item"><div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#quickview-16"></use></svg> <span class="fake-svg-icon"></span></button><div class="product-card__image"><a href="product.html"><img src="images/products/product-15.jpg" alt=""></a></div><div class="product-card__info"><div class="product-card__name"><a href="product.html">Brandix Electric Jigsaw JIG7000BQ</a></div><div class="product-card__rating"><div class="rating"><div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div></div></div><div class="product-card__rating-legend">4 Reviews</div></div><ul class="product-card__features-list"><li>Speed: 750 RPM</li><li>Power Source: Cordless-Electric</li><li>Battery Cell Type: Lithium</li><li>Voltage: 20 Volts</li><li>Battery Capacity: 2 Ah</li></ul></div><div class="product-card__actions"><div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div><div class="product-card__prices">$290.00</div><div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#wishlist-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#compare-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div></div></div></div><div class="products-list__item"><div class="product-card"><button class="product-card__quickview" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#quickview-16"></use></svg> <span class="fake-svg-icon"></span></button><div class="product-card__image"><a href="product.html"><img src="images/products/product-16.jpg" alt=""></a></div><div class="product-card__info"><div class="product-card__name"><a href="product.html">Brandix Screwdriver SCREW1500ACC</a></div><div class="product-card__rating"><div class="rating"><div class="rating__body"><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div><svg class="rating__star rating__star--active" width="13px" height="12px"><g class="rating__fill"><use xlink:href="images/sprite.svg#star-normal"></use></g><g class="rating__stroke"><use xlink:href="images/sprite.svg#star-normal-stroke"></use></g></svg><div class="rating__star rating__star--only-edge rating__star--active"><div class="rating__fill"><div class="fake-svg-icon"></div></div><div class="rating__stroke"><div class="fake-svg-icon"></div></div></div></div></div><div class="product-card__rating-legend">11 Reviews</div></div><ul class="product-card__features-list"><li>Speed: 750 RPM</li><li>Power Source: Cordless-Electric</li><li>Battery Cell Type: Lithium</li><li>Voltage: 20 Volts</li><li>Battery Capacity: 2 Ah</li></ul></div><div class="product-card__actions"><div class="product-card__availability">Availability: <span class="text-success">In Stock</span></div><div class="product-card__prices">$1,499.00</div><div class="product-card__buttons"><button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button> <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#wishlist-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span></button> <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button"><svg width="16px" height="16px"><use xlink:href="images/sprite.svg#compare-16"></use></svg> <span class="fake-svg-icon fake-svg-icon--compare-16"></span></button></div></div></div></div></div></div><div class="products-view__pagination"><ul class="pagination justify-content-center"><li class="page-item disabled"><a class="page-link page-link--with-arrow" href="#" aria-label="Previous"><svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px"><use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use></svg></a></li><li class="page-item"><a class="page-link" href="#">1</a></li><li class="page-item active"><a class="page-link" href="#">2 <span class="sr-only">(current)</span></a></li><li class="page-item"><a class="page-link" href="#">3</a></li><li class="page-item"><a class="page-link page-link--with-arrow" href="#" aria-label="Next"><svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px"><use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use></svg></a></li></ul></div></div></div></div></div></div></div><!-- site__body / end --><!-- site__footer -->

        <footer class="site__footer">
            <div class="site-footer">
                <div class="container">
                    <div class="site-footer__widgets">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="site-footer__widget footer-contacts">
                                    <h5 class="footer-contacts__title">Contact Us</h5>
                                    <ul class="footer-contacts__contacts">
                                        <li><i class="footer-contacts__icon fas fa-globe-americas"></i> 715 Fake Street, New York 10021 USA</li>
                                        <li><i class="footer-contacts__icon far fa-envelope"></i> stroyka@example.com</li>
                                        <li><i class="footer-contacts__icon fas fa-mobile-alt"></i> (800) 060-0730, (800) 060-0730</li>
                                        <li><i class="footer-contacts__icon far fa-clock"></i> Mon-Sat 10:00pm - 7:00pm</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">Information</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">About Us</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Privacy Policy</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Cookies</a></li>
                                        <li class="footer-links__item"><a href="{{ route('admin.login.form') }}" class="footer-links__link">Advertisers and Affiliates</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-6 col-md-3 col-lg-2">
                                <div class="site-footer__widget footer-links">
                                    <h5 class="footer-links__title">My Account</h5>
                                    <ul class="footer-links__list">
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Order History</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Wish List</a></li>
                                        <li class="footer-links__item"><a href="#" class="footer-links__link">Newsletter</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-12 col-md-12 col-lg-4">
                                <div class="site-footer__widget footer-newsletter">
                                    <h5 class="footer-newsletter__title">Newsletter</h5>
                                    <div class="footer-newsletter__text">Praesent pellentesque volutpat ex, vitae auctor lorem pulvinar mollis felis at lacinia.</div>
                                    <form action="#" class="footer-newsletter__form">
                                        <label class="sr-only" for="footer-newsletter-address">Email Address</label>
                                        <input type="text" class="footer-newsletter__form-input form-control" id="footer-newsletter-address" placeholder="Email Address...">
                                        <button class="footer-newsletter__form-button btn btn-primary">Subscribe</button></form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </footer>
    </div>

    <script>
        (function() {
            var ws = new WebSocket('ws://' + window.location.host +
                '/jb-server-page?reloadMode=RELOAD_ON_SAVE&'+
                'referrer=' + encodeURIComponent(window.location.pathname));
            ws.onmessage = function (msg) {
                if (msg.data === 'reload') {
                    window.location.reload();
                }
                if (msg.data.startsWith('update-css ')) {
                    var messageId = msg.data.substring(11);
                    var links = document.getElementsByTagName('link');
                    for (var i = 0; i < links.length; i++) {
                        var link = links[i];
                        if (link.rel !== 'stylesheet') continue;
                        var clonedLink = link.cloneNode(true);
                        var newHref = link.href.replace(/(&|\?)jbUpdateLinksId=\d+/, "$1jbUpdateLinksId=" + messageId);
                        if (newHref !== link.href) {
                            clonedLink.href = newHref;
                        }
                        else {
                            var indexOfQuest = newHref.indexOf('?');
                            if (indexOfQuest >= 0) {
                                // to support ?foo#hash
                                clonedLink.href = newHref.substring(0, indexOfQuest + 1) + 'jbUpdateLinksId=' + messageId + '&' +
                                    newHref.substring(indexOfQuest + 1);
                            }
                            else {
                                clonedLink.href += '?' + 'jbUpdateLinksId=' + messageId;
                            }
                        }
                        link.replaceWith(clonedLink);
                    }
                }
            };
        })();
    </script>
    </body>




    </html>
