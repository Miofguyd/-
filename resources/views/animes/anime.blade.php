<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>First</title>
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('/css/first.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>アニメ板！</h1>
        <div class='indexes'>
            <h2>監督</h2>
            <p>{{ $anime->director }}</p>
        </div>
    </body>
</html>