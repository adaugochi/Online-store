<header class="container">
    <div class="header-area">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between">
                <div class="align-self-center">
                    <a href="/">
                        <h3 class="font-weight-bold">{{ env('APP_NAME') }}</h3>
                    </a>
                </div>
                <div class="menu-search-cart">
                    <div class="main-menu menu-none-block mx-auto">
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Catalog</a>
                                    <ul class="dropdown">
                                        <li><a href="/">Men</a></li>
                                        <li><a href="/">Women</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('faqs') }}">FAQs</a></li>
                                @if(auth()->guest())
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                    <div class="main-menu">
                        <nav>
                            <ul>
                                <li class="d-none d-md-inline-block">
                                    <a href="{{ route('cart') }}">
                                        <div class="common-style">
                                            <i class="bi bi-cart4 fs-26px"></i>
                                            <span class="badge badge-dark header__cart" id="cart">
                                                {{count(session()->get('cart', []))}}
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                @if(!auth()->guest())
                                    <li>
                                        <a href="#">
                                            <div class="header__user-toggle">
                                                <div class="header__user-avatar">
                                                    <i class="icon bi bi-person"></i>
                                                </div>
                                                <span class="ml-1 d-none d-md-block">My Account</span>
                                                <i class="bi ml-1 fs-20 bi-chevron-down"></i>
                                            </div>
                                        </a>
                                        <ul class="dropdown">
                                            <li><a href="{{ route('customer.home') }}">My Dashboard</a></li>
                                            <li><a href="{{ route('customer.profile') }}">Profile</a></li>
                                            <li><a href="{{ route('customer.orders') }}">Orders</a></li>
                                            <li><a href="{{ route('customer.saved-items') }}">Saved Items</a></li>
                                            <li>
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout').submit();">Logout</a>
                                                <form id="logout" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                                <li class="mx-0 d-none">
                                    <a href="#">
                                        <div class="header-cart common-style">
                                            <button class="sidebar-trigger">
                                                <i class="bi bi-list fs-26px"></i>
                                            </button>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
