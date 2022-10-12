<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'customer_mobile',
        'facebook_id',
        'social_paywall',
        'mobile_number',
        'fb_like',
        'fb_share',
        'download',
        'deleted_at',
    ];
}
