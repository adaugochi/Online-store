<!-- modal -->
<div class="modal fade" id="viewProductModal" tabindex="-1" role="dialog" aria-labelledby="viewProductModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="d-flex align-self-end m-3">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="qwick-view-left">
                    <div class="quick-view-learg-img">
                        <div class="quick-view-tab-content tab-content">
                            <div class="tab-pane active show fade" role="tabpanel">
                                <!-- 320 X 380 -->
                                <img src="/img/quick-view/l7.jpg" alt="" id="productImg">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="qwick-view-right">
                    <div class="qwick-view-content">
                        <h3 id="productName"></h3>
                        <div class="price" id="productPrice">
                            <span class="new"></span>
                            <span class="old d-none"></span>
                        </div>
                        <div class="rating-number">
                            <div class="quick-view-number">
                                <span class="ml-0">4.5 Rating (S)</span>
                            </div>
                        </div>
                        <p id="productDescription"></p>
                        <div class="quick-view-select">
                            <div class="form-input">
                                <select class="select" id="productSize" name="product_size" required></select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-input">
                                    <input type="number" value="1" name="quantity">
                                </div>
                            </div>
                            <input type="hidden" value="" id="productId">
                            <div class="col-12">
                                <button class="btn btn--primary" type="button" id="addCart">add to cart</button>
                                <button class="btn btn--primary" type="button">wishlist</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
