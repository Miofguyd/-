<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sled;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $commentdammy = 'コメントダミーです。ダミーコメントだよ。';
        $maxComments = mt_rand(3, 15);
		for ($j=0; $j <= $maxComments; $j++) {
			$comment = new Comment;
			$comment->comment = $commentdammy;
    }
}
}