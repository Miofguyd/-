@extends('layouts.default')

@section('content')

<div class="col-xs-8 col-xs-offset-2">
    <h2>タイトル：{{ $sled->title }}
        <small>投稿日：{{ date("Y年 m月 d日", strtotime($sled->created_at)) }}</small>
        <small>{{ $sled->user->name }}</small>
    </h2>
    
    <p>{{ $sled->content }}</p>

    <h3>コメント一覧</h3>
    @foreach($sled->comments as $comment)
        <h4>{{ $comment->user->name }}</h4>
        <p>{{ $comment->comment }}</p>
        <hr />
    @endforeach
    <p><a href="{{ route('comment.create', ['sled' => $sled->id]) }}" class="btn btn-primary">コメントを投稿する</a></p>
</div>

@stop
