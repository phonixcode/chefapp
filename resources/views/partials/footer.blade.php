<footer class="footer set-bg" data-setbg="{{ asset('img/footer-bg.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>About</h6>
                    <p class="text-white">
                        Welcome to Culinary Crafts, where the passion for food and the art of cooking come together to create unforgettable experiences. Our mission is to bridge the gap between food enthusiasts and world-renowned chefs, fostering a vibrant community that celebrates culinary creativity and excellence.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__logo">
                        <a href="#"><img src="{{ asset('img/logo.png') }}" alt="" width="200"></a>
                    </div>
                    
                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__newslatter">
                    <h6>Subscribe</h6>
                    <p>Get latest updates and offers.</p>
                    <form action="{{ route('subscribe') }}" method="POST">
                        @csrf
                        <input type="text" name="email" placeholder="Email" required>
                        <button type="submit"><i class="fa fa-send-o"></i></button>
                    </form>
            
                    @if(session('success'))
                        <div class="alert alert-success mt-2">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
            
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <p class="copyright__text text-white">
                        Copyright &copy; {{ Date('Y') }} All rights reserved 
                    </p>
                </div>
                <div class="col-lg-5">
                    <div class="copyright__widget">
                        <ul>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms & Conditions</a></li>
                            <li><a href="#">Site Map</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>