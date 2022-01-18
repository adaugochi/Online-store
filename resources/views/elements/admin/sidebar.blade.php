<div class="nk-sidebar nk-sidebar-fixed bg-white " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head ">
        <div class="nk-sidebar-brand ">
            <a href="/" class="logo-link nk-sidebar-logo">
                <h3 class="font-weight-bold">{{ config('app.name') }}</h3>
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                <i class="icon bi bi-arrow-left"></i>
            </a>
        </div>
    </div><!-- .nk-sidebar-element -->

    <div class="nk-sidebar-element">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.home') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-house-door"></i>
                            </span>
                            <span class="nk-menu-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ route('admin.customers') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-person-check"></i>
                            </span>
                            <span class="nk-menu-text">Customers</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.delivery-fee') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-truck"></i>
                            </span>
                            <span class="nk-menu-text">Delivery Fee</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.product-categories') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-view-list"></i>
                            </span>
                            <span class="nk-menu-text">Product Category</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.products') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-box-seam"></i>
                            </span>
                            <span class="nk-menu-text">Products</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.orders') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-cart-check"></i>
                            </span>
                            <span class="nk-menu-text">Purchase</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="{{ route('admin.coupons') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-percent"></i>
                            </span>
                            <span class="nk-menu-text">Coupons</span>
                        </a>
                    </li>

                    <li class="nk-menu-item">
                        <a href="#" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <i class="icon bi bi-box-arrow-left"></i>
                            </span>
                            <span class="nk-menu-text">Logout</span>
                        </a>
                    </li><!-- .nk-menu-item -->
                </ul><!-- .nk-menu -->
            </div><!-- .nk-sidebar-menu -->
        </div><!-- .nk-sidebar-content -->
    </div><!-- .nk-sidebar-element -->
</div>
