<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'status',
        'scheduled_at',
        'sent_at'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'sent_at' => 'datetime',
    ];

    public function subscribers()
    {
        return $this->belongsToMany(NewsletterSubscriber::class, 'newsletter_sends')
        ->withTimestamps()
            ->withPivot('status', 'sent_at');
    }
}
