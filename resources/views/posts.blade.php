@extends('layout')

@section('banner')
    <h1>My Blog</h1>
@endsection

@section('content')
    @foreach($posts as $file)
        <article>
            <h1>
                <a href="/posts/{{ $file->slug }}">
                    {{ $file->title }}
                </a>
            </h1>

            <p>
                <a href="/categories/{{ $file->category->slug }}">{{ $file->category->name }}</a>
            </p>


            <div>
                {!! $file->excerpt; !!}
            </div>
        </article>
    @endforeach
@endsection