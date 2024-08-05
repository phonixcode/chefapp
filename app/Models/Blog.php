<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'user_id', 
        'title', 
        'slug',
        'description', 
        'long_description', 
        'views',
        'photo',
    ];

    protected $appends = ['photo_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getSlugSource()
    {
        return $this->title;
    }

    public function getPhotoUrlAttribute()
    {
        return Storage::disk('public')->url($this->photo);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d M Y');
    }

    public static function getBlogBySlug($slug)
    {
        return self::where('slug', $slug)->with('user')->first();
    }
}
