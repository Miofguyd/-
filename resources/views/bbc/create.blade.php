<x-app-layout>


<div class="col-xs-8 col-xs-offset-2">

<h1>投稿ページ</h1>

{{-- 投稿完了時にフラッシュメッセージを表示 --}}
@if(Session::has('message'))
	<div class="bg-info">
		<p>{{ Session::get('message') }}</p>
	</div>
@endif

{{-- エラーメッセージの表示 --}}
@foreach($errors->all() as $message)
	<p class="bg-danger">{{ $message }}</p>
@endforeach

<form action="{{ route('sleds.store') }}" method="POST">
    @csrf  
	<div class="form-group">
		<label for="title" class="">タイトル</label>
		<input type="text" name="title" class="form-control" value="{{ old('title') }}">
	</div>
	<div class="form-group">
		<label for="content" class="">本文</label>
		<div class="">
			<textarea name="content" class="form-control">{{ old('content') }}</textarea>
		</div>
	</div>

	<div class="form-group">
		<button type="submit" class="btn btn-primary">投稿する</button>
	</div>
	</form>
</div>

</x-app-layout>