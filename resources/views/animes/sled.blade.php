<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>掲示板</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/first.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        @extends('layouts.default')
        @section('content')
        <div class="col-xs-8 col-xs-offset-2">
        <a href="{{ url('/sleds/create') }}" class="btn btn-primary">掲示板作成</a>
     @foreach($sled as $item)
	<h2>タイトル：{{ $item->title }}
		<small>投稿日：{{ date("Y年 m月 d日",strtotime($item->created_at)) }}</small>
	</h2>
	<p>{{ $item->content }}</p>
	<p><a href="{{ route('sleds.show', $item->id) }}" class="btn btn-primary">続きを読む</a></p>
	<p>コメント数：{{ $item->comment_count }}</p>
	<hr />
    @endforeach
</div>
    @stop
    </body>
</html>