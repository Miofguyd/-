<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    use HasFactory;
}

function reviews()
{
    return $this->hasMany(Review::class);
}

function casts()
{
    return $this->belongsToMany(Cast::class);
}

function tags()
{
    return $this->belongsToMany(Tag::class);
}

function subscriptions()
{
    return $this->belongsToMany(Subscription::class);
}