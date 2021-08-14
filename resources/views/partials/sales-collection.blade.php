<div class="product-area pt-95 pb-100">
    <div class="container">
        <div class="product-style">
            <div class="product-tab-list text-center mb-5 nav product-menu-mrg" role=tablist>
                <a class="active btn btn-bottom-line" href="#home1" data-toggle="tab" role="tab" aria-selected="true" aria-controls="home1">
                    LATEST
                </a>
                <a class="btn btn-bottom-line" href="#home2" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home2">
                    ON SALE
                </a>
                <a class="btn btn-bottom-line" href="#home3" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home3">
                    FREE SHIPPING
                </a>
                <a class="btn btn-bottom-line" href="#home4" data-toggle="tab" role="tab" aria-selected="false" aria-controls="home4">
                    HIGHEST RATING
                </a>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active show fade" id="home1" role="tabpanel">
                    <div class="row">
                        @for($i = 0; $i < 6; $i++)
                        <div class="col-lg-3 col-md-4 mb-4">
                            <div class="single-preview-item__wrap text-center">
                                <a href="#" target="_blank">
                                    <div class="frame-screen">
                                        <div class="single-preview-item__thumbnail">
                                            <img class="img-fluid" src="/img/site/collection.jpg" alt="">
                                            <div class="overlay">
                                                <div class="btn-view-demo btn btn--white btn-sm">
                                                    view
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-preview-item__info">
                                            <h6 class="heading">V-neck blouse</h6>
                                            <div>
                                                <span>$110.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endfor
                    </div>
                </div>
                <div class="tab-pane fade" id="home2" role="tabpanel">
                    <div class="row">
                        @for($i = 0; $i < 8; $i++)
                            <div class="col-lg-3 col-md-4 mb-4">
                                <div class="single-preview-item__wrap text-center">
                                    <a href="#" target="_blank">
                                        <div class="frame-screen">
                                            <div class="single-preview-item__thumbnail">
                                                <img class="img-fluid" src="/img/site/collection2.jpg" alt="">
                                                <div class="overlay">
                                                    <div class="btn-view-demo btn btn--white btn-sm">
                                                        view
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-preview-item__info">
                                                <h6 class="heading">V-neck blouse</h6>
                                                <div>
                                                    <span>$110.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="tab-pane fade" id="home3" role="tabpanel">
                    <div class="row">
                        @for($i = 0; $i < 8; $i++)
                            <div class="col-lg-3 col-md-4 mb-4">
                                <div class="single-preview-item__wrap text-center">
                                    <a href="#" target="_blank">
                                        <div class="frame-screen">
                                            <div class="single-preview-item__thumbnail">
                                                <img class="img-fluid" src="/img/site/collection3.jpg" alt="">
                                                <div class="overlay">
                                                    <div class="btn-view-demo btn btn--white btn-sm">
                                                        view
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-preview-item__info">
                                                <h6 class="heading">V-neck blouse</h6>
                                                <div>
                                                    <span>$110.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                <div class="tab-pane fade" id="home4" role="tabpanel">
                    <div class="row">
                        @for($i = 0; $i < 8; $i++)
                            <div class="col-lg-3 col-md-4 mb-4">
                                <div class="single-preview-item__wrap text-center">
                                    <a href="#" target="_blank">
                                        <div class="frame-screen">
                                            <div class="single-preview-item__thumbnail">
                                                <img class="img-fluid" src="/img/site/collection4.jpg" alt="">
                                                <div class="overlay">
                                                    <div class="btn-view-demo btn btn--white btn-sm">
                                                        view
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-preview-item__info">
                                                <h6 class="heading">V-neck blouse</h6>
                                                <div>
                                                    <span>$110.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
