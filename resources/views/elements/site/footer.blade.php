<footer class="footer-area pt-100 pb-65 gray-bg-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-12">
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
            <div class="col-md-5 col-12">
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
                                <li><a href="#" class="fs-26px"><i class="bi bi-facebook"></i></a></li>
                                <li><a href="#" class="fs-26px"><i class="bi bi-github"></i></a></li>
                                <li><a href="#" class="fs-26px"><i class="bi bi-linkedin"></i></a></li>
                                <li><a href="#" class="fs-26px"><i class="bi bi-google"></i></a></li>
                            </ul>
                        </div>
                        <p>
                            Copyright © <a href="https://hastech.company/">{{ env('APP_NAME') }}</a>
                            2018 . All Right Reserved.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-3 col-12">
                <div class="footer-widget mb-30">
                    <h4 class="footer-title">Quick Links</h4>
                    <p><a href="{{ route('contact') }}" class="text-gray">Contact us</a></p>
                    <p><a href="{{ route('faqs') }}" class="text-gray">Faq</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
