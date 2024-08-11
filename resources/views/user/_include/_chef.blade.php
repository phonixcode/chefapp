<section class="team spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-7 col-sm-7">
                <div class="section-title">
                    <span>Chefs</span>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="team__btn">
                    <a href="{{ route('chefs') }}" class="primary-btn">More</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($chefs as $item)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a href="{{ route('chefs.details', $item->id) }}">
                    <div class="team__item set-bg" data-setbg="{{ $item->photo != NULL ? $item->photo_url : asset('img/chef-profile.jpg') }}">
                        <div class="team__item__text">
                            <h6>{{ $item->name }}</h6>
                            <span>Chef</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
