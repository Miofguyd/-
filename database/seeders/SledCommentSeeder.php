<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sled;
use App\Models\Comment;
use App\Models\User;

class SledCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $content = 'この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。';

	$commentdammy = 'コメントダミーです。ダミーコメントだよ。';

	for( $i = 1 ; $i <= 10 ; $i++) {
		$sled = new Sled;
		$sled->title = "$i 番目の投稿";
		$sled->content = $content;
		$sled->cat_id = 1;
		$sled->user_id = 1;
		$sled->comment_count = 0; 
		$sled->save();
		
		$maxComments = mt_rand(3, 15);
		for ($j=0; $j <= $maxComments; $j++) {
			$comment = new Comment;
			$comment->comment = $commentdammy;
		}
	}
    }
}
