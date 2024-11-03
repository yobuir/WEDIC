<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PInstallMentTracter extends Model
{
    use HasFactory;
    protected $fillable = ['service_id','service_type','user_id', 'frequency', 'r_amount', 'p_amount','status'];
}
