@extends('layouts.main')

@section('content')

@include('partials.breadcrumb', ['title' => 'Blog'])

<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @foreach ($blog_lists as $item)
                <div class="blog__item">
                    <div class="blog__item__pic set-bg" data-setbg="{{ $item->photo_url }}">
                        <div class="blog__pic__inner">
                            <div class="label">Recipes</div>
                            <ul>
                                <li>By <span>{{ $item->user->name }}</span></li>
                                <li>{{ $item->formatted_created_at }}</li>
                                <li>{{ $item->views }} Views</li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__item__text">
                        <h2>{{ $item->title }}</h2>
                        <p>{{ $item->description }}</p>
                        <a href="{{ route('blog.details', $item->slug) }}">READ MORE</a>
                    </div>
                </div>
                @endforeach
                
                <div class="shop__pagination">
                    <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><span class="arrow_carrot-right"></span></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Enter keyword">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div class="blog__sidebar__item">
                        <h5>Popular posts</h5>

                        <div class="blog__sidebar__recent">
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="img/blog/br-1.jpg" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>Secret To Cooking Vegetables</h4>
                                    <span>13 Nov 2020</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="img/blog/br-2.jpg" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>Bbq Myths Getting You Down</h4>
                                    <span>13 Nov 2020</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="img/blog/br-3.jpg" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>Save Money The Crock Pot Way</h4>
                                    <span>13 Nov 2020</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="img/blog/br-4.jpg" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>Grilling Tips For The Dog Days Of Summer</h4>
                                    <span>13 Nov 2020</span>
                                </div>
                            </a>
                            <a href="#" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="img/blog/br-5.jpg" alt="">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>Barbeque Techniques Two Methods To Consider</h4>
                                    <span>13 Nov 2020</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection