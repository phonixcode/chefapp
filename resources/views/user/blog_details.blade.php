@extends('layouts.main')

@section('content')

<div class="blog-hero set-bg" data-setbg="{{ $blog->photo_url }}">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-7">
                <div class="blog__hero__text">
                    <div class="label">Recipes</div>
                    <h2>{{ $blog->title }}</h2>
                    <ul>
                        <li>By <span>{{ $blog->user->name }}</span></li>
                        <li>{{ $blog->formatted_created_at }}</li>
                        <li>{{ $blog->views }} Views</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog-details spad">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="blog__details__content">
                    <div class="blog__details__share">
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>

                    {!! $blog->long_description !!}
                    
                    
                    <div class="blog__details__author">
                        <div class="blog__details__author__pic">
                            <img src="img/blog/details/blog-author.jpg" alt="">
                        </div>
                        <div class="blog__details__author__text">
                            <h6>{{ $blog->user->name }}</h6>
                            <div class="blog__details__author__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                    </div>
                    <div class="blog__details__comment">
                        <h5>03 Comment</h5>
                        <a href="#" class="primary-btn">Leave a comment</a>
                        <div class="blog__details__comment__item">
                            <div class="blog__details__comment__item__pic">
                                <img src="img/blog/details/comment-1.jpg" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <h6>Dylan Stewart</h6>
                                <span>26 Feb 2020</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua vel facilisis.</p>
                                <div class="blog__details__comment__btns">
                                    <a href="#">Reply</a>
                                    <a href="#">Like</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment__item blog__details__comment__item--reply">
                            <div class="blog__details__comment__item__pic">
                                <img src="img/blog/details/comment-2.jpg" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <h6>Derrick Patrick</h6>
                                <span>26 Feb 2020</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua vel facilisis.</p>
                                <div class="blog__details__comment__btns">
                                    <a href="#">Reply</a>
                                    <a href="#">Like</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog__details__comment__item">
                            <div class="blog__details__comment__item__pic">
                                <img src="img/blog/details/comment-3.jpg" alt="">
                            </div>
                            <div class="blog__details__comment__item__text">
                                <h6>Michael Luna</h6>
                                <span>26 Feb 2020</span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua vel facilisis.</p>
                                <div class="blog__details__comment__btns">
                                    <a href="#">Reply</a>
                                    <a href="#">Like</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection