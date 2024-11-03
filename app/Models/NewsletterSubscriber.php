<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;
    protected $fillable = [
        'email',
        'name',
        'phone',
        'is_subscribed',
        'last_sent_at'
    ];

    protected $casts = [
        'is_subscribed' => 'boolean',
        'last_sent_at' => 'datetime',
    ];

    public function newsletters()
    {
        return $this->belongsToMany(Newsletter::class, 'newsletter_sends')
        ->withTimestamps()
            ->withPivot('status', 'sent_at');
    }
}
