<footer class="footer-area pt-100 pb-65 gray-bg-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="footer-widget mb-30">
                    <div class="footer-widget-about">
                        <h4 class="footer-title">About Us</h4>
                        <p>
                            We are on a mission to give you access to the best of Adire and Ankara apparels.
                            Regardless of your location across the world, our apparels are just a few days away from
                            your doorstep.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="footer-widget mb-30">
                    <div class="footer-widget-m-content text-center">
                        <div class="footer-logo">
                            <a href="/">
                                <h3 class="font-weight-bold">{{ env('APP_NAME') }}</h3>
                            </a>
                        </div>
                        <div class="footer-social">
                            <ul>
                                <li><a href="#" class="fs-26px"><i class="bi bi-instagram"></i></a></li>
                                <li><a href="#" class="fs-26px"><i class="bi bi-whatsapp"></i></a></li>
                            </ul>
                        </div>
                        <p>
                            Copyright © <a href="https://hastech.company/">{{ env('APP_NAME') }}</a>
                            2018 . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-12">
                <div class="footer-widget mb-30">
                    <h4 class="footer-title">Quick Links</h4>
                    <p><a href="{{ route('contact') }}">contact us</a></p>
                    <p><a href="{{ route('faqs') }}">FAQs</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
