<!-- sidebar-cart start -->
<div class="sidebar-cart onepage-sidebar-area">
    <div class="wrap-sidebar">
        <div class="sidebar-cart-all">
            <div class="sidebar-cart-icon">
                <button class="op-sidebar-close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="cart-content">
                <h3>My Cart</h3>
                <ul>
                    @for($i = 0; $i < 3; $i++)
                    <li class="single-product-cart">
                        <div class="cart-img">
                            <a href="#">
                                <img src="/img/site/cart.jpg" alt="cart image" class="sidebar-cart__img">
                            </a>
                        </div>
                        <div class="cart-title">
                            <h3><a href="#">Ankara scarf</a></h3>
                            <span>1 x $140.00</span>
                        </div>
                        <div class="cart-delete">
                            <a href="#"><i class="ion-ios-trash-outline"></i></a>
                        </div>
                    </li>
                    @endfor
                    <li class="single-product-cart">
                        <div class="cart-total">
                            <h4>Total : <span>$ 120</span></h4>
                        </div>
                    </li>
                    <li class="single-product-cart">
                        <div class="cart-checkout-btn">
                            <a class="btn" href="#">view cart</a>
                            <a class="btn" href="#">checkout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
