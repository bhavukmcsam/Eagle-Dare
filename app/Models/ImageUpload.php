<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'download_key',
        'file_name',
        'file_info',
        'status',
        'deleted_at',
        'download',
    ];


}
