<h5>{{ count($recipe->reviews) }} Comment</h5>
@foreach($recipe->reviews as $review)
    <div class="blog__details__comment__item">
        <div class="blog__details__comment__item__pic">
            {{-- <img src="{{ asset('img/blog/details/comment-1.jpg') }}" alt=""> --}}
            <img src="{{ $review->user->photo != NULL ? $review->user->photo_url : asset('img/chef-profile.jpg') }}" alt="">
        </div>
        <div class="blog__details__comment__item__text mb-5">
            <h6>{{ $review->user->name }}</h6>
            <span>{{ $review->created_at->format('M d, Y') }}</span>
            <span>
                @for ($i = 0; $i < 5; $i++)
                    <i class="fa fa-star{{ $i < $review->rating ? '' : '-o' }}" aria-hidden="true"></i>
                @endfor
            </span>
            <span>{{ $review->review }}</span>
        </div>
    </div>
@endforeach
