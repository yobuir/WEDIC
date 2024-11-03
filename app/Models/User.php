<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function isAdmin()
    {
        if (auth()->user()->role_id == 1) {
            return true;
        }
        return false;
    }

    public function isMarketing()
    {
        if (auth()->user()->role_id == 2) {
            return true;
        }
        return false;
    }


    public function isFinance()
    {
        if (auth()->user()->role_id == 3) {
            return true;
        }
        return false;
    }


    public function isApplicant()
    {
        if (auth()->user()->role_id == 4) {
            return true;
        }
        return false;
    }

    public function isUser()
    {
        if (auth()->user()->role_id == 5) {
            return true;
        }
        return false;
    }


    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}
