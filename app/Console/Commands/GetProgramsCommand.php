<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DateTime;
use Illuminate\Support\Facades\Log;

use App\Models\Program;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class GetProgramsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-programs-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $anime=new Anime();
        $accessToken = env('ANNICT_ACCESS_TOKEN');
        $response = Http::withToken($accessToken)->get('https://api.annict.com/v1/works', [
            'filter_season' => '2024-all',
        ]);
    
        $anime_2024 = $response->json()['works'];
        $response = Http::withToken($accessToken)->get('https://api.annict.com/v1/works', [
            'filter_season' => '2023-all',
        ]);
        $anime->fill($anime_2024)->save();
        $anime_2023 = $response->json()['works'];
    }
}
