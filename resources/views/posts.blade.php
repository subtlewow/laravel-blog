<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='/app.css'>
    <title>My Blog</title>
</head>
<body>
    @foreach($posts as $file):
        <article class="{{ $loop->even ? 'mb-6' : '' }}">
            <h1>
                <a href="/posts/{{ $file->slug; }}">
                    {{ $file-> title; }}
                </a>
            </h1>

            <div>
                {!! $file->body; !!}
            </div>
        </article>
    @endforeach;


</body>
</html>