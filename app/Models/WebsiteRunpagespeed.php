<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebsiteRunpagespeed extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'loading_experience' => 'array',
        'first_contentful_paint' => 'array',
        'speed_index' => 'array',
        'total_blocking_time' => 'array',
        'largest_contentful_paint' => 'array',
        'cumulative_layout_shift' => 'array',
        'interactive' => 'array',
    ];
}
