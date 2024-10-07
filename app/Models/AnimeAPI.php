<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnimeAPI extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'id',
        'title',
        'title_kana',
        'title_en',
        'media',
        'media_text',
        'released_on',
        'released_on_about',
        'official_site_url',
        'wikipedia_url',
        'twitter_username',
        'twitter_hashtag',
        'syobocal_tid',
        'mal_media_id',
        'images',
        'episodes_count',
        'watchers_count',
        'reviews_count',
        'no_episodes',
        'season_name',
        'season_name_text',
        'annict_id',
        'media',
        'image_url',
        'casts',
        ];
}
