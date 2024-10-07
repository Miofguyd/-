<x-app-layout>
        <h1>アニメ板！</h1>
        <div class='indexes'>
                <h1 class='hot_tag'>話題のタグ</h1>
                <h1 class='season_anime'>今期アニメランキング</h1>
                @if(isset($datas) && $datas)
                <img src="{{ $datas[0]->image_url }}" alt="{{ $datas[0]->title }}の画像" style="max-width: 150px;"><br>
                @endif
                <h1 class='best_anime'>歴代アニメランキング</h1>
                @foreach ($datas as $anime)
                    <a href="/animes/{{ $anime ->id }}">タイトル：{{ $anime->title }}</a>
                @endforeach
                <ul>2024
                @foreach ($anime_2024 as $anime_2024)
                <li>
                <strong>{{ $anime_2024['title'] }}</strong>
                <br>
                <img src="{{ $anime_2024['images']['recommended_url' ?? '' ] }}" alt="{{ $anime_2024['title'] }}の画像" style="max-width: 150px;">
                <br>
                 @if (isset($anime_2024['rank']))
                    {{ $anime_2024['rank'] }} 位
                @else
                    ランク情報がありません
                @endif
            </li>
                @endforeach
                 <a href="/sleds">掲示板一覧へ</a>
        </div>
</x-app-layout>