<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anime;
use App\Models\Review;
use App\Models\Sled;
use App\Models\Comment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator; 
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class FirstController extends Controller
{
   public function first(Anime $anime , Review $review , Sled $sled)
    { 
        $accessToken = env('ANNICT_ACCESS_TOKEN');
        $response = Http::withToken($accessToken)->get('https://api.annict.com/v1/works', [
            'filter_season' => '2024-all',
        ]);
        $anime_2024 = $response->json()['works'];
        $review = Review::first();
        foreach ($anime_2024 as $animeData) {
            $anime = new Anime();
            $anime->title = $animeData['title'] ?? null;
            $anime->media = $animeData['media'] ?? null;
            $anime->image_url = $animeData['images']['recommended_url'] ?? null;
            $anime->review_id = $review ? $review->id : null; 
            $anime->save();
            $datas=$anime->get();
        }
      return view('animes.first', ['anime_2024' => $anime_2024,'datas' => $datas,]);
        //  return view('animes.first');
    }
    
    function anime(Anime $anime)
    {
        $accessToken = env('ANNICT_ACCESS_TOKEN');
        $client = new Client();
        $response = $client->get('https://api.annict.com/v1/works', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
            ],
            'query' => [
                'filter_ids' => $anime->annict_id,
               ],
            ]);
        $animeDetails = json_decode($response->getBody()->getContents(), true)['works'][0];
        return view('animes.anime', [
            'anime' => $anime,
            'details' => $animeDetails,
        ]);
    }
    
    function index(){
        $sleds = Sled::all();
        return view('animes.sled', ['sled' => $sleds]);
    }
    
    public function show($id)
    {
	    $sled = Sled::find($id);
	    return view('bbc.show')->with('sled', $sled);
    }
    function create()
    {
        return view('bbc.create');
    }
    
    public function store(Request $request)
{
	$rules = [
		'title' => 'required',
		'content'=>'required',
	];

	$messages = array(
		'title.required' => 'タイトルを正しく入力してください。',
		'content.required' => '本文を正しく入力してください。',
	);

	$validator = Validator::make($request->all(),$rules,$messages);

	if ($validator->passes()) {
		$sled = new Sled;
		$sled->title = $request->input('title');
		$sled->content = $request->input('content');
	    $sled->user_id = auth()->id();
		$sled->save();
		return redirect('/sleds/' . $sled->id)
			->with('message', '投稿が完了しました。');
	}else{
		return redirect('/sleds/create')
			->withErrors($validator)
			->withInput();
	}
}
    
    public function createComment($sledId){
        $sled = Sled::findOrFail($sledId);
        return view('bbc.single', compact('sled'));
    }
    // public function singleshow(){
    //     return view('bbc.single',compact(''));
    // }

    public function storeComment(Request $request, Sled $sled)
    {
    	$rules = [
    	    'commenter' => 'required',
    		'comment'=>'required',
    		];
    		
    	$messages = [
    	    'commenter.required' => 'タイトルを正しく入力してください。',
    		'comment.required' => '本文を正しく入力してください。',
    		];
    		
    	$validator = Validator::make($request->all(), $rules, $messages);
    	
    	if ($validator->passes()) {
    		$comment = new Comment;
    		$comment->commenter = Auth::user()->name;  
    		$comment->comment = $request->input('comment');
    		$comment->sled_id = $sled->id;
    		$comment->user_id = Auth::id(); 
    		$comment->save();
    		return redirect()->route('comment.create', ['sled' => $sled->id])
        ->with('message', 'コメントを投稿しました');
    	}else{
    		return redirect()->back()
    			->withErrors($validator)
    			->withInput();
    	}
    }
    function redirectToAnnict(){
        $query = http_build_query([
            'client_id'=>config('services.annict.client_id'),
            'redirect_uri'=>config('services.annict.redirect'),
            'response_type'=>'code',
            'scope'=>'read',
            'state'=> csrf_token(),
            ]);
            
            return redirect(config('services.annict.authorize_url') . '?' . $query);
    }
    function handleAnnictCallback(Request $request){
        $code=$request->get('code');
        $state=$request->get('state');
        
        if ($state !== session('_token')){
            return redirect()->route('auth.annict')->withErrors('CSRF token mismatch');
        }
        $response =Http::asForm()->post(config('services.annict.token_url'),[
            'grant_type' => 'authorization_code',
            'client_id' => config('services.annict.client_id'),
            'client_secret' => config('services.annict.client_secret'),
            'redirect_url' => config('services.annict.redirect'),
            'code' => $code,
            ]);
            
        $accessToken = $response->json()['access_token'];
        
        session(['annict_access_token' => $accessToken]);
        
        return redirect()->route('dashboard')->with('status', 'Successfully authenticted with Annict!');
    }
    
    // function anime($workId){
    //     $accessToken = env('ANNICT_ACCESS_TOKEN');
        
    //     $response = Http::withToken($accessToken)->get('https://api.annict.com/v1/people', [
    //         'filter_work_id' => $workId,
    //         ]);
    //     $people = $response->json()['people'];
    //     $director =collect($people)->firstWhere('role','監督');
        
    //      $animeResponse = Http::withToken($accessToken)->get('https://api.annict.com/v1/works', [
    //         'filter_ids' => $workId,
    //         ]);
    //     $anime=$animeResponse->json()['works'][0];
        
    //     $castResponse = Http::withToken($accessToken)->get('https://api.annict.com/v1/characters', [
    //         'filter_work_id' => $workId,
    //         ]);
    //     $characters = $castResponse->json()['characters'];
       
    //     return view('animes.anime', [
    //         'anime' => $anime,
    //         'characters' => $characters, // 声優
    //         'director' => $director,
    //         ]);
    // }
}