<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'photo',
        'password',
        'address',
        'city',
        'state',
        'restaurant_name',
        'restaurant_address',
        'restaurant_city',
        'restaurant_state',
        'specialty',
        'experience',
        'is_2fa_enabled',
        'two_factor_code',
        'two_factor_expires_at',
        'revenue',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        // 'is_2fa_enabled' => 'boolean',
    ];

    protected $appends = ['photo_url'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wishlist()
    {
        return $this->hasMany(Wishlist::class);
    }

    // public function getIs2faEnabledAttribute()
    // {
    //     return !is_null($this->two_factor_code);
    // }

    // public function setIs2FaEnabledAttribute($value)
    // {
    //     $this->attributes['is_2fa_enabled'] = (bool) $value;
    // }


    // Define a scope for chefs
    public function scopeChefs($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'chef');
        });
    }

    public function scopeRandomChefs($query, $limit = 4)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', 'chef');
        })->inRandomOrder()->limit($limit);
    }

    public function scopeUsers($query)
    {
        return $query->whereHas('roles', function ($query) {
            $query->where('name', '!=', 'admin');
        });
    }

    // Accessor to get role names
    public function getRoleNamesAttribute()
    {
        return $this->roles->pluck('name')->toArray();
    }

    public function getPhotoUrlAttribute()
    {
        return Storage::disk('public')->url($this->photo);
    }

    public function getFormattedCreatedAtAttribute()
    {
        return Carbon::parse($this->created_at)->format('d M Y');
    }
}
