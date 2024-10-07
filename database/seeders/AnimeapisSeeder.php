<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AnimeapisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $accessToken = env('ANNICT_ACCESS_TOKEN');
        $response = Http::withToken($accessToken)->get('https://api.annict.com/v1/works', [
           
        ]);
         $datas = $response->json()['works'];
 
            foreach ($datas as $data) {
                if($data['released_on']){
                    $data['released_on']=$data['released_on'];
                }else{
                    $data['released_on']=null;
                }
                if($data['released_on_about']){
                    $data['released_on_about']=$data['released_on_about'];
                }else{
                    $data['released_on_about']=null;
                }
                DB::table('anime_apis')->insert([
                    'title' => $data['title'],
                    'title_kana' => $data['title_kana'],
                    'title_en' => $data['title_en'],
                    'media' => $data['media'],
                    'media_text' => $data['media_text'],
                    'released_on' => $data['released_on'],
                    'released_on_about' => $data['released_on_about'],
                    'official_site_url' => $data['official_site_url'],
                    'wikipedia_url' => $data['wikipedia_url'],
                    'twitter_username' => $data['twitter_username'],
                    'twitter_hashtag' => $data['twitter_hashtag'],
                    'syobocal_tid' => $data['syobocal_tid'],
                    'episodes_count' => $data['episodes_count'],
                    'watchers_count' => $data['watchers_count'],
                    'reviews_count' => $data['reviews_count'],
                    'no_episodes' => $data['no_episodes'],
                    'season_name' => $data['season_name'],
                    'season_name_text' => $data['season_name_text'],
                    ]);
            }
        } 
    }
