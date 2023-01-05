<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pagespeedinsights()
    {
        return $this->hasMany(PagespeedInsight::class);
    }

    public function runpagespeeds()
    {
        return $this->hasMany(WebsiteRunpagespeed::class);
    }
}
