@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'Chefs'])

<section class="shop spad">
    <div class="container">
        <div class="shop__option">
            <div class="row">
                <div class="col-lg-7 col-md-7">
                    <div class="shop__option__search">
                        <form action="" method="get">
                            <input type="text" placeholder="Search" name="chef">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($chefs as $item)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <a href="{{ route('chefs.details', $item->id) }}">
                    <div class="team__item set-bg" data-setbg="{{ $item->photo != NULL ? $item->photo_url : asset('img/chef-profile.jpg') }}">
                        <div class="team__item__text">
                            <h6>
                                {{ $item->name }}
                                @if($item->chefVerification && $item->chefVerification->status == 'completed')
                                    <img src="{{ asset('img/verify.png') }}" alt="" width="20">
                                @endif
                            </h6>
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
        <div class="shop__last__option">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="shop__pagination">
                        {{ $chefs->links('vendor.pagination.custom-pagination') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    
@endsection