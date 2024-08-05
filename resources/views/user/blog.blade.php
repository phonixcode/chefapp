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
                                <li>{{ formatViews($item->views) }} Views</li>
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
                    {{ $blog_lists->links('vendor.pagination.custom-pagination') }}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="" method="get">
                            <input type="text" placeholder="Enter keyword" name="keyword" value="{{ old('keyword') }}">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    
                    <div class="blog__sidebar__item">
                        <h5>Popular posts</h5>

                        <div class="blog__sidebar__recent">
                            @foreach ($popular_blogs as $item)
                            <a href="{{ route('blog.details', $item->slug) }}" class="blog__sidebar__recent__item">
                                <div class="blog__sidebar__recent__item__pic">
                                    <img src="{{ $item->photo_url }}" alt="" width="100">
                                </div>
                                <div class="blog__sidebar__recent__item__text">
                                    <h4>{{ $item->title }}</h4>
                                    <span>{{ $item->formatted_created_at }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

@endsection